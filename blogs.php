<?php 
session_start();
require 'components/doc.php';
require 'pdo.php';



$db = new Database();
$notes = $db->query('SELECT notes.*, users.name AS user_name FROM notes JOIN users ON notes.user_id = users.id');


?>
<link rel="stylesheet" >

<main>
    
    <div class="content-container">

    <?php 
    foreach ($notes as $note): ?>
       
    <div style="margin: 20px auto; max-width: 800px; background: #f9f9f9; border: 1px solid #e1e1e1; border-radius: 5px; padding: 20px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <article style="margin: 0; padding: 0;">
            <h2 style="color: #333; font-size: 24px; margin-bottom: 10px;">Posted by <?php echo $note['user_name']?></h2>
            <div style="color: #666; font-size: 16px; line-height: 1.6;">
                <?php echo htmlspecialchars($note['body']); ?>
            </div>
           
            <form action="delete_note.php" method="POST" style="margin-top: 20px;">
               
                <input type="hidden" name="note_id" value="<?php echo $note['id']; ?>">
                <input type="hidden" name="user_id" value="<?php echo $note['user_id']; ?>">
                
                <button type="submit" style="cursor: pointer; padding: 10px 20px; background-color: red; color: white; border: none; border-radius: 5px;">Delete</button>
            </form>
        </article> 
    </div>
<?php endforeach; ?>
    </div>
</main>
