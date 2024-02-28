
<?php 


    class Database {
        
        public $connection;

        public function __construct() {

        $dsn = "pgsql:host=localhost;port=5432;dbname=db_php";
            $user = 'postgres';
            $password = 'qjmihuq';

            $this->connection = new PDO($dsn, $user, $password);


        }
        public function query( $query  ) {
          


            $statement = $this->connection->prepare( $query );


            
            $statement->execute();


            return $statement;
         
        
        }

        public function query_p( $query , $params= [] ) {
          


            $statement = $this->connection->prepare( $query );


            
            $statement->execute($params);


            return $statement->fetch( PDO::FETCH_ASSOC );
         
        
        }

        public function executeQuery($query, $params = []) {
            $statement = $this->connection->prepare($query);
            return $statement->execute($params);
        }
        
       

        

    }


    