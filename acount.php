<?php 
$no = $_GET['ano'];
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
    .card_name_text {
        position: absolute;
        bottom: 30%;
        left: 51%;
        transform: translate(-50%, -50%);
    }


    .card_name {
        position: absolute;
        bottom: 1%;
        left: 25%;
        transform: translate(-50%, -50%);
    }

    .card_number_text {
        position: absolute;
        top: 55%;
        left: 21%;
        transform: translate(-50%, -50%);
    }

    .card_number {
        position: absolute;
        top: 63%;
        left: 43%;
        transform: translate(-50%, -50%);
    }

    .card_date {
        position: absolute;
        bottom: 13%;
        left: 48%;
        transform: translate(-50%, -50%);
    }
    </style>

    <title>My Acount</title>
</head>

<body>

    <div class="">
        <!-- Newbar Starting -->
        <?php
    include('db.php');
    $q = mysqli_query($conn, "select * from bank where acoun_no=$no");
    while($data=mysqli_fetch_array($q))
    {
        $name = $data['name'];
        $addres = $data['addres'];
        $anumber = $data['acoun_no'];
        $mobile = $data['mobile'];
        $balance = $data['balance'];
        $gender = $data['gender'];
    }

?>
        <div class="container-fluid">
            <nav class="navbar navbar-light bg-light shadow p-3 mb-4 bg-white rounded fixed-top">
                <div class="container-fluid">
                    <p class="navbar-brand mx-3 text-primary">Account Holder <spam class="text-dark">
                            <?php echo $name; ?> </spam> 
                            
                    <form class="d-flex">
                        
                        <a href="login.php" class="btn btn-outline-danger">Log-Out</a>
                        
                    </form>
                </div>
            </nav>
        </div>


        <div class="m-5  pt-5 container row">
            <div class="col-lg-3 col-md-3 col-sm-12  mt-4">

                <div class="card shadow p-2 mb-1 bg-white">
                    <img src="avatar.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">
                        <h4 class="text-center"><?php echo $name;?></h4>
                        </p>
                        <p class="card-text">
                        <h4 class="text-center">Gender : <?php echo $gender;?></h4>
                        </p>
                        <p class="card-text">
                        <h4 class="text-center text-danger">Rs.<?php echo $balance;?>/-</h4>
                        </p>
                        
                        <p class="card-text">
                        <p class="text-center"><a href="money_transfer.php?ano=<?php echo $_GET['ano']; ?>">Transaction</a></p>
                        </p>
                    </div>
                </div>

            </div>
            <div class="card shadow pt-3 mt-4 bg-white rounded col-lg-9 col-md-9 col-sm-12">
                <div class="">
                    <!-- Customer Details -->
                    <h3 class="mx-5">Acount Details :</h3>
                    <hr>
                    <div class="row mx-5">
                        <div class="col-5">
                            <p class="">
                            <h5>Name :</h5> <?php echo $name; ?> </p>
                            <p class="">
                            <h5>Acount NO :</h5> <?php echo $anumber; ?> </p>
                            <p class="">
                            <h5>Address :</h5> <?php echo $addres; ?> </p>
                            <p class="">
                            <h5>Mobile No :</h5> <?php echo $mobile; ?> </p>
                            <p class="">
                            <h5>Amount :</h5> Rs.<?php echo $balance; ?>/- </p>

                        </div>
                        <!-- ATM CARD IMAGE -->
                        <div class="col-7">


                            <!-- <div class="card_number"><h2>{{number}}</h2></div>
                    
                    <div class="card_date"><h5>{{month}} / {{year}}</h5></div>
                  
                    <div class="text-white card_name_text"><b>Holder Name</b></div>
                    <div class="card_name"><h6>{{name}}</h6></div>    -->

                            <p class="ms-1  fs-4">ATM CARD</p>
                            <img src="ncard.png" class="bg-image contras img-fluid " alt="...">




                        </div>
                        <div>
                            <div>





                            </div>









                        </div>

                        <!-- Optional JavaScript; choose one of the two! -->

                        <!-- Option 1: Bootstrap Bundle with Popper -->
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
                            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
                            crossorigin="anonymous"></script>

                        <!-- Option 2: Separate Popper and Bootstrap JS -->
                        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>