<?php 
   

    include('db.php');
    $mobile = $_POST['mobile'];

    $q = mysqli_query($conn, "select * from bank where mobile='".$mobile."'");
    $data_response = mysqli_fetch_assoc($q); 
    
    if(count($data_response) > 0)
    {
        echo json_encode($data_response);
    }
    else{
        echo json_encode($data_response);
    }

?>