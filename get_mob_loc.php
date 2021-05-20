<?php 
    $m_lat = $_GET['lat'];
    $m_long = $_GET['long'];

    echo "Mobile Location Lat Long ";
    echo "--------------------------------------------";
    echo "";
    echo "Latitude :".$m_lat;
    echo "Longitude :".$m_long;

    include('db.php');
    $lat = $_POST['lat'];
    $long = $_POST['long'];

    echo "Mobile Location Lat Long POST ";
    echo "--------------------------------------------";
    echo "";
    echo "Latitude :".$lat;
    echo "Longitude :".$long;


?>