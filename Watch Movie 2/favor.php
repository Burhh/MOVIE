<?php 
	include("class/mysql_adapter.php");
	$dbadapter = new Mysql_adapter();
	if($_COOKIE['user']!="") //判断cookie是否存在
	{
		$favorNum = $_GET['mov_num'];
		$username = $_COOKIE['user'];
		$check_favor = "SELECT movNum FROM favor WHERE movNum='$favorNum' AND userName='$username'";
		$res_check = mysql_query($check_favor) or die (mysql_error());
		//echo $arr_check['movNum'];
		//echo ! ($arr_check = mysql_fetch_array($res_check)) ;
		if(   ! ($arr_check = mysql_fetch_array($res_check))    ) //判断是否已经收藏
		{
			$add_favor = "INSERT INTO favor (movNum,userName) VALUES ('$favorNum','$username') ";
			mysql_query($add_favor) or die (mysql_error()); //插入新收藏
						
			$select_movie = "SELECT movLink , movENName ,movCHName FROM movie WHERE movNum='$favorNum'  ";
			$res_movie = mysql_query($select_movie) or die(mysql_error());
			$arr_movie = mysql_fetch_array($res_movie);  //抓取新收藏
?>
<div class="favor">
	<p><?php echo $arr_movie['movLink'] ?> </p>
	<p><?php echo $arr_movie['movCHName'] ?> </p>
	<p><?php echo $arr_movie['movENName'] ?> </p> 	
</div>
<?php 	
		}		 			
	}
?>