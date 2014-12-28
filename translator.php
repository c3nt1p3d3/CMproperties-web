<?php
//---------------------------------------------------------------Translator----------------------------------------------------------------------------

function curl($url,$params = array(),$is_coockie_set = false)
{
 
if(!$is_coockie_set){
/* STEP 1. let’s create a cookie file */
$ckfile = tempnam ("/tmp", "CURLCOOKIE");
 
/* STEP 2. visit the homepage to set the cookie properly */
$ch = curl_init ($url);
curl_setopt ($ch, CURLOPT_COOKIEJAR, $ckfile);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec ($ch);
}
 
$str = ''; $str_arr= array();
foreach($params as $key => $value)
{
$str_arr[] = urlencode($key)."=".urlencode($value);
}
if(!empty($str_arr))
$str = '?'.implode('&',$str_arr);
 
/* STEP 3. visit cookiepage.php */
 
$Url = $url.$str;
 
$ch = curl_init ($Url);
curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
 
$output = curl_exec ($ch);
return $output;
}
 




function Translate($word,$conversion)
{

$lan_1 = 'en';
$lan_2 = $_GET['lang'];
$conversion = $lan_1.'_to_'.$lan_2;

if ($conversion=='en_to_'){
	$conversion = 'en_to_en';
}


$word = urlencode($word);
// english to spanish
if($conversion == 'en_to_es')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=es&sl=en&tl=es&multires=1&otf=2&pc=1&ssel=0&tsel=0&sc=1';

// english to english
if($conversion == 'en_to_en')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=en&sl=en&tl=en&multires=1&otf=2&pc=1&ssel=0&tsel=0&sc=1';
 
// english to hindi
if($conversion == 'en_to_de')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=de&sl=en&tl=de&ie=UTF-8&oe=UTF-8&multires=1&otf=1&ssel=3&tsel=3&sc=1';

// english to hindi
if($conversion == 'en_to_fr')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=fr&sl=en&tl=fr&ie=UTF-8&oe=UTF-8&multires=1&otf=1&ssel=3&tsel=3&sc=1';
 
// hindi to english
if($conversion == 'en_to_ru')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=ru&sl=en&tl=ru&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';

// hindi to english
if($conversion == 'en_to_no')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=no&sl=en&tl=no&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';

// hindi to english
if($conversion == 'en_to_sv')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=sv&sl=en&tl=sv&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';

if($conversion == 'en_to_fi')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=fi&sl=en&tl=fi&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';

if($conversion == 'en_to_zh-CN')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=zh-CN&sl=en&tl=zh-CN&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';
 
//$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=en&sl=nl&tl=en&multires=1&otf=2&pc=1&ssel=0&tsel=0&sc=1';
 
$name_en = curl($url);

if($conversion == 'en_to_es'){
	$name_en = str_replace('€', '&euro;', $name_en);
}
 
$name_en = explode('"',$name_en);
if ($name_en[1] == 'en'){
	$return = null;
} else {
	$return = $name_en[1];
}

return  $return;
}

function Translate_desc($word,$conversion)
{

$lan_1 = 'en';
$lan_2 = $_GET['lang'];
$conversion = $lan_1.'_to_'.$lan_2;

if ($conversion=='en_to_'){
	$conversion = 'en_to_en';
}


$word = urlencode($word);
// english to spanish
if($conversion == 'en_to_es')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=es&sl=en&tl=es&multires=1&otf=2&pc=1&ssel=0&tsel=0&sc=1';

// english to english
if($conversion == 'en_to_en')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=en&sl=en&tl=en&multires=1&otf=2&pc=1&ssel=0&tsel=0&sc=1';
 
// english to hindi
if($conversion == 'en_to_de')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=de&sl=en&tl=de&ie=UTF-8&oe=UTF-8&multires=1&otf=1&ssel=3&tsel=3&sc=1';

// english to hindi
if($conversion == 'en_to_fr')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=fr&sl=en&tl=fr&ie=UTF-8&oe=UTF-8&multires=1&otf=1&ssel=3&tsel=3&sc=1';
 
// hindi to english
if($conversion == 'en_to_ru')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=ru&sl=en&tl=ru&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';

// hindi to english
if($conversion == 'en_to_no')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=no&sl=en&tl=no&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';

// hindi to english
if($conversion == 'en_to_sv')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=sv&sl=en&tl=sv&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';

if($conversion == 'en_to_fi')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=fi&sl=en&tl=fi&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';

if($conversion == 'en_to_zh-CN')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=zh-CN&sl=en&tl=zh-CN&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';
 
//$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=en&sl=nl&tl=en&multires=1&otf=2&pc=1&ssel=0&tsel=0&sc=1';
 
$name_en = curl($url);

if($conversion == 'en_to_es'){
	$name_en = str_replace('€', '&euro;', $name_en);
}
 
$name_en = explode('"',$name_en);
if ($name_en[1] == 'en' && $name_en[9]=='en'){
	$return = null;
} else if ($name_en[9]=='en') {
	$return = $name_en[1];
} else {
	$return = $name_en[1].$name_en[9];
}

$return = str_replace(' ,', ',', $return);

return  $return;
}






function Translate_defined($word,$conversion)
{

$word = urlencode($word);
// english to spanish
if($conversion == 'en_to_es')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=es&sl=en&tl=es&multires=1&otf=2&pc=1&ssel=0&tsel=0&sc=1';

// english to english
if($conversion == 'en_to_en')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=en&sl=en&tl=en&multires=1&otf=2&pc=1&ssel=0&tsel=0&sc=1';
 
// english to hindi
if($conversion == 'en_to_de')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=de&sl=en&tl=de&ie=UTF-8&oe=UTF-8&multires=1&otf=1&ssel=3&tsel=3&sc=1';

// english to hindi
if($conversion == 'en_to_fr')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=fr&sl=en&tl=fr&ie=UTF-8&oe=UTF-8&multires=1&otf=1&ssel=3&tsel=3&sc=1';
 
// hindi to english
if($conversion == 'en_to_ru')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=ru&sl=en&tl=ru&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';

// hindi to english
if($conversion == 'en_to_no')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=no&sl=en&tl=no&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';

// hindi to english
if($conversion == 'en_to_sv')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=sv&sl=en&tl=sv&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';

if($conversion == 'en_to_fi')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=fi&sl=en&tl=fi&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';

if($conversion == 'en_to_zh-CN')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=zh-CN&sl=en&tl=zh-CN&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';
 
//$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=en&sl=nl&tl=en&multires=1&otf=2&pc=1&ssel=0&tsel=0&sc=1';
 
$name_en = curl($url);

if($conversion == 'en_to_es'){
	$name_en = str_replace('€', '&euro;', $name_en);
}
 
$name_en = explode('"',$name_en);
if ($name_en[1] == 'en'){
	$return = null;
} else {
	$return = $name_en[1];
}

return  $return;
}

function Translate_desc_defined($word,$conversion)
{

$word = urlencode($word);
// english to spanish
if($conversion == 'en_to_es')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=es&sl=en&tl=es&multires=1&otf=2&pc=1&ssel=0&tsel=0&sc=1';

// english to english
if($conversion == 'en_to_en')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=en&sl=en&tl=en&multires=1&otf=2&pc=1&ssel=0&tsel=0&sc=1';
 
// english to hindi
if($conversion == 'en_to_de')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=de&sl=en&tl=de&ie=UTF-8&oe=UTF-8&multires=1&otf=1&ssel=3&tsel=3&sc=1';

// english to hindi
if($conversion == 'en_to_fr')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=fr&sl=en&tl=fr&ie=UTF-8&oe=UTF-8&multires=1&otf=1&ssel=3&tsel=3&sc=1';
 
// hindi to english
if($conversion == 'en_to_ru')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=ru&sl=en&tl=ru&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';

// hindi to english
if($conversion == 'en_to_no')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=no&sl=en&tl=no&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';

// hindi to english
if($conversion == 'en_to_sv')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=sv&sl=en&tl=sv&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';

if($conversion == 'en_to_fi')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=fi&sl=en&tl=fi&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';

if($conversion == 'en_to_zh-CN')
$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=zh-CN&sl=en&tl=zh-CN&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';
 
//$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=en&sl=nl&tl=en&multires=1&otf=2&pc=1&ssel=0&tsel=0&sc=1';
 
$name_en = curl($url);

if($conversion == 'en_to_es'){
	$name_en = str_replace('€', '&euro;', $name_en);
}
 
$name_en = explode('"',$name_en);
if ($name_en[1] == 'en' && $name_en[9]=='en'){
	$return = null;
} else if ($name_en[9]=='en') {
	$return = $name_en[1];
} else {
	$return = $name_en[1].$name_en[9];
}

$return = str_replace(' ,', ',', $return);

return  $return;
}








//---------------------------------------------------------------/Translator----------------------------------------------------------------------------


/*

Usage:

add
include 'translator.php';

and to translate:

Translate($text_to_translate,'en_to_es');

supported are: en_to_es and es_to_en

will make it with $_GET from the page and add trans='en_to_es'


*/




?>
