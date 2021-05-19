<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Loading....</title>
</head>

<body>






    <?php



// Data Converted into plane data --------------------------------

$cardno = base64_decode($_GET['cno']);
$amo = base64_decode($_GET['amo']);
$latitude = $_GET['Lat'];
$longitude = $_GET['Long'];
include('db.php');
$qcom = mysqli_query($conn, "select * from bank where card_no='$cardno'");
        while($user = mysqli_fetch_assoc($qcom))
        {
            if($user)
            {
            
                $name = $user['name'];
                $mobil_b = $user['mobile'];
                $cardno = $user['card_no'];
                $acount = $user['acoun_no'];
                $mob = $user['mobile'];
                $m_lat = $user['lat'];
                $m_long = $user['lon'];
                $d = date('yyyy-mm-dd');
                $r = rand();
                $hash = hash('gost',$d.$r);

        
                $dataQ1 = mysqli_query($conn, "insert into data(name,acount_no,card_no,mobile,amount,status,hash,lat,lon,m_lat,m_lon,Date) values('".$name."','".$acount."','".$cardno."','".$mob."','". $amo."','uncompleted','".$hash."','".$latitude."','".$longitude."','".$m_lat."','".$m_long."','".date('y/m/d h:i:s')."')");
            
            }

        }






        // $last_mob =  str_pad(substr($mob, -4), strlen($mob), 'X', STR_PAD_LEFT);
echo '
    <div class="container mt-5">
        <div class="d-flex justify-content-center pt-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">
                    <h1>Loading...</h1>
                </span>
            </div>

        </div> 
       
       <h3 class="d-flex justify-content-center pt-3">Please Wait for allowe to Trasanction......</h3>
       
        
       
            <h6 class="text-primary d-flex justify-content-center pt-2">On This Number'.str_pad(substr($mob, -4), strlen($mob), 'X', STR_PAD_LEFT).'</h6>
    </div>';




                        //  echo "<meta http-equiv='refresh' content='0'>";

do{
        $qm = mysqli_query($conn, "select * from data where hash='".$hash."'");
        $u = mysqli_fetch_array($qm);
        $st = $u['status'];
        if($st == 'uncompleted')
        {
            $user_say = 'true';
            
            echo '
         
            <input type="hidden" id="custId" name="custId" value="3487">
          
            ';

        }
        else if($st == 'completed'){
                $user_say = 'Transaction Completed';
                


            }
            else{
                $user_say = "User Dosn't Allow This Transaction";
                
                echo '
                <div class="m-5">
                    <div class="shadow p-3 mb-5 bg-body rounded">
                    <img src="reject.png" class="img-fluid rounded mx-auto d-block mb-4" style="max-width:170px; max-height:170px;">
                    <div class="m-1 bg-danger">
                        <div class="text-center p-3">
                        <h3 class="text-center text-white" >Sorry User Dosn t Allow This Transaction</h3>
                        <a href="index.php">Try Again</a>
                        </div>
                    </div>
                </div></div>
                ';
                $data = 'false';
            }

        
        
    
}while($user_say == 'true');

?>


    <?php 
    
    if($user_say == 'Transaction Completed'){
        echo '
            <script>

        var request = new XMLHttpRequest()
        request.open("GET",
            "http://127.0.0.1:3000/transaction/'.$amo.'/'.$name.'/Admin",
            true)
            var re = request.send()

            request.onreadystatechange = (e) => {}

        </script>
            ';
            

            
           


            echo '
            <script>

        var request = new XMLHttpRequest()
        request.open("GET",
            "http://127.0.0.1:3000/mine",
            true)
            var re = request.send()

            request.onreadystatechange = (e) => {}

        </script>
            ';

            echo $data = 'true';


    }
    if($data == 'true')
    {   
        include('db.php');
        $q5 = mysqli_query($conn, "select * from bank where card_no='$cardno'");
        if($q5 == true)
        {
            while($data = mysqli_fetch_assoc($q5))
            {
    
                 $current_balance = $data['balance'];
            }
        $new_balance = $current_balance - $amo;
        $balance_q = mysqli_query($conn, "update bank set balance = '".$new_balance."' where mobile='".$mobil_b."' ");
        }

        echo '
        <div class="m-5">
        <div class="shadow p-3 mb-5 bg-body rounded">
        <img src="complete.png" class="img-fluid rounded mx-auto d-block mb-5" style="max-width:140px; max-height:140px;">
        <div class="m-1 text-center bg-success">
        <div class="text-center p-3">
                <h3 class="text-center text-white" > Transaction Successfuly Completed :)</h3>
                <a href="index.php">Proceed</a>
            </div>
        </div>
        </div></div>
        ';
    }


     




?>




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