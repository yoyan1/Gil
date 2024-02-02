<?php include "header.php"; ?>
    <main>
        <div class="container">
            <div class="form_wrap">
                <form action="./php/create.php" method="post" enctype="multipart/form-data">
                    <div class="form">
                        <div class="image_wrap">
                            <label for="image1"><p class="label1">insert image</p></label>
                            <input type="file" name="image1" id="image1" onchange="change()">
                            <label for="image2"><p class="label2">insert image</p></label>
                            <input type="file" onchange="change2()" name="image2" id="image2">
                        </div>
                        <textarea name="content"  placeholder="write something here..."></textarea>
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
                document.querySelector(".label1").innerHTML = "<img id='image-top' width='159' height='157' src=''>";
                document.getElementById("image-top").src = URL.createObjectURL(image1.files[0]);
            } else{
                
            }
        }

        function change2() {
            const image2 = document.getElementById("image2");
            if(image2.value != ''){

                document.querySelector(".label2").innerHTML = "<img id='image-bot' width='159' height='157' src=''>";
                document.getElementById("image-bot").src = URL.createObjectURL(image2.files[0]);
            } else{

            }
        }
    </script>
</body>
</html>