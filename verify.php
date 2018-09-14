<?php
//### Server Configuration
$ServerName		= "101.109.246.31";
$UserName		= "root";
$UserPassword	= "";         //   
$DatabaseName	= "";


//### Connect to the Database
function ConnectDB() {
		global $conn;
		global $ServerName;
		global $UserName;
		global $UserPassword;
		global $DatabaseName;
	
		$conn = mysql_connect($ServerName, $UserName, $UserPassword);
		if(!$conn)
			die("Cannot Connect to Server");
		
		$select_db = mysql_select_db($DatabaseName);
		if(!$select_db)
			die("Cannot Select to Database");
		mysql_query("set names utf8");
	
}
