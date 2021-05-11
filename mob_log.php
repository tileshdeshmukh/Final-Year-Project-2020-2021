<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Home</title>
    <style>
    .homep {
        margin-left: 30%;
        margin-right: 30%;
        margin-top: 5%;
    }
    </style>

</head>


<body>

    <div class="homep">
        <div class="card shadow p-3 mb-5 bg-light rounded m-5 ">
            <form method="POST" action="mob_log.php">
                <div class="form-group">
                    <lable class="my-3">Enter Mobile Number:</lable>
                    <input type="number" class="form-control my-3" name="no" placeholder="XXX-XXX-XXXX" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <button name="btn" class="btn btn-primary form-control my-3 fs-5" type="submit">My Mobile</button>
                    <div>
                    <div>
                            <a class="" href="index.php"> Go Back </a>
                        </div>
            </form>
           
        </div>
    </div>
    
    <?php
if(isset($_POST['btn']))
{
    $no = $_POST['no'];

    header("location:my_device.php?no=$no");
}


?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>