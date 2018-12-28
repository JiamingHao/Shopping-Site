<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../style.css" />
<title>Insert title here</title>
</head>
<body onload="showTodaySale()">
<?php
session_start ();
?>

<div style="margin:20px; margin-left: 100px;" id="changeMe">
</div>

<script>
function showTodaySale()
{
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "../controller.php?getTodaySale=" + "getSale", true);
	ajax.send();
    
	ajax.onreadystatechange = function() 
	{
		if (ajax.readyState == 4 && ajax.status == 200) 
		{
			var array = JSON.parse(ajax.responseText);
			var str="";
			if(array.length == 0)
				str="<h3>No Sales Today</h3>";
			else
			{
				str+="<table><tr><th>id</th><th>username</th><th>item</th></tr>";
				
				for(var i=0; i<array.length;i++)
				{
					str+="<tr><td>";
					str+=array[i]['id'];
					str+="</td>";
					str+="<td>";
					str+=array[i]['username'];
					str+="</td>";
					str+="<td>";
					str+=array[i]['item'];
					str+="</td>";
					str+="</tr>";
				}

				str+="</table>";
			}
			document.getElementById("changeMe").innerHTML= str;
			
		}
	}
}
</script>


</body>
</html>
