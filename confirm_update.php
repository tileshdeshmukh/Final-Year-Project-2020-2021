<?php
    include('db.php');
    $what = $_GET['what'];
    $id = $_GET['id'];

    $q = mysqli_query($conn, "select mobile from data where id='".$id."'");
    $data = mysqli_fetch_assoc($q); 
    $no = $data['mobile'];
    
    if($what == 'yes'){

     $yes = mysqli_query($conn, "UPDATE data SET status = 'completed' WHERE id ='".$id."'");
     header("location: my_device.php?no=$no");
    }
    else if($what == 'no'){
        $noo = mysqli_query($conn, "UPDATE data SET status = 'faile' WHERE id ='".$id."'");  
        header("location: my_device.php?no=$no"); 
    }
    
?>