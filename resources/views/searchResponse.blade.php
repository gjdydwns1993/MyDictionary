@extends('layouts.layout')
@section('content')
    <div id="result">
        <h1 id="h1">검색결과</h1>
    @foreach($search_result as $key)
        @if(!is_string($key['num_arr']))
            <hr>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <p>[일본어] {{$key['result']}}</p>
            <input type="button" value="저장하기" id="{{$var++}}" class="save"/>
        @else
            <p>{{$key['result']}}</p>
        @endif
    @endforeach
    </div><!--end div id result-->
    <style>
        #result{
            width:96%;
            margin-left:15px;
        }
        #h1{
            margin-left:41%;
        }
        .save{
            float:right;
        }
    </style>
    <script type="text/javascript">
        var saveBtn = document.getElementsByClassName("save");
        
        var saveWord = function(i){
            saveBtn[i].addEventListener('click',function(){
                var japanese = saveBtn[i].previousSibling.previousSibling;
                var korean = saveBtn[i].nextSibling.nextSibling;
                var token  = saveBtn[i].previousSibling.previousSibling.previousSibling.previousSibling;
                var array = {
                    "japanese":japanese.innerHTML, //읿본어
                    "korean"  :korean.innerHTML,   //한국어
                    "_token"  :token.value         //token
                };
                post("https://mydictionary-heoyongjun.c9users.io/save",array,"post");
                
            },'false');
        }
        
        for(var i=0; i<saveBtn.length; i++){
            saveWord(i);
        }
        
        //동적으로 form 생성 , 단어 전송
        function post(path,params,method){
            var form = document.createElement("form");
            document.body.appendChild(form);
            form.setAttribute("method",method);
            form.setAttribute("action",path);
            for(var key in params){
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type","hidden");
                hiddenField.setAttribute("name",key);
                hiddenField.setAttribute("value",params[key]);
                form.appendChild(hiddenField);
            }
            form.submit();
        }
    </script>
@endsection
