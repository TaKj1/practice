

  
  


  <main>
    

 <?php 
       session_start();
       if (!isset($_SESSION['user'])){
        header('location: register-controller.php');
        exit();
       }else {

                  require 'components/doc.php' ;
                require 'pdo.php' ;
                 $db = new Database();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];
            $success = [];
            if (strlen($_POST['body']) === 0) {
                $errors['body'] = 'E drasni neshto ne se svidi';
            }
        
           
            if (strlen($_POST['body']) > 1000) {
                $errors['body'] = 'Skysi go toq text';
            }
        
            if (empty($errors)) {
                $sucess['success'] = 'Postna go chikiq';
                $db->query_p('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
                    'body' => $_POST['body'],
                    'user_id' => $_SESSION['user']['id']
                ]);

              
               
                
                
            }
        }}
                ?>
        

    <?php require 'pcomment.php'?>
  </main>
</div>  

