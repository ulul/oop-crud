<?php

if(!defined('RESTRICTED'))exit('No direct script access allowed!');
$model = new ArticleModel;
try {

	$id = $_GET['id'];

	$model->deleteArticle($id);

	flash('article_flash', 'Article has been deleted', 'success');
	echo json_encode(['status' => true]);

} catch(Exception $e) {
	flash('article_flash', 'Error: '.$e->getMessage(), 'danger');
	echo json_decode(['status' => false]);
}
