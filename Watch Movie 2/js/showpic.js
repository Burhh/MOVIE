var curIndex=0;  //指针
var timeInterval=5000; //设置时间间隔
var arr=new Array(); //创建图片数组
arr[0]="m1.jpg"; 
arr[1]="m2.jpg"; 
arr[2]="m3.jpg"; 
arr[3]="m4.jpg"; 
arr[4]="m5.jpg"; 
setInterval(changeImg,timeInterval); 
function changeImg() 
{ 
var obj=document.getElementById("showpic"); 
if (curIndex==arr.length-1) 
{ 
curIndex=0; 
} 
else 
{ 
curIndex+=1; 
} 
obj.src="img/"+arr[curIndex]; //改变图片地址
}


