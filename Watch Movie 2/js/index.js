function GetXmlHttpObject() //获得xmlhttp对象
{
	var xmlHttp=null;
	try
 	{
 		// Firefox, Opera 8.0+, Safari
 		xmlHttp=new XMLHttpRequest();
 	}
	catch (e)
 	{
 		//Internet Explorer
 	try
  		{
 			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  		}
 	catch (e)
  		{
  			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
	}
	return xmlHttp;
}

function getCookie(c_name) //获得cookie
{
if (document.cookie.length>0) //判断cookie存在
  {
  c_start=document.cookie.indexOf(c_name + "=") 
  if (c_start!=-1)
    { 
    c_start=c_start + c_name.length+1  //开始位置
    c_end=document.cookie.indexOf(";",c_start)
    if (c_end==-1) c_end=document.cookie.length //结束位置
    return unescape(document.cookie.substring(c_start,c_end))
    } 
  }
return ""
}


function $(id) //通过id获得对象
{
	return document.getElementById(id);
}

function checkCookie() //检查cookie是否存在
{
	if(getCookie('user')!="") 
	{
		$('login').style.display = "none"; //隐藏登录界面
		$('favorite').style.display = "block"; //显示登录界面
		var xmlHttp;
		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null)
 		{
 			alert ("Browser does not support HTTP Request")
 			return
 		}
		var url="checkCookie.php";
		xmlHttp.onreadystatechange=function()
  		{
  			if (xmlHttp.readyState==4 && xmlHttp.status==200)
    		{
					$('favorite').innerHTML = xmlHttp.responseText;
    		}
  		}
		xmlHttp.open("GET",url, true)
		xmlHttp.send();
	}
	else
	{
		$('login').style.display = "block";
		$('favorite').style.display = "none";
	}

}


function login() //登录
{
	if($('username').value == '' && $('password').value == '') //判断是否有值
	{
		$('username').value = "请输入用户名和密码！";
		$('username').focus();
	}
	else if($('username').value == '')
	{
		$('username').value = "请输入用户名!";
		$('username').focus();
	}
	else if($('password').value == '')
	{
		$('username').value = "请输入密码!";
		$('password').focus();
	}

	else if($('username').value != '' && $('password').value != '')
	{


		var username = $('username').value;
		var password = $('password').value;
		
		var xmlHttp;    //实例化对象
		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null)
 		{
 			alert ("Browser does not support HTTP Request")
 			return
 		}
		var url="getuser.php";
		var postStr = "user_name="+username+"&pass_word="+password;
		xmlHttp.onreadystatechange=function()
  		{
  			if (xmlHttp.readyState==4 && xmlHttp.status==200)
    		{
    			if (getCookie('user')!='') 
    			{
    				$('login').style.display = "none";
					$('favorite').style.display = "block";
					$('favorite').innerHTML = xmlHttp.responseText;
    			}
    			else{
    				alert("输入的用户名或密码错误！")
    			}

    		}
  		}
		xmlHttp.open("POST",url, true)
		xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlHttp.send(postStr);
	}

}

function pagechange(Opage) //页面翻转，通过$_GET['page']传递当前页
{
	var xmlHttp;
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
 	{
 		alert ("Browser does not support HTTP Request")
 		return
 	}
	var url="page.php?page="+Opage;
	xmlHttp.onreadystatechange=function()
  	{
  		if (xmlHttp.readyState==4 && xmlHttp.status==200)
    	{ 	
    		$('top_list').innerHTML = xmlHttp.responseText
    	}
  	}
	xmlHttp.open("GET",url, true)
	xmlHttp.send();
}

function favor(oFavor) //动态追加收藏
{
	if(getCookie('user')!="") //判断cookie是否存在
	{
		var list = $("favorite");
		var xmlHttp;
		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null)
 		{
 			alert ("Browser does not support HTTP Request")
 			return
 		}
		var url="favor.php?"+"mov_num="+oFavor;
		xmlHttp.onreadystatechange=function()
  		{
  			if (xmlHttp.readyState==4 && xmlHttp.status==200)
    		{

				var newFavor = document.createElement("favor"); //定义新节点
				newFavor.innerHTML = xmlHttp.responseText  //设置新节点内容
				list.insertBefore(newFavor,list.childNodes[0]); //在第一个节点前插入内容
    		}
  		}
		xmlHttp.open("GET",url, true)
		xmlHttp.send();
		

	}
	else
	{
		alert("请先登录！");
	}
}

function pageload() //默认载入第一页
{
	var xmlHttp;
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
 	{
 		alert ("Browser does not support HTTP Request")
 		return
 	}
	var url="page.php?page=1";
	xmlHttp.onreadystatechange=function()
  	{
  		if (xmlHttp.readyState==4 && xmlHttp.status==200)
    	{ 	
    		$('top_list').innerHTML = xmlHttp.responseText
    	}
  	}
	xmlHttp.open("GET",url, true)
	xmlHttp.send();
}

function search()	//搜索
{
	var Osearch = $('searchinput').value; //得到输入值
	if(Osearch != '') // 判断输入值是否为空
	{
	var xmlHttp;
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
 	{
 		alert ("Browser does not support HTTP Request")
 		return
 	}
	var url="search.php?search="+Osearch;
	xmlHttp.onreadystatechange=function()
  	{
  		if (xmlHttp.readyState==4 && xmlHttp.status==200)
    	{ 	
    		$('top_list').innerHTML = xmlHttp.responseText
    		//alert(xmlHttp.responseText);
    	}
  	}
	xmlHttp.open("GET",url, true)
	xmlHttp.send();
	}
	else 
	{
		alert("请输入搜索内容！");
	}
}