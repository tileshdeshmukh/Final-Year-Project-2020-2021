<?php
include('db.php');
    $delet = mysqli_query($conn, "DELETE FROM chain");  

        $response = file_get_contents('http://127.0.0.1:3000/blockchain');                                    
    
        $blocks = json_decode($response, true);

        $chains = count($blocks["chain"]);
        
      
        for($i=0;$i<$chains;$i++)
        {
            $index = $blocks["chain"][$i]['index'];
            if($index == 1){
                continue;
            }
            else
            {
                    
                $timestamp = $blocks['chain'][$i]['timestamp'];   
                $tran = count($blocks['chain'][$i]['transactions']);
               
                for($t=0; $t<$tran;$t++)
                {
                    if($tran == 1)
                    {
                        
                        $amount = $blocks['chain'][$i]['transactions'][0]['amount'];
                        $sender = $blocks['chain'][$i]['transactions'][0]['sender'];
                        $recipient = $blocks['chain'][$i]['transactions'][0]['recipient'];
                            
                    }
                    else
                    {
                        $amount = $blocks['chain'][$i]['transactions'][$t]['amount'];
                        $sender = $blocks['chain'][$i]['transactions'][$t]['sender'];
                        $recipient = $blocks['chain'][$i]['transactions'][$t]['recipient'];
                            
                    } 
                }
                $nonce = $blocks['chain'][$i]['nonce'];
                $hash = $blocks['chain'][$i]['hash'];
                $previousHash = $blocks['chain'][$i]['prevBlockHash'];
                
           
                $sql = mysqli_query($conn, "insert into chain(index_no, timestamp, amount, sender, reciver, nonce, hash, pre_hash) 
                values('".$index."', '".$timestamp."', '".$amount."', '".$sender."', '".$recipient."', '".$nonce."', '".$hash."', '".$previousHash."')");
                
            }
        }

?>



<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="sidebar.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <title>Detect fraud </title>\
    <style>
    .c_color {
        background-color: #21201f;
    }

    .c_menu {
        color: white;
    }

    .c_border {
        border: 2px solid #fc5f21;
    }

    li:hover {
        border: 2px solid #1869f5;
    }
    </style>

</head>

<body style="background-color: #4a4948;">



    <div class="container">

        <div class="row">

            <div class="col-3 text-center c_color c_border">
                <div class="sidebar-header text-center pt-3">
                    <h3 class="text-primary"> Admin</h3>
                </div>

                <ul class="list-unstyled components">
                    <p class="text-white">Testing Bank Pvt Lmt</p>
                    <div class="p-2">
                        <li class="c_border p-1 ">
                            <a href="admin.php" class="text-decoration-none c_color  text-white">Home</a>
                        </li>
                    </div>
                    <div class="p-2">
                        <li class="c_border p-1 ">
                            <a href="blockchain.php" class="text-decoration-none c_color  text-white">Blockchain</a>
                        </li>
                    </div>
                    <div class="p-2">
                        <li class="c_border p-1 ">
                            <a href="froud_t.php" class="text-decoration-none c_color  text-white">Reject
                                Transactions</a>
                        </li>
                    </div>
                    <div class="p-2">
                        <li class="c_border p-1 ">
                            <a href="completed.php" class="text-decoration-none c_color  text-white">Completed
                                Transactions</a>
                        </li>
                    </div>
                    <div class="p-2">
                        <li class="c_border p-1 ">
                            <a href="penting_t.php" class="text-decoration-none c_color  text-white">Pending
                                Transactions</a>
                        </li>
                    </div>
                  
                    <div class="p-2">
                        <li class="c_border p-1 ">
                            <a href="A_acount.php" class="text-decoration-none c_color  text-white">Accounts Detail</a>
                        </li>
                    </div>
                    <div class="p-2">
                        <li class="c_border p-1 ">
                            <a href="datewise.php" class="text-decoration-none c_color  text-white">Advance</a>
                        </li>
                    </div>
                    
                </ul>

            </div>




            <div class="col-lg-9 col-md-9 col-sm-12">

                <nav class="navbar navbar-white  c_border c_color">
                    <div class="container">
                        <a class="navbar-brand" href="#">Bank Manager</a>

                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class=" navbar-nav">

                                <li class="nav-item">
                                    <h4 class="mt-2 text-primary"></h4></a>
                                </li>

                            </ul>
                        </div>
                        <form class="d-flex">
                            <input class="form-control me-2 c_border" style="background-color: #4a4948;" type="search"
                                placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </form>
                    </div>

                </nav>
                <div class="mt-2 c_color c_border">
                    <div class="row mx-1">
                        <div class="col">

                            <!-- ---------------------------------------------Blockchain---------------------------------------------- -->
                            <?php
                            $response = file_get_contents('http://127.0.0.1:3000/blockchain');
                                            
                            $blocks = json_decode($response);
                            
                            //echo $blocks->chain[0]->index;
                            $chains = count($blocks->chain);
                            $pending = count($blocks->pendingTransactions);
                        ?>


                            <h2 class="c_menu">Blockchain</h2>
                            <h5 class="text-primary"> Pending Transactions : <button type="button"
                                    class="btn  c_menu c_border" style="background-color: #4a4948;"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <?php echo $pending ?>
                                </button></a></h5>
                            <hr class="text-primary">
                            <div class="row">
                                <?php    
                             include('db.php');
                             $sql = mysqli_query($conn, "select * from chain");
                             $pre = '';
                             while ($row = mysqli_fetch_array($sql))
                             {           
                    
                                if($row['pre_hash'] == 'Genesis block')
	                                {
		
		                                $pre = $row['hash'];
                                 ?>
                                <div class="col-lg-4 col-lg-4 col-sm-10 pt-2">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body" style="background-color: #4a4948;">
                                            <h5 class="card-title c_menu">Block : <samp
                                                    class="text-primary text-lg"><?php echo $row['index_no']; ?></samp>
                                            </h5>
                                            <h6 class="card-subtitle mb-2 c_menu">Timestamp : <span
                                                    class="text-primary"><?php echo $row['timestamp']; ?></span>
                                            </h6>
                                            <hr class="text-white">
                                            <p class="card-text c_menu">PreviuosHash: <span
                                                    class="text-info"><?php echo $row['pre_hash']; ?></p>
                                            
                          
                                            <p class="c_menu">Amount : <span
                                                    class="text-primary"><?php echo $row['amount']; ?>
                                                </span></p>
                                            <p class="c_menu">Sender : <span
                                                    class="text-primary"><?php echo $row['sender']; ?>
                                                </span></p>
                                            <p class="c_menu">Receiver : <span
                                                    class="text-primary"><?php echo $row['reciver']; ?>
                                                </span></p>




                                           
                                            <hr class="c_menu">
                                            <p class="c_menu">Hash : </p>
                                            <spam class="text-warning"><?php echo $row['hash']; ?></spam>



                                        </div>
                                    </div>

                                </div>
                                <?php
                                }
                                else{ 
		                         if($row['pre_hash'] == $pre)
		                        {
                                    ?>
                                            <div class="col-lg-4 col-lg-4 col-sm-10 pt-2">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body" style="background-color: #4a4948;">
                                            <h5 class="card-title c_menu">Block : <samp
                                                    class="text-primary text-lg"><?php echo $row['index_no']; ?></samp>
                                            </h5>
                                            <h6 class="card-subtitle mb-2 c_menu">Timestamp : <span
                                                    class="text-primary"><?php echo $row['timestamp']; ?></span>
                                            </h6>
                                            <hr class="text-white">
                                            <p class="card-text c_menu">PreviuosHash: <span
                                                    class="text-info"><?php echo $row['pre_hash']; ?></p>
                                            
                          
                                            <p class="c_menu">Amount : <span
                                                    class="text-primary"><?php echo $row['amount']; ?>
                                                </span></p>
                                            <p class="c_menu">Sender : <span
                                                    class="text-primary"><?php echo $row['sender']; ?>
                                                </span></p>
                                            <p class="c_menu">Receiver : <span
                                                    class="text-primary"><?php echo $row['reciver']; ?>
                                                </span></p>




                                           
                                            <hr class="c_menu">
                                            <p class="c_menu">Hash : </p>
                                            <spam class="text-warning"><?php echo $row['hash']; ?></spam>



                                        </div>
                                    </div>

                                </div>
                                    <?php
                                }
                                else{
                                    ?>
                                                 <div class="col-lg-4 col-lg-4 col-sm-10 pt-2">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body" style="background-color: #4a4948;">
                                            <h5 class="card-title c_menu">Block : <samp
                                                    class="text-primary text-lg"></samp>
                                            </h5>
                                            <h6 class="card-subtitle mb-2 c_menu">Timestamp : <span
                                                    class="text-primary"></span>
                                            </h6>
                                            <hr class="text-white">
                                            <p class="card-text c_menu">PreviuosHash: <span
                                                    class="text-info"></p>
                                            
                          
                                            <p class="c_menu">Amount : <span
                                                    class="text-primary">
                                                </span></p>
                                            <p class="c_menu">Sender : <span
                                                    class="text-primary">
                                                </span></p>
                                            <p class="c_menu">Receiver : <span
                                                    class="text-primary">
                                                </span></p>




                                           
                                            <hr class="c_menu">
                                            <p class="c_menu">Hash : </p>
                                            <spam class="text-warning"></spam>



                                        </div>
                                    </div>

                                </div>

                                    <?php
                                }
                            }
                            $pre = $row['hash'];
                            
                    }
                    ?>
                            </div>


                        </div>

                    </div>





                    <!-- Button trigger modal -->


                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Pending Transactions</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <?php               
                   
                   for($j=0; $j<$pending; $j++){
                        
             ?>

                                        <div class="col-auto ">
                                            <div class="card mb-2" style="">
                                                <div class="card-body">
                                                    <h5 class="card-title">Block :<samp
                                                            class="text-primary text-lg"><?php echo $j ?></samp>
                                                    </h5>


                                                    <p>Amount : <span
                                                            class="text-primary"><?php echo $blocks->pendingTransactions[$j]->amount ?>
                                                        </span></p>
                                                    <p>Sender : <span
                                                            class="text-primary"><?php echo $blocks->pendingTransactions[$j]->sender ?>
                                                        </span></p>



                                                </div>
                                            </div>

                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>



                        <!-- ----------------------------------------------End---------------------------------------------- -->
                    </div>



                </div>

                </h3>
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
x