<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //메인페이지
    public function index(){
        return view('index');
    }
    //저장된 단어 리스트 페이지
    public function saveWordList(){
        $result = DB::table('words')->orderBy('id','desc')->paginate(10);
        //$result = DB::table('message')->where('for_user', $user)->orderBy('send_date', 'desc')->paginate(10);
        return view('saveWordList',['result' => $result]);
    }
}
