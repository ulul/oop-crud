<?php
if(!defined('RESTRICTED'))exit('No direct script access allowed!');
/**
* 
*/
class database 
{
	
	function connection()
	{
		try {
			$conn = new PDO('mysql:host=localhost;dbname=ongisschool_crud', 'root', 'root');
	        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
		} catch (Exception $e) {
			 $conn = null;
		}
			return $conn;
	}
}