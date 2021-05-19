<?php 
$id = $_GET['id'];
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="card_style.css">


    <style>

    </style>

    <title>My Acount</title>
</head>

<body>

    <div class="">
        <!-- Newbar Starting -->
        <?php
    include('db.php');
    $q = mysqli_query($conn, "select * from data where id=$id");
    while($data=mysqli_fetch_array($q))
    {
        $name = $data['name'];
        $card_no = $data['card_no'];
        $acount_no = $data['acount_no'];
        $mobile = $data['mobile'];
        $amount = $data['amount'];
        $hash = $data['hash'];
        $lat = $data['lat'];
        $lon = $data['lon'];
        $m_lat = $data['m_lat'];
        $m_lon = $data['m_lon'];
        $date = $data['Date'];
    }

?>
        <div class="container-fluid">
            <nav class="navbar navbar-light bg-light shadow p-3 mb-4 bg-white rounded fixed-top">
                <div class="container-fluid">
                    <p class="navbar-brand mx-3 text-primary">Account Holder <spam class="text-dark">
                            <?php echo $name; ?> </spam>

                    <form action="money_transfer.php" class="d-flex">

                        <a href="login.php" class="btn btn-outline-danger">Log-Out</a>

                    </form>
                </div>
            </nav>
        </div>


        <div class="m-5  pt-5 container row">
            <div class="col-lg-3 col-md-3 col-sm-12  mt-4">

                <div class="card shadow p-2 m-1 bg-white">
                    <strong>Ditails</strong>
                    <hr>
                    <div class="card-body">
                        <strong>Name: </strong>
                        <p class="card-text"><?php echo $name; ?></p>
                        <strong>Acc No: </strong>
                        <p class="card-text"><?php echo $acount_no; ?></p>
                        <strong>Card:</strong>
                        <p class="card-text"><?php echo $card_no; ?></p>
                        <strong>Mobile: </strong>
                        <p class="card-text"><?php echo $mobile; ?></p>
                        <strong>Amount: </strong>
                        <p class="card-text"><?php echo $amount; ?></p>
                    </div>
                </div>

            </div>
            <div class="card shadow pt-3 mt-4  bg-white rounded col-lg-9 col-md-9 col-sm-12">
                <div class="">
                    <!-- Customer Details -->
                    <h3 class="mx-5">Transactions Details :</h3>
                    <hr>
                    <div class="m-4">

                        <div class="row">
                            <div class="col-md-6">

                            </div>

                            <div class="text-center col-md-6 ">
                                <img src="mobile1.png" class="img-fluid" alt="..." style="max-width: 250px;">
                            </div>
                        </div>






                    </div>
                </div>





            </div>



        </div>



    </div>

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