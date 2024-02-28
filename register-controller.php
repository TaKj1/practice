<?php

    session_start();
    if(isset($_SESSION['user'])){
        header('Location: /');
        exit();
    }


    require 'pdo.php';



    $db = new Database();

    function random_in3t(){
        $randomUniqueInt = random_int(1, 1000000);
        return $randomUniqueInt;
    }



    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       $email = $_POST['email'];
       $password = $_POST['password'];
       $name = $_POST['name'];
       $user = $db-> query_p('SELECT * from users where email = :email',[
        'email'=>$email
            
            ]);
    if($user) {
        $usermail = $user['email'];
        $errors['body'] = "User with $usermail already exists";
    
    }else {
        $random_id= random_in3t();
        $db -> executeQuery("INSERT INTO users(id,name, email, password) VALUES(:id ,:name, :email, :password)",[
            "id" => $random_id,
            "name"=> $name,
            "email"=>$email,
            "password"=>$password]);


           
            $_SESSION['user'] = [
                'email' => $email,
                'name' => $name,
                'id' => $random_id
            ];
           

            header('Location: /');
            exit();
    }

    }

    require 'register.php';

