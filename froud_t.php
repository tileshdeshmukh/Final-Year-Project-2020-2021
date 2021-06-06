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

 

    $b = mysqli_query($conn, "select * from bank where acoun_no = '110000000011' ");
    $b1 = mysqli_fetch_assoc($b);
        $admin = $b1['balance'];  






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
                                <div class="col-md-4 p-2">
                                    <p class="text-white h5">Bank Balance : <spam class="text-primary h4">
                                            Rs.<?php echo $admin ?>/-</spam?</p>
                                            <div></div>
                                </div>
                                <div class="col-md-4 p-2">
                                    <p class="text-white h5">Deaily Transactions: <spam class="text-primary h4">42.45%
                                            </spam?</p>
                                            <div></div>
                                </div>
                                <div class="col-md-4 p-2">
                                    <p class="text-white h5">Visited: <spam class="text-primary h4">30.06%</spam?< /p>
                                            <div></div>
                                </div>
                            </div>

                            <hr class="text-danger">
                            <h4 class="text-white text-center">Froud Transactions </h4>
                            <hr class="text-danger">

                            <div class="d-flex justify-content-center mx-2 mt-2 ">

                                <table class="table table-responsive text-white">
                                    <thead>

                                        <tr>
                                            <th scope="col">#</th>

                                            <th scope="col">Card No</th>
                                            <th scope="col">Rs.</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">DateTime</th>
                                            <th scope="col">Location</th>
                                            <th scope="col">Customer Location</th>
                                            <th scope="col"></th>

                                        </tr>

                                    </thead>
                                    <?php
                            include('db.php');
                            $qt = mysqli_query($conn, "select * from data where status = 'faile' ORDER BY id DESC");
                            while($dataT=mysqli_fetch_array($qt))
                            { ?>

                                    <tbody>

                                        <tr>
                                            <th scope="row"><?php echo $dataT['id'];?></th>

                                            <td><?php echo $dataT['card_no'];?></td>
                                            <td><?php echo $dataT['amount'];?></td>
                                            <td><?php echo $dataT['status'];?></td>
                                            <td><?php echo $dataT['Date'];?></td>
                                            <td>Lat: <?php echo $dataT['lat'];?><br>Long: <?php echo $dataT['lon'];?>
                                            </td>
                                            <td>Lat: <?php echo $dataT['m_lat'];?><br>Long:
                                                <?php echo $dataT['m_lon'];?></td>
                                            <td><a href="open.php?id=<?php echo $dataT['id'];?>"
                                                    class="btn btn-primary btn-sm">OPEN</a></td>

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