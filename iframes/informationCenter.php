<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body onload="showInfo()">
<?php
session_start ();
?>

<?php 
if(isset($_SESSION['login']))
{
    $var = $_SESSION['login'].".jpg";
    if(file_exists("../avatar/".$var))
        echo "<img src=\"../avatar/".$var."\" alt=\"avtar\" style=\"width:100px; height:100px;\">";
    else 
    {
        echo "<img src=\"../avatar/default_avatar.jpg\" alt=\"avtar\" style=\"width:100px; height:100px;\">";
        echo "<P align=center>
 	          <MARQUEE style=\"WIDTH: 700px; HEIGHT: 36px\" scrollAmount=10 direction=right>
	          <P align=center><FONT color=#ff0000 size=4><B>New User Can Upload Image To Use 
	 	      As Avatar!</B></FONT></P></MARQUEE></P>";
    }
    echo "<h3>Username:</h3> ";
    echo "&nbsp&nbsp&nbsp".$_SESSION['login'];
    echo "<h3>Last Login:</h3> ";
    echo "<div id=\"loginField\"></div>";
    echo "<h3>Last Logout:</h3>";
    echo "<div id=\"logoutField\"></div>";
}
?>
<div>
<?php 
?>
</div>
<script>
function showInfo()
{
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "../controller.php?display=" + "show Info", true);
	ajax.send();

	ajax.onreadystatechange = function() 
	{
		if (ajax.readyState == 4 && ajax.status == 200) 
		{
			var array = JSON.parse(ajax.responseText);
			document.getElementById("loginField").innerHTML = "&nbsp;&nbsp;&nbsp"+array[0]['LoginDate'];
			if(array[0]['LogoutDate'] === null)
				document.getElementById("logoutField").innerHTML = "&nbsp;&nbsp;&nbsp;Not recorded yet.";
			else
				document.getElementById("logoutField").innerHTML = "&nbsp;&nbsp;&nbsp;"+array[0]['LogoutDate'];		
		}
	}; // End anonymous function
}
</script>
</body>
</html>