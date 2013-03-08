<?php 
	include("class/mysql_adapter.php");
	$dbadapter = new Mysql_adapter();
	$page_size = 5;
	if( isset($_GET['page']) )
	{
  		$page = intval( $_GET['page'] );
	}
	else
	{
  		$page = 1;
	} 
	$page_movie = "SELECT * FROM movie ORDER BY ID ASC LIMIT ". ($page-1)*$page_size .",$page_size  ";
	$res_page = mysql_query($page_movie) or die (mysql_error());
?>
<ul id="<?php echo "page".$page; ?>">
<?php  
	while ($row_page = mysql_fetch_array($res_page))
	{
?>
<li class="<?php echo $row_page['movNum']; ?> ">
	<div class="mov_pic"><?php echo $row_page['movLink']; ?></div>
		<div class="mov_con">
		<h2 class="pb6"><?php echo $row_page['movCHName'].$row_page['movENName']; ?></h2>
			<p>
				导演：
				<?php echo $row_page['director']; ?></p>
			<p>
				主演：
				<?php echo $row_page['starring']; ?></p>
			<p>
				类型：
				<?php echo $row_page['type']; ?></p>
			<p>
				上映日期：
				<?php echo $row_page['releaseDate']; ?></p>
			<p class="context">
				<?php echo $row_page['content']; ?></p>
		</div>
		<button type="button" class="favor_button" value="<?php echo $row_page['movNum']; ?>" onclick="favor(this.value)">
		</button>
</li>
<?php 
	}
?>  	
</ul>