<?php

namespace Blog\Models;

class Post {
	public static function DB(){
		return new \PDO("mysql:dbname=myDB;host=localhost","root", "98527410.0+");
	}

	public static function create($email,$link_name,$link){
		$db = self::DB();
		$query = $db->prepare("INSERT INTO links(email, link_name, link) values ( :email, :link_name, :link)");
		$res = $query->execute(
			['email' => $email,
			'link_name' => $link_name,
			'link' => $link]);

		if (!$res) {
			var_dump($query->errorInfo());
		}

		return $res;
	}
	public static function retrieve($email){
	$servername = "localhost";
	$username = "root";
	$password = "98527410.0+";
	$dbname = "myDB";
	$data=array(array(),array());
	$conn =mysqli_connect($servername, $username, $password, $dbname);
	$i=1;
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	} 


	$sql = "SELECT * FROM links";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $a=$row["email"]; $b=$email; 
        if($a==$b) {array_push($data[0],$row["link_name"]);array_push($data[1],$row["link"]); $i=$i+1;}  
       
    }
	} 
	return $data;
	}
	public static function search($email){
	$servername = "localhost";
	$username = "root";
	$password = "98527410.0+";
	$dbname = "myDB";
	$is_it=false;
	$conn =mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	} 


	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);
 	$i=0;$j=0;
	if (mysqli_num_rows($result) > 0) {
    // output data of each row 
		
    while(($row = mysqli_fetch_assoc($result))&&(!$is_it)) {
        $i++;
        $a=$row["email"]; $b=$email;
        if($a==$b) {$is_it=true;}
       
    }
	}

	return $is_it;
	}

	public static function getPost($id){
		$db = self::DB();
		$query = $db->prepare('SELECT * FROM posts where id = :id');

		$result = $query->execute(['id' => $id]);
		if (!$result){
			print_r($query->errorInfo());
		}
		return $query->fetch(\PDO::FETCH_ASSOC);
	}


	public static function getAll(){
		$db = self::DB();
		$query = $db->prepare('SELECT * FROM posts');

		$result = $query->execute();
		if (!$result){
			print_r($query->errorInfo());
		}
		return $query->fetchAll();
	}
} ?>