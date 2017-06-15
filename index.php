<?php

define('RESTRICTED',1);
error_reporting(E_ALL);
//Ensure that a session exists (just in case)
if( !session_id() ) {
    session_start();
}

require('config/app.php');
require('config/database.php');
require('config/ArticleModel.php');
require('libraries/FlashMessage.php');
require('libraries/StoreValidation.php');

// here our routes
$page = (! empty($_GET['page'])) ? $_GET['page'] : null ;


switch ($page) {
	case 'articles':
		
		require('articles/index.php');	
		
		break;
	
	default:
		require('home.php');
		break;
}
