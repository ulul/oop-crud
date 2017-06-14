<?php

if(!defined('RESTRICTED'))exit('No direct script access allowed!');

// gather data
$title1 = (! empty($_POST['title1'])) ? $_POST['title1'] : '';
$content1 = (! empty($_POST['content1'])) ? $_POST['content1'] : '';
$author1 = (! empty($_POST['author1'])) ? $_POST['author1'] : '';

$title2 = (! empty($_POST['title2'])) ? $_POST['title2'] : '';
$content2 = (! empty($_POST['content2'])) ? $_POST['content2'] : '';
$author2 = (! empty($_POST['author2'])) ? $_POST['author2'] : '';

$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');
$database = new database;
$db = $database->connection();
$model = new ArticleModel;
try {
	$db->beginTransaction();

	// query 1

	$model->addArticle($title1,$content1,$author1,$created_at,$updated_at);

	// throw new Exception("Error Processing Request");
	
	// query 2

	$model->addArticle($title2,$content2,$author2,$created_at,$updated_at);
	
	$db->commit();
	flash('article_flash', 'Article has been stored', 'success');
	header('Location: '.$baseUrl.'index.php?page=articles');
} catch(Exception $e) {
	$db->rollback();
	flash('article_flash', 'Error: '.$e->getMessage(), 'danger');
	header('Location: '.$baseUrl.'index.php?page=articles&action=createMultiple');
}
