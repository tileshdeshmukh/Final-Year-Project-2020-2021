<!-- --------------------------------------------------------------------------- Find Device -->
<script type="text/javascript">
var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
var element = document.getElementById('text');
if (isMobile) {
    <?php
                $useragent = "Mobile";
            ?>

} else {
    <?php
            $useragent = "Desktop";
            ?>

}
</script>

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



//  ------------------------------------------------------------- Data Converted into plane data

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
                $ip_address = gethostbyname(""); 
                // $useragent=$_SERVER['HTTP_USER_AGENT'];
                
                $dataQ1 = mysqli_query($conn, "insert into data(name,acount_no,card_no,mobile,amount,status,hash,lat,lon,m_lat,m_lon,ip_add,device,Date) values('".$name."','".$acount."','".$cardno."','".$mob."','". $amo."','uncompleted','".$hash."','".$latitude."','".$longitude."','".$m_lat."','".$m_long."','".$ip_address."','".$useragent."','".date('y/m/d h:i:s')."')");
            
            }

        }






        // $last_mob =  str_pad(substr($mob, -4), strlen($mob), 'X', STR_PAD_LEFT);

// ----------------------------------------------------------------------- Loading amd Waiting 
echo '
    <div class="container mt-5">
        <div class="d-flex justify-content-center pt-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">
                    <h1>Loading...</h1>
                </span>
            </div>

        </div> 
       
       <h3 class="d-flex justify-content-center pt-3">Please Wait for allow to Transaction......</h3>
       
        
       
        <h6 class="text-primary d-flex justify-content-center pt-2">On This Number'.str_pad(substr($mob, -4), strlen($mob), 'X', STR_PAD_LEFT).'</h6>
        <h6 class="text-dark d-flex justify-content-center" id="some_div"> </h6>
            
    </div>
    
    ';


// -------------------------------------------------------------------Timer 30 sec

   echo "<script>
    var timeLeft = 28;
        var elem = document.getElementById('some_div');
        
        var timerId = setInterval(countdown, 1000);
        
        function countdown() {
          if (timeLeft == -1) {
            clearTimeout(timerId);
            doSomething();
          } else {
            elem.innerHTML = 'Remaining : ' + timeLeft + ' Sec';
            timeLeft--;
          }
        }
    </script>";


                        //  echo "<meta http-equiv='refresh' content='0'>";

    // ------------------------------------------------------- Waiting State Animation Condition 
        $count = 0;
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
                $data = 'true';


         }
       
     
        else{
                $user_say = "User Not Allow This Transaction";
                
                echo '
                <div class="m-5">
                    <div class="shadow p-3 mb-5 bg-body rounded">
                    <img src="reject.png" class="img-fluid rounded mx-auto d-block mb-2" style="max-width:170px; max-height:170px;">
                    <div class="m-1">
                        <div class="text-center p-3">
                        <h3 class="text-center">Sorry User Not Allow This Transaction</h3>
                        <a href="index.php" class="btn btn-outline-success">Try Again</a>
                        </div>
                    </div>
                </div></div>
                ';
                $data = 'false';
        }
        $count++;
 //  ----------------------------------------------------------------- Occer Time Out Condition
        if($count >= 59000)
        {
               
               $user_say = 'Waiting Time Out Sorry..............!';
               $data = 'wait';
               $del = mysqli_query($conn, 'DELETE FROM data WHERE mobile = "'.$mob.'" AND status = "uncompleted" ');
               $dataQ2 = mysqli_query($conn, "insert into data(name,acount_no,card_no,mobile,amount,status,hash,lat,lon,m_lat,m_lon,ip_add,device,Date) values('".$name."','".$acount."','".$cardno."','".$mob."','". $amo."','pending','".$hash."','".$latitude."','".$longitude."','".$m_lat."','".$m_long."','".$ip_address."','".$useragent."','".date('y/m/d h:i:s')."')");
        }

        
    
}while($user_say == 'true');

?>

<!-- ------------------------------------------------------------- Completed Transaction -->
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
            

            
           
// ----------------------------------------------------------- Block mining

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




            

            


// ------------------------------------------------------------------ Cut Balance and Admin balance
    }
    if($data == 'true')
    {   
        include('db.php');
        $q5 = mysqli_query($conn, "select * from bank where card_no='$cardno'");
        $admin = mysqli_query($conn, "select * from admin");
        if($admin == true)
        {
            while($admin_data = mysqli_fetch_assoc($admin))
            {
                // Increase Admin Balance -----------------
                $admin_balance = $admin_data['balance'];
                $new_admin_balance = $admin_balance + $amo;
            }
        }
        
        if($q5 == true)
        {
            while($data = mysqli_fetch_assoc($q5))
            {
                // Decrement User Balance -----------------------
                 $current_balance = $data['balance'];
                 $new_balance = $current_balance - $amo;
            }
        
        
        $balance_q = mysqli_query($conn, "update bank set balance = '".$new_balance."' where mobile='".$mobil_b."' ");
        $balance_admin = mysqli_query($conn, "update admin set balance = '".$new_admin_balance."' where name='Admin' ");
        }

// ------------------------------------------------------------- Show Transaction Completed UI 
        echo ' <div class="m-5">
        <div class="shadow p-3 mb-5 bg-body rounded">
        <img src="complete.png" class="img-fluid rounded mx-auto d-block mb-5" style="max-width:140px; max-height:140px;">
        <div class="m-1 text-center">
        <div class="text-center p-3">
                <h3 class="text-center"> Transaction Successfully Completed :)</h3>
                <a href="index.php" class="btn btn-outline-success">Proceed</a>
            </div>
        </div>
        </div></div>
       
        <button type="hidden" class="md-trigger" id="startConfetti" data-modal="modal"></button>
        <button type="hidden" class="md-trigger" id="stopConfetti" data-modal="modal"></button>
       
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="jquery.confetti.js"></script>
        <script>
        const startit = () => {
        setTimeout(function () {
            
            document.getElementById("startConfetti").click();
        }, 1000);
       };
       
       const stopit = () => {
        setTimeout(function () {
            document.getElementById("stopConfetti").click();
        
        }, 4000);
       };
       
       startit();
       stopit();
       </script> 
       
        ';
       
    }

     if($data == 'wait'){
        echo '
        <div class="m-5">
        <div class="shadow p-3 mb-5 bg-body rounded">
       
        <div class="m-1 text-center bg-warning">
        <div class="text-center p-3">
                <h3 class="text-center text-white">Time Out Sorry..............!</h3>
                <a href="index.php" class="btn btn-outline-primary">Again Transaction</a>
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