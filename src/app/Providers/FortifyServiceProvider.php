<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\CustomLogoutResponse;

class FortifyServiceProvider extends ServiceProvider
{
    public function register()
    {
        // カスタムLogoutResponseをバインド
        $this->app->singleton(\Laravel\Fortify\Contracts\LogoutResponse::class, CustomLogoutResponse::class);
    }

    public function boot(): void
    {
        // ログインのレートリミット設定
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(10)->by($email . $request->ip());
        });

        // ユーザー登録処理の設定
        Fortify::createUsersUsing(CreateNewUser::class);

        // ユーザー登録ページのビュー設定
        Fortify::registerView(function () {
            return view('auth.05_register');
        });

        // Fortifyのログインビュー設定
        Fortify::loginView(function () {
            return view('auth.06_login');
        });

        // Fortifyの認証処理設定
        Fortify::authenticateUsing(function (Request $request) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $user = Auth::getProvider()->retrieveByCredentials([
                'email' => $request->email,
                'password' => $request->password,
            ]);

            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }

            return null;
        });
    }
}
