<h1>日本語辞書</h1>
<form method="post" action="/search">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <input class="form-control" type="text" name="keyword" placeholder="검색 키워드를 입력하세요!"/>
  <span>
      <button class="btn btn-secondary" type="submit">SEARCH</button>    
  </span>
</form>