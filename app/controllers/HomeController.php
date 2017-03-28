<?php

namespace Blog\Controllers;

class HomeController extends BaseController{
	public function get(){
		$this->render('home.html');
	}
}

?>
