<?php 
	include("class/mysql_adapter.php");
	$dbadapter = new Mysql_adapter();
	$page = 1;

	$search = $_GET['search'];	
	$search_movie = "SELECT * FROM movie WHERE movENName OR movCHName LIKE '%$search%'  ";
	$res_search = mysql_query($search_movie) or die (mysql_error());
	
?>
<ul id="<?php //echo "page".$page; ?>">
<?php 
	if ($arr_search = mysql_fetch_array($res_search))
	{
?>
<li class="<?php echo $row_page['movNum']; ?> ">
	<div class="mov_pic"><?php echo $arr_search['movLink']; ?></div>
		<div class="mov_con">
		<h2 class="pb6"><?php echo $arr_search['movCHName'].$arr_search['movENName']; ?></h2>
			<p>
				导演：
				<?php echo $arr_search['director']; ?></p>
			<p>
				主演：
				<?php echo $arr_search['starring']; ?></p>
			<p>
				类型：
				<?php echo $arr_search['type']; ?></p>
			<p>
				上映日期：
				<?php echo $arr_search['releaseDate']; ?></p>
			<p class="context">
				<?php echo $arr_search['content']; ?></p>
		</div>
		<button type="button" class="favor_button" value="<?php echo $row_page['movNum']; ?>" onclick="favor(this.value)">
		</button>
</li>
<?php 
	}
	else 
	{
?>  	
<li class="<?php echo $row_page['movNum']; ?> ">
	<?php echo "没有找到相关内容！"; ?>
</li>
<?php 
	}	
?>
</ul>
