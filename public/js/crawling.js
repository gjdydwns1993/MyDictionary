var request = require('request');
var cheerio = require('cheerio');
var fs = require('fs');
var keyword=process.argv[2]; //매게변수로 넘어온 단어 , 검색한단어


var ur = "http://jpdic.naver.com/search.nhn?dic_where=jpdic&query="+keyword;
var url = encodeURI(ur); //문자열 인코딩한다

var postElement; // 검색결과 노드
var postTitle;   // 단어
request(url,function(error,response,body){
  if(error) throw error;

    var $ = cheerio.load(body);
    postElement = $("div.section_word div.srch_box div.srch_top p.entry"+
                    ", div.section_word div.srch_box span.pin span.lst_txt"+
                    ", div.section_word div.srch_box ol.lst li.inner_lst");
    
    postElement.each(function(){
        postTitle = $(this).text();
        console.log(postTitle);
    });
});