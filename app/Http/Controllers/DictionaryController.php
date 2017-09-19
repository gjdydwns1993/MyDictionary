<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Collection;
use App\Word;

class DictionaryController extends Controller
{
    //단어 검색
    public function search(Request $request){
        $str = $request->keyword;
        exec('node ./js/crawling.js '. $str, $result,$error);
        
        $array = $result;//검색결과
        $num_array = [];
        $count = 0;
        $array_length = count($array);
        for($i=0; $i<count($array); $i++){
            
            //문자열 한글 포함 판단 메서드
            $boolean = $this->hangle_check($array[$i]);
            
            if($boolean){               //한글일때
                $num_array[] = "h"; 
            }else if($array[$i] == ""){ //공백일때
                $num_array[] = "h";
            }
            else if(!$boolean){        //일본어일때
                $num_array[] = $i;
            }
            
            $search_result[] = [
             'result' => $array[$i],
             'num_arr'=> $num_array[$i]    
            ];
            
        }
        return view('searchResponse')->with('search_result',$search_result);
        
    }
    
    //한글체크
    public function hangle_check($str){
        if(preg_match("!['.'\x{1100}-\x{11ff}\x{3130}-\x{318f}\x{ac00}-\x{d7af}'.']+!u", $str)){

		    return true;
	    }
	    else{
		    return false;
	    }
    }
    
    //단어 저장
    public function save(Request $req){
        
        $japanese = $req->japanese;
        $korean   = $req->korean;
        DB::table('words')->insert([
            "japanese"   => $japanese,
            "korean"     => $korean
        ]);
        
        return redirect()->route('index');
        
    }
    
    
}
