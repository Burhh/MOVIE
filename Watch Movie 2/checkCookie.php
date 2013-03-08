<?php 
	include("class/mysql_adapter.php");
	$dbadapter = new Mysql_adapter();
	if($_COOKIE['user']!="")
	{

		$username = $_COOKIE['user'];
		$select_favor = "SELECT movNum FROM favor WHERE userName='$username' ";
		$res_favor = mysql_query($select_favor) or die(mysql_error());
		while($arr_favor = mysql_fetch_array($res_favor))
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