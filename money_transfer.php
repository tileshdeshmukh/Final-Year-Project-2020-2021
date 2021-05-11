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

                    <form action="money_transfer.php" class="d-flex">

                        <a href="login.php" class="btn btn-outline-danger">Log-Out</a>

                    </form>
                </div>
            </nav>
        </div>


        <div class="m-5  pt-5 container row">
            <div class="col-lg-3 col-md-3 col-sm-12  mt-4">

                <div class="card shadow p-2 m-1 bg-white">
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


                    </div>
                </div>

            </div>
            <div class="card shadow pt-3 mt-4  bg-white rounded col-lg-9 col-md-9 col-sm-12">
                <div class="">
                    <!-- Customer Details -->
                    <h3 class="mx-5">Transactions Details :</h3>
                    <hr>
                    <div class="m-5">
                        
                        <table class="table table-hover">
                                    <thead>

                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Acount No</th>
                                        <th scope="col">Card No</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">DAteTime</th>
                                        </tr>
                                        
                                    </thead>
                            <?php
                            include('db.php');
                            $qt = mysqli_query($conn, "select * from data where acount_no=$no");
                            while($dataT=mysqli_fetch_array($qt))
                            { ?>

                                    <tbody>

                                        <tr>
                                        <th scope="row"><?php echo $dataT['id'];?></th>
                                        <td><?php echo $dataT['name'];?></td>
                                        <td><?php echo $dataT['acount_no'];?></td>
                                        <td><?php echo $dataT['card_no'];?></td>
                                        <td><?php echo $dataT['amount'];?></td>
                                        <td><?php echo $dataT['status'];?></td>
                                        <td><?php echo $dataT['Date'];?></td>
                                        

                                        </tr>

                                    </tbody>
                                    
                        <?php    
                            }

                        ?>
                    </table>






                        </div>
                    </div>





                </div>



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