<?php
    include('db.php');
    $com = 0;
    $fal = 0;
    $q = mysqli_query($conn, "select * from data where status = 'completed' ");
    while($data = mysqli_fetch_assoc($q))
    {
        $com = $com + 1;  
    }
    
    $q1 = mysqli_query($conn, "select * from data where status = 'faile' ");
    while($data1 = mysqli_fetch_assoc($q1))
    {
        $fal = $fal + 1;  
    } 

 
    //Get Admin Balance -----------------------------
    $b = mysqli_query($conn, "select * from admin");
    $b1 = mysqli_fetch_assoc($b);
        $admin = $b1['balance'];  

    //Get Bank Balance -----------------------------
    $bank = mysqli_query($conn, "select * from bank");
    if($bank == true)
    while($bank1 = mysqli_fetch_assoc($bank))
    {
        // $bank_bal = $bank_bal + $bank1['balance'];    
    }  
     
   
?>


<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="sidebar.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link type="" href="adm.css" rel="stylesheet">
    <title>Admin</title>\
    <style>
    .c_color {
        background-color: #21201f;
    }

    .c_menu {
        color: white;
    }

    .c_border {
        border: 2px solid #fc5f21;
    }

    li:hover {
        border: 2px solid #1869f5;
    }
    </style>

</head>

<body style="background-color: #4a4948;">



    <div class="container">

        <div class="row">

            <div class="col-3 text-center c_color c_border">
                <div class="sidebar-header text-center pt-3">
                    <h3 class="text-primary"> Admin</h3>
                </div>

                <ul class="list-unstyled components">
                    <p class="text-white">Testing Bank Pvt Lmt</p>
                    <div class="p-2">
                        <li class="c_border p-1 ">
                            <a href="admin.php" class="text-decoration-none c_color  text-white">Home</a>
                        </li>
                    </div>
                    <div class="p-2">
                        <li class="c_border p-1 ">
                            <a href="blockchain.php" class="text-decoration-none c_color  text-white">Blockchain</a>
                        </li>
                    </div>
                    <div class="p-2">
                        <li class="c_border p-1 ">
                            <a href="froud_t.php" class="text-decoration-none c_color  text-white">Froud
                                Transactions</a>
                        </li>
                    </div>
                    <div class="p-2">
                        <li class="c_border p-1 ">
                            <a href="completed.php" class="text-decoration-none c_color  text-white">Completed
                                Transactions</a>
                        </li>
                    </div>
                    <div class="p-2">
                        <li class="c_border p-1 ">
                            <a href="penting_t.php" class="text-decoration-none c_color  text-white">Pending
                                Transactions</a>
                        </li>
                    </div>
                    <div class="p-2">
                        <li class="c_border p-1 ">

                            <a href="atm.php" class="text-decoration-none c_color  text-white">ATM</a>
                        </li>
                    </div>
                    <div class="p-2">
                        <li class="c_border p-1 ">
                            <a href="A_acount.php" class="text-decoration-none c_color  text-white">Acounts Detaile</a>
                        </li>
                    </div>
                    <div class="p-2">
                        <li class="c_border p-1 ">
                            <a href="datewise.php" class="text-decoration-none c_color  text-white">Advance</a>
                        </li>
                    </div>
                    <div class="p-2">
                        <li class="c_border p-1 ">
                            <a href="#" class="text-decoration-none c_color  text-white">Transaction Graph</a>
                        </li>
                    </div>
                    <div class="p-2">
                        <li class="c_border p-1 ">
                            <a href="#" class="text-decoration-none c_color  text-white">Feedbacks</a>
                        </li>
                    </div>
                </ul>

            </div>




            <div class="col-lg-9 col-md-9 col-sm-12">

                <nav class="navbar navbar-white  c_border c_color">
                    <div class="container" ]>
                        <a class="navbar-brand" href="#">Bank Manager</a>

                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class=" navbar-nav">

                                <li class="nav-item">
                                    <h4 class="mt-2 text-primary"></h4></a>
                                </li>

                            </ul>
                        </div>
                        <form class="d-flex">
                            <input class="form-control me-2 c_border" style="background-color: #4a4948;" type="search"
                                placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </form>
                    </div>

                </nav>
                <div class="c_border c_color mt-2">
                    <div class="row">
                        <div class="col">

                            <!-- ---------------------------------------------Admin Animation ---------------------------------------------- -->
                            <div class="row mt-3 text-center">
                                <div class="col-md-3 p-2">
                                    <p class="text-white h5">Bank Balance : <spam class="text-primary h4">
                                            Rs.<?php echo 12332 ?>/-</spam?</p>
                                            <div></div>
                                </div>
                                <div class="col-md-3 p-2">
                                    <p class="text-white h5">Admin Balance : <spam class="text-primary h4">
                                            Rs.<?php echo $admin ?>/-</spam?</p>
                                            <div></div>
                                </div>
                                <div class="col-md-3 p-2">
                                    <p class="text-white h5">Deaily Transactions: <spam class="text-primary h4">42.45%
                                            </spam?</p>
                                            <div></div>
                                </div>
                                <div class="col-md-3 p-2">
                                    <p class="text-white h5">Visited Peoples : <spam class="text-primary h4">30.06%</spam?</p>
                                            <div></div>
                                </div>
                            </div>

                            <div class="row d-flex justify-content-center mx-2 mt-2 ">
                                <div class="col-md-3">
                                    <div class="progress blue "> <span class="progress-left"> <span
                                                class="progress-bar"></span> </span> <span class="progress-right"> <span
                                                class="progress-bar"></span> </span>
                                        <div class="progress-value">90%</div>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="progress yellow "> <span class="progress-left"> <span
                                                class="progress-bar"></span> </span> <span class="progress-right"> <span
                                                class="progress-bar"></span> </span>
                                        <div class="progress-value">37.5%</div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="progress blue "> <span class="progress-left"> <span
                                                class="progress-bar"></span> </span> <span class="progress-right"> <span
                                                class="progress-bar"></span> </span>
                                        <div class="progress-value">90%</div>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="progress yellow "> <span class="progress-left"> <span
                                                class="progress-bar"></span> </span> <span class="progress-right"> <span
                                                class="progress-bar"></span> </span>
                                        <div class="progress-value">37.5%</div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row mt-1 text-center ">

                        <div class="col-md-6 ">
                            <h6 class="text-white"> Number Of Transactions Allow : <spam class="text-primary  p-1 h5"
                                    style=" ">
                                    <?php echo $com ?></spam>
                            </h6>

                        </div>
                        <div class="col-md-6 ">
                            <h6 class="text-white pb-5">Number Of Transactions Not Allow : <spam class="text-primary  p-1 h5"
                                    style=" ">
                                    <?php echo $fal ?></spam>
                            </h6>

                        </div>
                        <p class="text-white h5 pt-5 pb-3">Blockchain can help in fraud detection by enabling the sharing of information in real-time and updating 
                        the ledger upon the agreement of all parties. This will not only prevent frauds but also lower 
                        the overall costs and time taken for the process too. Blockchain uses a shared, secure ledger to track and approve each component, or 
                        block, within a transaction. ... Think of banking, payment processing, contracts management, wills and real estate, money transfers,
                         and medical records—all can be better protected with blockchain.</p>
                    </div>

    <!-- pie chart -->

                   


                    <!-- ----------------------------------------------End---------------------------------------------- -->




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