
<?php 
  
  /* msm sender 
   if(isset($_POST['Payment']))
    {
    	$username = "crack.t2111@gmail.com";
	$hash = "47fbbdbd42e2ff048523420d52b8062d8ab784ce744e1970876bccdb3c7d8833";
	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";
	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = "8308283380"; // A single number or a comma-seperated list of numbers
	$message = "https://192.168.43.28/cust_location.php";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
    }
*/
    
  ?> 
  