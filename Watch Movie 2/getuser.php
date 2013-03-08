<?php 
	include("class/mysql_adapter.php");
	$dbadapter = new Mysql_adapter();
	$username = $_POST['user_name'];  //用户名
	$password = $_POST['pass_word'];	//用户密码
	$select_user = "SELECT userName FROM user WHERE userName='$username' AND Password='$password'";
	$res_user = mysql_query($select_user) or die(mysql_error());
    $arr_user = mysql_fetch_array($res_user); 
    $user = $arr_user['userName'];
	setcookie("user",$user,time()+3600);//设置cookies
	if($arr_user !='')//判断用户是否存在
	{
		$select_favor = "SELECT movNum FROM favor WHERE userName='$username' ";
		$res_favor = mysql_query($select_favor) or die(mysql_error());
		while($arr_favor = mysql_fetch_array($res_favor))//输出电影内容
		{						
			$favor = $arr_favor['movNum'];
			$select_movie = "SELECT movLink , movENName ,movCHName FROM movie WHERE movNum='$favor'  ";
			$res_movie = mysql_query($select_movie) or die(mysql_error());
			$arr_movie = mysql_fetch_array($res_movie);

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

