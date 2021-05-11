<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>My Device</title>
    <style>
    .mob {
        /* top right bottom left */
        /* margin: 50px 500px 50px 500px; */
        border: 3px solid black;
        border-radius: 15px;



    }
    </style>
</head>

<body>
    <?php
    $number = $_GET['no'];
    ?>


    <section>
        <div class="m-5 mob">
        <div class="d-flex justify-content-center bg-dark mob text-white" >mobile</div>
            <div class="container">
                <nav class="navbar navbar-primary pt-3 bg-light shadow-sm   bg-body rounded"
                    style="background-color: #e3f2fd;">
                    <div class="container-fluid">
                        <a class="navbar-brand mx-5">+91 <?php echo $number; ?></a>
                        <form class="d-flex">

                            <button class="btn btn-outline-danger " type="submit"><a href="mob_log.php"
                                    style="text-decoration:none "> Log-Out </a></button>
                        </form>

                    </div>
                </nav>



                <div class="m-4">
                    <h2 class="text-center">My Device</h2>
                    <hr>

                    <?php
                    include('db.php');
                    
                    $q = mysqli_query($conn, "select * from bank where mobile='".$number."'");
                    $data = mysqli_fetch_assoc($q);
                    $acount_no = $data['acoun_no'];

                    $q1 = mysqli_query($conn, "select * from data where acount_no='".$acount_no."' AND status = 'uncompleted' ");
                    
                    while($data1 = mysqli_fetch_assoc($q1))
                    {   
                        $amount = $data1['amount'];
                        $id = $data1['id'];
                        ?>

                    <div class="shadow-lg p-3 mb-5 bg-body rounded m-4">
                        <div class="p-2">
                            <h4>Rs.<span class="text-primary"><?php echo $amount ?></span></h4>
                            <h5>Are You Allow This Transaction Because Both Location Dosn't Match ?</h5>


                            <div class="row">

                                <div class="col">

                                    <form class="form-control"
                                        action="confirm_update.php?what=<?php echo 'yes';?>&id=<?php echo $id ?>"
                                        method="post">
                                        <a href=""> <button type="submit" name="yes"
                                                class="form-group btn btn-success">Yes</button>
                                    </form>

                                </div>
                                <div class="col">
                                    <form class="form-control"
                                        action="confirm_update.php?what=<?php echo 'no';?>&id=<?php echo $id ?>"
                                        method="post">
                                        <a href=""> <button type="submit" name="no"
                                                class="form-group btn btn-danger">No</button></a>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                    <?php
                    
                    }
                    
                  
                       
                        
                       // echo "<meta http-equiv='refresh' content='0'>";
                       
                        
                    


                    
      
                ?>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
              
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>


                </div>
            </div>
        </div>
    </section>


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