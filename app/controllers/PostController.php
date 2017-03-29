<?php

namespace Blog\Controllers;

use Blog\Models\Post;


class PostController extends BaseController{

	public function get(){
		
}

	public function post(){
		
		if(isset($_POST["firstname"])&&isset($_POST["lastname"]))
		{
			
		if(isset($_POST["lastname"])&&isset($_POST["firstname"])&&isset($_POST["email"])){
		if(Post::create2($_POST["email"], $_POST["firstname"],$_POST["lastname"])){
			$msg="registered successfully";
		echo "her333e";
		}
		else{$msg="unsuccessfull registration";}
		$this->render('all_posts.html',['message'=> $message]);
		}
		}


	else{
	
		$email = $_POST['email'];
		$link_name = $_POST['link_name'];
		$link = $_POST['link'];
		$data;
		$are_login=Post::search($email);
		
		if($are_login){
				
				$msg_login= "you are registered.";
		if(isset($link)&&isset($link_name)){
		if (Post::create($email, $link_name,$link)){

			$msg_query = "Query was entered successfully";
		}
		else {
			
			$msg_query = "Query insertion failed";
		}  }
		
		$data=Post::retrieve($email);
				}
		else
			{$msg_login="You are not registered!!!!!!!!!";
			
			}


		$this->render('post_create.html', ['message_login' => $msg_login, 'message_query' => $msg_query, 'data1' => $data[0], 'data2' => $data[1]]);
			
	}
	}
} ?>