<?php 
	include("class/mysql_adapter.php");
	$dbadapter = new Mysql_adapter();
	$page_size = 5;
	$check_amount = "SELECT COUNT(*) AS amount FROM movie";
	$res_amount = mysql_query($check_amount);
	$row_amount = mysql_fetch_array($res_amount);
	$amount = $row_amount['amount'];
	// 记算总共有多少页
	if( $amount )
	{
  		if( $amount < $page_size ){ $page_count = 1; }        //如果总数据量小于$PageSize，那么只有一页
  		if( $amount % $page_size )
  		{                 //取总数据量除以每页数的余数
    		$page_count = (int)($amount / $page_size) + 1;      //如果有余数，则页数等于总数据量除以每页数的结果取整再加一
  		}
  		else
  		{
    		$page_count = $amount / $page_size;           //如果没有余数，则页数等于总数据量除以每页数的结果
  		}
	}
	else
	{
  		$page_count = 0;
	}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" Content="text/html;charset=UTF-8">
	<link rel="icon" href="/img/logo.ico" mce_href="img/logo.ico" type="image/x-icon">
	<link rel="shortcut icon" href="img/logo.ico" mce_href="img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link href="css/layout.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/showpic.js"></script>
	<script type="text/javascript" src="js/index.js"></script>

	<title>Why so serious?</title>
</head>
<body onload="checkCookie();pageload()">
	<div id="container">
		<div id="header">
			<img src="img/m1.jpg" id="showpic"></div>
		<div id="mainContent">
			<div id="sidebar" >
				<div id="login">
					<form id="loginform" menthod="post">
						<input type="text" id="username" name="username" />
						<input type="password" id="password" name="password" />
						<button type="button" class="sign_up"></button>
						<button type="button" onclick="login()"  class="sign_ok"></button>
					</form>
				</div>
				<div id="favorite"></div>
			</div>

			<div id="content">
				<div id="search" >
					<form id="searchform" menthod="get">
						<input type="text" id="searchinput" />
						<button type="button" class="searchsubmit" onclick="search()"></button>
					</form>
				</div>
				<div id="movie">
					<div id="top_list">
						
					</div>

				</div>
				<div id="page">
					<?php 
						for($i=1;$i<=$page_count;$i++)
						{
					?>		<button type="button" class="page_button" value="<?php echo $i; ?>" onclick="pagechange(this.value)"><?php echo $i ?></button>


						
					<?php  
						}
					?>
				</div>
			</div>
		</div>

		<div id="footer">©powerd by Burhh.</div>
	</div>
</body>

</html>