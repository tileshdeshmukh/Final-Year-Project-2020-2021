<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Completed</title>
</head>

<body>
<?php
 echo '
 <div class="m-5">
 <div class="shadow p-3 mb-5 bg-body rounded">
 <img src="complete.png" class="img-fluid rounded mx-auto d-block mb-5" style="max-width:140px; max-height:140px;">
 <div class="m-1 text-center">
 <div class="text-center p-3">
         <h3 class="text-center"> Transaction Successfuly Completed :)</h3>
         <a href="index.php" class="btn btn-outline-success">Proceed</a>
     </div>
 </div>
 </div></div>

 <button type="hidden" class="md-trigger" id="startConfetti" data-modal="modal"></button>
 <button type="hidden" class="md-trigger" id="stopConfetti" data-modal="modal"></button>

 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script src="jquery.confetti.js"></script>
 <script>
 const startit = () => {
 setTimeout(function () {
     
     document.getElementById("startConfetti").click();
 }, 1000);
};

const stopit = () => {
 setTimeout(function () {
     document.getElementById("stopConfetti").click();
 
 }, 6000);
};

startit();
stopit();
</script> 

 ';


?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>