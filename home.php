<?php
    include('db.php');
    $data = $_GET['amo'];  
    $amo = base64_decode($data);
?>



<!-- HTML Code ---------------------------------------------------------------------------------------------- -->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

    <!-- card css -->
    <link rel="stylesheet" type="text/css" href="card_style.css">
    <title>Payment</title>

    <style>
    .imgbg {
        position: relative;
    }
    </style>
</head>

<body>

    <div class="container pt-5 mt-5">
        <h1> Payment Information </h1>
        <h6>Transfer Amount Rs.<spam class="text-primary"><?php  echo $amo ?>/-</spam>
        </h6>
        <hr>
        <div class="row" ng-app="">
            <div class="col-6 col-sm-6">
                <img src="ncard.png" class="img-fluid imgbg">
                <div class="text-white card_number_text"><b>Card Number</b></div>
                <div class="card_number ang">
                    <h2>{{number}}</h2>
                </div>

                <div class="card_date ang">
                    <h5>{{month}} / {{year}}</h5>
                </div>

                <div class="text-white card_name_text"><b>Holder Name</b></div>
                <div class="card_name ang">
                    <h6>{{name}}</h6>
                </div>
            </div>
            <div class="col-6 col-sm-6">
                <!-- Get The amount to transfer -->

                <!-- End -->
                <form method="post" action="">
                    <div class="form-group">
                        <label for="">Enter Name:</label>
                        <input type="text" class="form-control" id="" placeholder="Name....." ng-model="name"
                            required />
                    </div>
                    <div class="form-group">
                        <label for="">Card Number:</label>
                        <input type="text" name="cno" size="16" maxlength="16 " autocomplete="off" class="form-control"
                            id="number" ng-model="number" placeholder="0000-0000-0000-0000" required />
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label>Exp Month</label>
                            <input type="text" class="form-control" id="" placeholder="Month" ng-model="month"
                                required />
                        </div>
                        <div class="col">
                            <label>Exp Year</label>
                            <input type="number" class="form-control" id="" placeholder="Year" ng-model="year"
                                required />
                        </div>
                        <div class="col">

                            <label for="">Security Code</label>
                            <input type="password" class="form-control" id="" placeholder="CVV" required />
                        </div>
                    </div>
                    <div>
                        <button type="submit" name="Payment" class="btn btn-primary btn-lg btn-block"> Payment
                        </button>
                    </div>
                    <div>

                        <p class="text-danger" role="alert" id="demo"></p>
                    </div>
                </form>




            </div>
        </div>
    </div>
    </div>
    <!-- HTML END ---------------------------------------------------------------------------------------- -->



    <!-- Get current platform Location script ---------------------------------------------------------------->

    <script type="text/javascript">
    var x = document.getElementById("demo");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    // end current location script ----------------------------------------------------------------------------





    // store in variable two location ---------------------------------------------------------------------------

    var showPosition = function(position) {
        var Lat = position.coords.latitude;
        var Long = position.coords.longitude;
        console.log({
            Lat,
            Long
        })



        // get lat long data releted to card number mobile ------------------------------------------------------------
        <?php 
                  $cardno = $_POST['cno'];  
                  $q = mysqli_query($conn, "select * from bank where card_no='$cardno'");
                  $user = mysqli_fetch_assoc($q);
                  $name = $user['name'];
                  $m_lat = $user['lat'];
                  $m_lon = $user['lon'];
        ?>
        // end ------------------------------------------------------------------------------------







        // call function to calculate Distance------------------------------------------------------------------------------

        const dist = calcCrow(<?php echo $user['lat'];?>, <?php echo $user['lon'];?>, Lat, Long)
        console.log({
            dist
        })




  
        // Only 20 meter distance valide transaction ------------------------------------------------------

        if (dist <= 0.021) {
            // create new block inside the blockchain
            const b = block();
            //end

            window.location.href =
                "http://localhost/project2020/contract.php?cno=<?php echo base64_encode($_POST['cno']); ?>&amo=<?php echo base64_encode($amo);?>&status=<?php echo 'match';?>&Lat="+Lat+"&Long="+Long;

        } else {

            var w = 0;
            var allowe = window.confirm(
                "location does not match Please Wait for allow to Trasanction...");
           
           
           
            if (allowe) {
                //send the alert sms to user mobile
                window.location.href =
                "http://localhost/project2020/confirm.php?cno=<?php echo base64_encode($_POST['cno']);?>&amo=<?php echo base64_encode($amo);?>&Lat="+Lat+"&Long="+Long;
                
            }
            else
            {
                window.location.href =
                "http://localhost/project2020/index.php";

            }
           

                     

                                
                 
                   

                //  window.location.href =
                //          "http://localhost/project2020/my_device.php?no=8308283380&conf=1";


                //  Send SMS code---------------------------------------------------------------------------
                <?php 
                            // $fields = array(
                            //     "message" => "You allowe to transaction click <a href='http://localhost/project2020/comfirmation.php'>here</a>",
                            //     "language" => "english",
                            //     "route" => "q",
                            //     "numbers" => "8308283380",
                            // );

                            // $curl = curl_init();

                            // curl_setopt_array($curl, array(
                            //   CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
                            //   CURLOPT_RETURNTRANSFER => true,
                            //   CURLOPT_ENCODING => "",
                            //   CURLOPT_MAXREDIRS => 10,
                            //   CURLOPT_TIMEOUT => 30,
                            //   CURLOPT_SSL_VERIFYHOST => 0,
                            //   CURLOPT_SSL_VERIFYPEER => 0,
                            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            //   CURLOPT_CUSTOMREQUEST => "POST",
                            //   CURLOPT_POSTFIELDS => json_encode($fields),
                            //   CURLOPT_HTTPHEADER => array(
                            //     "authorization: RoSTCECBsl3eqY2jPJQSztIcsunMmkMmCKZJOvmEQ8tcdljeqSBvkDVyRcxK",
                            //     "accept: */*",
                            //     "cache-control: no-cache",
                            //     "content-type: application/json"
                            //   ),
                            // ));

                            // $response = curl_exec($curl);
                            // $err = curl_error($curl);

                            // curl_close($curl);


                        ?>
                // MSM Code END ------------------------------------------------------------------------------


                // window.location.href = "http://localhost/project2020/login.php";
            




        }



    }


    //distance calculate function -------------------------------------------------------------------------

    function calcCrow(lat1, lon1, lat2, lon2) {
        var R = 6371; // km
        var dLat = toRad(lat2 - lat1);
        var dLon = toRad(lon2 - lon1);
        var lat1 = toRad(lat1);
        var lat2 = toRad(lat2);

        var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.sin(dLon / 2) * Math.sin(dLon / 2) * Math.cos(lat1) * Math.cos(lat2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = R * c;
        return d;
    }




    // Converts numeric degrees to radians -------------------------------------------------------------------
    function toRad(Value) {
        return Value * Math.PI / 180;
    }

    //block creater code -----------------------------------------------------------------------------------

    function block() {
        var request = new XMLHttpRequest()
        request.open("GET",
            "http://127.0.0.1:3000/transaction/<?php echo $amo ;?>/<?php echo $name ;?>/Admin",
            true)

        // $response = file_get_contents('http://127.0.0.1:3000/transaction/10/til/a');
        // $response = json_decode($response);


        var re = request.send()

        request.onreadystatechange = (e) => {}
    }
    </script>






    <!-- Fun Begins Here ---------------------------------------------------------------------------------- -->
    <?php
                      if(isset($_POST['Payment'])){
                          

                        echo "<script>getLocation();</script>";
                   
                   
                 
                      }
                    ?>






    <script src="map.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- card number -->
    <!-- <script type="text/javascript">
    // enable spacing for credit card number
    $('#number').on('keyup', function(e){
        var val = $(this).val();
        var newval = '';
        val = val.replace(/\s/g, '');
        for(var i = 0; i < val.length; i++) {
            if(i%4 == 0 && i > 0) newval = newval.concat(' ');
            newval = newval.concat(val[i]);
        }
        $(this).val(newval);
    });
  </script> -->
    <!-- end card numbr -->
    <!-- get location -->
    <!-- end location -->
</body>

</html>