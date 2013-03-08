<?php 

//判断magic_quotes_gpc状态（大多数情况为开启状态）
if(@get_magic_quotes_gpc()==0){ //如果当前服务器为关闭状态
$_GET = sec($_GET);
$_POST = sec($_POST);
$_COOKIE = sec($_COOKIE);
$_FILES = sec($_FILES);
}
$_SERVER = sec($_SERVER);

//自定义的过滤函数
function sec(&$array){
if(is_array($array)){
foreach($array as $key => $value){
$array[$key] = sec($value);
}
}else if(is_string($array)){
$array = addslashes($array);
}else if(is_numeric($array)){
$array = intval($array);
}
return $array;
}

//数字类型检测函数
function num_check($id){
if(!$id){
die('参数不能为空！');
}else if(inject_check($id)){
die('非法参数！');
}else if(!is_numeric($id)){
die('非法参数！');
}
$id = intval($id);
return $id;
}

//字符串类型检测函数
function str_check($str){
$str = htmlspecialchars($str);
return $str;
}

//搜索功能检测函数
function search_check($str){
$str = str_replace("_", "_", $str); //过滤掉 '_'
$str = str_replace("%", "%", $str); //过滤掉 '%'
$str = htmlspecialchars($str);
return $str;
}
//SQL语句防注入检查,返回0或1，如果返回1说明检测到敏感字符，禁止执行！
function inject_check($sql_str){
//不区分大小写的正则表达式匹配
return eregi('select|insert|update|delete|or|into|',$sql_str);
}
?>
