<?php include "header.php"; ?>
    <main>
        <div class="container">
            <div class="col"> 
                <?php $post = $conn->prepare("SELECT * FROM blogs ORDER BY id DESC");
                        $post->execute();
                        $post_result = $post->get_result();

                        while($row_post = $post_result->fetch_assoc()){ 
                                $content = $row_post['content'];
                            ?>
                                <a href="./view.php?id=<?=$row_post['id']?>" class="row">
                                    <img src="./php/uploads/<?=$row_post['image1']?>" width="240px" alt="">
                                    <div>
                                        <p><?=$content?></p>
                                    </div>
                                </a>
                        <?php } ?>
            </div>
        </div>
        
        <div class="bottom">

        </div>
    </main>
</body>
</html>