<?php

namespace Blog\Controllers;

use Blog\Models\Post;


class PostController extends BaseController{

	public function get($id = null){
		if ($id){
			$post = Post::getPost($id);
			$this->render('post.html', ['post' => $post]);
		}
		else{
			$posts = Post::getAll();
			$this->render('all_posts.html', ['posts' => $posts]);
		}
	}

	public function post(){
		$email = $_POST['email'];
		$link_name = $_POST['link_name'];
		$link = $_POST['link'];
		$data;
		$are_login=Post::search($email);
		
		if($are_login){
				
				$msg_login= "you are registered.";
		
		if (Post::create($email, $link_name,$link)){

			$msg_query = "Query was entered successfully";
		}
		else {
			
			$msg_query = "Query insertion failed";
		}
		
		$data=Post::retrieve($email);
				}
		else
			{$msg_login="You are not registered!!!!!!!!!";
			
			}


		$this->render('post_create.html', ['message_login' => $msg_login, 'message_query' => $msg_query, 'data1' => $data[0], 'data2' => $data[1]]);
			

	}
} ?>