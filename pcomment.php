<div style="margin: 20px auto; max-width: 800px; background: #f9f9f9; border: 1px solid #e1e1e1; border-radius: 5px; padding: 20px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
    <article style="margin: 0; padding: 0;">
        <h2 style="color: #333; font-size: 24px; margin-bottom: 10px;">Write your comment <?php echo $_SESSION['user']['name']?></h2>
        <form method="post">
            <textarea id="body" name="body"  placeholder="Add your comment..."  style="width: 100%; padding: 10px; margin-bottom: 10px;"></textarea>
            <button type="submit" style="padding: 10px 20px; background-color: #0056b3; color: white; border: none; border-radius: 5px; cursor: pointer;">Post</button>
            <?php if (isset($errors['body'])) : ?>
           <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                     <?php endif; ?>

                   

            

            
        </form>
    </article> 
</div>
