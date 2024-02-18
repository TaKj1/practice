<?php 

    require "functions.php";


    class Database{
        public $connection;
        
    public function __construct(){
        $dsn = "pgsql:host=localhost;port=5432;dbname=db_php";
        $user = 'postgres';
        $password = 'qjmihuq';

        $this ->connection = new PDO($dsn, $user, $password);

    }


    public function query($query){  
        $statement = $this ->connection -> prepare($query);
        $statement -> execute();

        return $statement;
    }
    
}
    $db = new Database();
    $posts = $db -> query("select * from posts") -> fetchAll(PDO::FETCH_ASSOC);
    $dd($posts);
   
