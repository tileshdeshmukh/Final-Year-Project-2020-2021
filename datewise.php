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
                            <a href="#" class="text-decoration-none c_color  text-white">Advance</a>
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
                    <div class="container">
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


                            <form method="post" action="datewise.php">
                                <div class="row p-4">
                                    <div class="col">
                                        <label class="lable-control text-white">From</label>
                                        <input type="date" class="form-control w-75" placeholder="" name="start">
                                    </div>

                                    <div class="col">
                                        <label class="lable-control text-white">From</label>
                                        <input type="date" class="form-control w-75" placeholder="" name="end">
                                    </div>
                                    <div class="col">
                                        <label type="hidden" class="">dsd</label>
                                        <div class="col"><button class="btn btn-info" type="submit"
                                                name="date">Search</button> </div>
                                    </div>
                                </div>
                            </form>


<?php
    include('db.php');
    if(isset($_POST['date']))
    {
        $startD = $_POST['start'];
        $endD = $_POST['end'];

        $qu = mysqli_query($conn, "SELECT * FROM data WHERE date >= '".$startD."' AND date <= '".$endD."'");
        $i=0;
       
            
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">Acount No</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  while($data = mysqli_fetch_assoc($qu)){
    ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $data['name']; ?></td>
      <td><?php echo $data['acount_no']; ?></td>
      <td><?php echo $data['Date']; ?></td>
    </tr>
 <?php } ?>
  </tbody>
</table>

<?php
        
    }
?>
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