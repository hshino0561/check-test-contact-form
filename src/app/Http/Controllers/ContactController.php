<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
  public function index()
  {
    return view('01_index');
  }

  public function confirm(Request $request)
  {
    $tel = $request->tel_part1 . $request->tel_part2 . $request->tel_part3;
    // $categry_type_val = $request->input('categry_type'); // 入力された番号を取得
    // $categry_type_text = DB::table('categories')->where('id', $categry_type_val)->value('content'); // 番号に対応するデータベースの値を取得

    $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel_part1', 'tel_part2', 'tel_part3', 'address', 'building', 'categry_type', 'detail']);
    $contact['tel'] = $tel;
    // $contact['categry_type'] = $categry_type_text;

    return view('02_confirm', compact('contact'));
  }

  public function store(Request $request)
  {
    // dd($request);
    $category_id = $request->categry_id; // 入力された番号を取得
    $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel', 'address', 'building', 'categry_type', 'detail']);
    // $contact['tel'] = $tel;
    $contact['categry_id'] = $category_id;

    // インサートする内容をデバッグ表示
    // dd($contact);

    Contact::create($contact);
    return view('03_thanks');
  }

  public function thanks()
  {
    return view('03_thanks');
  }
}