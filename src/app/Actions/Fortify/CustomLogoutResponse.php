<?php
namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;

class CustomLogoutResponse implements LogoutResponseContract
{
    public function toResponse($request)
    {
        // ログアウト後のリダイレクト先を指定
        return redirect('/login'); // ここを適切なリダイレクト先に変更
    }
}
