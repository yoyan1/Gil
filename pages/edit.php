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
<style>
    img{
        cursor: pointer;
    }
</style>
    <main>
        <div class="container">
            <div class="form_wrap">
                <form action="./php/edit.php?id=<?=$row_post['id']?>" method="post" enctype="multipart/form-data">
                    <div class="form">
                        <div class="image_wrap">
                            <label for="image1"><img id='image-top' width='159' height='157' src='./php/uploads/<?=$row_post['image1']?>'></label>
                            <input type="file" name="image1" id="image1" onchange="change()">
                            <label for="image2"><img id='image-bot' width='159' height='157' src='./php/uploads/<?=$row_post['image2']?>'></label>
                            <input type="file" onchange="change2()" name="image2" id="image2">
                        </div>
                        <textarea name="content"  placeholder="write something here..."><?=$row_post['content']?></textarea>
                    </div>
                    <div class="btn">
                        <button name="submit">post image</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="bottom">

        </div>
    </main>
    <script>
         function change() {
            const image1 = document.getElementById("image1");
            if(image1.value !=''){
                document.getElementById("image-top").src = URL.createObjectURL(image1.files[0]);
            } else{
                
            }
        }

        function change2() {
            const image2 = document.getElementById("image2");
            if(image2.value != ''){
                document.getElementById("image-bot").src = URL.createObjectURL(image2.files[0]);
            } else{

            }
        }
    </script>
</body>
</html>