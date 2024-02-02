<?php 
include "header.php"; 

if(isset($_GET['id'])){
    $post = $conn->prepare("SELECT * FROM blogs WHERE id = '".$_GET['id']."'");
    $post->execute();
    $post_result = $post->get_result();
    $row_post = $post_result->fetch_assoc();
} else{
    header("location: ./blog.php");
}

?>
    <main>
        <div class="container">
            <div class="post">
                <h3>New Post</h3>
                <div class="img_con">
                    <img src="./php/uploads/<?=$row_post['image1']?>" width="250px" height="268px" alt="">
                    <div>
                        <img src="./php/uploads/<?=$row_post['image2']?>" width="130px" height="130px"  alt="">
                        <img src="./php/uploads/<?=$row_post['image1']?>" width="130px" height="130px" alt="">
                    </div>
                </div>
                <div class="text_post">
                    <p><?=$row_post['content']?></p>
                </div>
                <div class="action">
                    <?php $user_id = isset($_SESSION['id'])? $id : '';
                        if($user_id == $row_post['user']){ ?>
                        <a href="./edit.php?id=<?=$row_post['id']?>">edit</a>
                        <a href="./php/delete.php?delete=<?=$row_post['id']?>">delete</a>
                    <?php } else{} ?>
                </div>
            </div>
            <div class="comment">
                <form action="">
                    <label for="comment">comments</label><br>
                    <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                    <input type="submit" value="submit">
                </form>
            </div>
        </div>
        
        <div class="bottom">

        </div>
    </main>
</body>
</html>