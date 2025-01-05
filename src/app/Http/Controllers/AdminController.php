<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
  public function admin(Request $request)
  {
        // contactsテーブルから全データを取得
        // $contacts = Contact::all();
        $contacts = Contact::query();

        /* キーワードから検索処理 */
        $keyword = $request->input('search_key');
        $gender = $request->input('gender');
        $category = $request->input('category');
        $date = $request->input('date');

        //$keyword　が空ではない場合、検索処理を実行します
        if (!empty($keyword)) {
            $contacts->where(function($query) use ($keyword) {
                $query->where('last_name', 'LIKE', "%{$keyword}%")
                      ->orWhere('first_name', 'LIKE', "%{$keyword}%")
                      ->orWhere('email', 'LIKE', "%{$keyword}%");
                    //   ->orWhereHas('products', function ($query) use ($keyword) {
                    //       $query->where('product_name', 'LIKE', "%{$keyword}%");
                    //   });
            });
        }

        if (!empty($gender)) {
            $contacts->where('gender', $gender);
        }

        if (!empty($category)) {
            $contacts->where('categry_id', $category);
        }

        if (!empty($date)) {
            $contacts->whereDate('created_at', $date);
        }

        /* ページネーション */
        $contacts = $contacts->Paginate(7);

        // ビューにデータを渡す
        return view('04_admin', compact('contacts'));
  }

  public function show($id)
  {
      $contact = Contact::findOrFail($id);
      return view('contact.show', compact('contact'));
  }
}
