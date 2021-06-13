<?php 
$id = $_GET['id'];
// Distance Calculate function ---------------------------------------------
function distance($lat1, $lon1, $lat2, $lon2, $unit) {
    if (($lat1 == $lat2) && ($lon1 == $lon2)) {
      return 0;
    }
    else {
      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $unit = strtoupper($unit);
  
      if ($unit == "K") {
        return ($miles * 1.609344);
      } else if ($unit == "N") {
        return ($miles * 0.8684);
      } else {
        return $miles;
      }
    }
  }

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
    .top-left {
        position: absolute;
        top: 85px;
        left: 120px;
    }

    .imgcont {
        position: relative;
    }

    .top-right {
        position: absolute;
        top: 55px;
        right: 100px;
    }
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
        $status = $data['status'];
        $lat = $data['lat'];
        $lon = $data['lon'];
        $m_lat = $data['m_lat'];
        $m_lon = $data['m_lon'];
        $ip = $data['ip_add'];
        $device = $data['device'];
        $date = $data['Date'];
    }

    $q = mysqli_query($conn, "select * from bank where mobile=$mobile");
    $data1=mysqli_fetch_array($q);
    $balance = $data1['balance'];
?>
        <div class="container-fluid">
            <nav class="navbar navbar-light bg-light shadow p-3 mb-4 bg-white rounded fixed-top">
                <div class="container-fluid">
                    <p class="navbar-brand mx-3 text-primary">Account Holder <spam class="text-dark">
                            <?php echo $name; ?> </spam>


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
                        <strong>Balance: </strong>
                        <p class="card-text">Rs.<?php echo $balance; ?>/-</p>
                    </div>
                </div>

            </div>
            <div class="card shadow pt-3 mt-4  bg-white rounded col-lg-9 col-md-9 col-sm-12">
                <div class="">
                    <!-- Customer Details -->
                    <h3 class="mx-5">Transactions Details :</h3>
                    <hr>
                    <div class="m-2">

                        <div class="row">
                            <div class="col-md-6">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col"><strong>Latitude</strong></td>
                                            <td>:</td>
                                            <td><?php echo $lat; ?></td>
                                        </tr>

                                        <tr>
                                            <td scope="col"><strong>Longitude</strong></td>
                                            <td>:</td>
                                            <td><?php echo $lon; ?></td>
                                        </tr>

                                        <tr>
                                            <td scope="col"><strong>Device</strong></td>
                                            <td>:</td>
                                            <td><?php echo $device; ?></td>
                                        </tr>

                                        <tr>
                                            <td scope="col"><strong>IP Address</strong></td>
                                            <td>:</td>
                                            <td><?php echo $ip; ?></td>
                                        </tr>

                                        <tr>
                                            <td scope="col"><strong>Amount</strong></td>
                                            <td>:</td>
                                            <td><?php echo $amount; ?></td>
                                        </tr>

                                        <tr>
                                            <td scope="col"><strong>Status</strong></td>
                                            <td>:</td>
                                            <td><?php echo $status; ?></td>
                                        </tr>

                                        <tr>
                                            <td scope="col"><strong>Date</strong></td>
                                            <td>:</td>
                                            <td><?php echo $date; ?></td>
                                        </tr>

                                        <tr>
                                            <td scope="col"><strong>Transaction ID</strong></td>
                                            <td>:</td>
                                            <td><?php echo $hash; ?></td>
                                            
                                        </tr>

                                        <tr>
                                            <td scope="col"><strong>Distance</strong></td>
                                            <td>:</td>
                                            <td><?php echo distance($m_lat, $m_lon, $lat, $lon, "K"); ?> <b>km</b></td>
                                        </tr>



                                    </tbody>
                                </table>

                            </div>
                            <div class="text-center col-md-6 imgcont ">
                                <img src="mobile1.png" class="img-fluid" alt="..." style="max-width: 250px;">
                                <div class="top-right"><strong class="px-4"><?php echo $date; ?></strong></div>
                                <div class="top-left p-2 bg-info" style="margin-left:10px; margin-top:10px;">
                                    <div><strong>Latitude :</strong> <span class=""><?php echo $m_lat; ?></span>
                                    </div>

                                    <div><strong class="">Longitude :</strong><span
                                            class=""><?php echo $m_lon; ?></span></div>
                                    <?php if($status == 'completed')
                                    { ?>
                                    <div><strong>Access :</strong> <span class="">Granted</span></div>
                                    <?php } else { ?>
                                    <div><strong>Access :</strong> <span class="">Denied</span></div>
                                    <?php } ?>

                                </div>
                            </div>
                            <button class=" btn btn-danger " onclick="goBack()">Go Back</button>

                            <script>
                            function goBack() {
                                window.history.back();
                            }
                            </script>
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