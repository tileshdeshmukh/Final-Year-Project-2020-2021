<?php 
   

    // echo "Mobile Location Lat Long ";
    // echo "--------------------------------------------";
    // echo "";
    // echo "Latitude :".$m_lat;
    // echo "Longitude :".$m_long;

    include('db.php');
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $id = $_POST['id'];

    $q = mysqli_query($conn, "select mobile from bank where id='".$id."'");
    $data_response = mysqli_fetch_assoc($q); 
    $no = $data_response['mobile'];

    $sql = "UPDATE `bank` SET `lat`='$lat',`lon`='$long' WHERE `mobile` = '$no'";
    $Q = mysqli_query($conn, $sql);
    if($Q)
    {
        $data['response'] = "Mobile Location Lat Long POST $lat Long : $long Sql : ".$sql;
        $jsonResponse = json_encode($data);
        echo $jsonResponse;
    }
    else{
        $data['response'] = "Error POST Lat : $lat Long : $long Sql : ".$sql;
        $jsonResponse = json_encode($data);
        echo $jsonResponse;
    }
    // echo "Mobile Location Lat Long POST ";
    // echo "--------------------------------------------";
    // echo "";
    // echo "Latitude :".$lat;
    // echo "Longitude :".$long;


?>