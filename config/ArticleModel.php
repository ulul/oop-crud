<?php
if(!defined('RESTRICTED'))exit('No direct script access allowed!');

class ArticleModel extends database
{
	/**
	* @param [type] $data [description]
	*/

    public function __construct()
	{
		$this->db = database::connection();
	}

	/**
	* @param [type] $data [description]
	* @return
	*/

    public function getData(){
		$query = $this->db->prepare("SELECT * FROM articles");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


    public function addArticle($title,$content,$author,$created_at,$updated_at)
    {
    	$query = $this->db->prepare('INSERT INTO articles (title, content, author, created_at, updated_at) VALUES (:title, :content, :author, :created_at, :updated_at)');
    	$query->execute(
    		[
				'title' => $title,
				'content' => $content,
				'author' => $author,
				'created_at' => $created_at,
				'updated_at' => $updated_at
			]
    	);
    	return $query->rowCount();

    }

	/**
	* @param [$id] 
	*/

    public function getDataById($id)
    {
		$query = $this->db->prepare('SELECT * FROM articles WHERE id=:id');
        $query->execute(['id' => $id]);
        return $query->fetch(PDO::FETCH_OBJ);
	}

	/**
	* @param [$id,$title,$content,$author,$updated_at] 
	* @return 
	*/

    public function editArticle($id,$title,$content,$author,$updated_at)
    {
		$query = $this->db->prepare('UPDATE articles SET title=:title, content=:content, author=:author, updated_at=:updated_at WHERE id=:id');
		$query->execute([
			'title' => $title,
			'content' => $content,
			'author' => $author,
			'updated_at' => $updated_at,
			'id' => $id
		]);
		return $query->rowCount();
	}

	/**
	* @param [$id] 
	* @return 
	*/

    public function deleteArticle($id)
    {
    	$query = $this->db->prepare('DELETE FROM articles WHERE id=:id');
        $query->execute(['id' => $id]);
        return $query->rowCount();
    }
}