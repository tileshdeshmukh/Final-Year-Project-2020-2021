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
<?php
    include('db.php');
    $cno = base64_decode($_GET['cno']);
    $amo = base64_decode($_GET['amo']);
    $cardno = trim($cno);
    $loc_status = trim($_GET['status']);
    $latitude = $_GET['Lat'];
    $longitude = $_GET['Long'];
                            
    date_default_timezone_set('Asia/Kolkata'); 
                           
    $q = mysqli_query($conn, "select * from bank where card_no='$cardno'");
    if($q == true)
    {
        while($data = mysqli_fetch_assoc($q))
        {

                                 

            //<!-- Payment transfer -->
             $current_balance = $data['balance'];
             $transf_balance = $amo;
             $m_lat = $data['lat'];
             $m_long = $data['lon'];
             $mobil_b = $data['mobile'];
            $name = $data['name'];
            $acount = $data['acoun_no'];

            //cut balance
            $new_balance = $current_balance - $transf_balance;
                          
            $d = date('yyyy-mm-dd');
            $r = rand();
            $hash = hash('gost',$d.$r);

            // Find IP address
            $ip_address = gethostbyname(""); 
            // Find Devise
            // $useragent=$_SERVER['HTTP_USER_AGENT'];


            //transaction mine
            if($new_balance)
            {
                if($loc_status == 'match')
                {
                    //Pending Block Mining
                    $response = file_get_contents('http://127.0.0.1:3000/mine');
                    $response = json_decode($response);
                    
                    if($response)
                    {
                        $balance_q = mysqli_query($conn, "update bank set balance = '".$new_balance."' where mobile='".$mobil_b."' ");
                       
                        if($balance_q == true)
                        {
                            // Insert personal account Transaction Data 
        
                            $dataQ = mysqli_query($conn, "insert into data(name,acount_no,card_no,mobile,amount,status,hash,lat,lon,m_lat,m_lon,ip_add,device,Date) values('".$name."','".$acount."','".$cardno."','".$mobil_b."','". $transf_balance."','completed','".$hash."','".$latitude."','".$longitude."','".$m_lat."','".$m_long."','".$ip_address."','".$useragent."','".date('y/m/d h:i:s')."')");
                            // end
                                        
                            if($dataQ == true)
                            {
                                echo '<script>
                                var ask = window.confirm("Transaction Proceed Success");
                                if (ask) {  
                                    window.location.href = "http://localhost/project2020/done.php";
                                }
                                </script>';
                            }
                            else
                            { 
                                echo '<script>alert("Data Not Inserted");</script>'; 
                            }
                        }
                        else
                        { 
                            echo '<script>alert("Balance not Update");</script>'; 
                        }


                    }
                    else
                    { 
                        echo '<script>alert("Pending Block Not Mining...");</script>'; 
                    }
                }
                else
                {
                    echo 'Mining Error';
                    //Pending Block Delete code
                }
            }                      
            // header('Location:http://localhost/project2020/home.php?amo='.$amo);
                                        
        }
            // End Payment Transaction                                          
    }
    

    else
    {
        return false;
                              
    }
?>