<?php
header("content-type:text/html; charset=utf-8");
class Mysql_adapter{

	public function __construct(){

		$this->conn = mysql_connect('localhost','root','');
		$res = mysql_select_db(db_Movie, $this->conn) or die(mysql_error());
        mysql_query("SET NAMES utf8");
		if(!$res){

			echo "datebase connect erro";
		}
	}
	
}