<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    <div>


                
            <!-- Intro settings -->
            <style>
                /* Default height for small devices */
                #intro-example {
                    background-color: #cccccc;
                    height: 500px;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                    position: relative;
                }
                .contrast {filter: contrast(130%);}
                .bg {
                    margin-right: 60%;
                    
                }
                /* Height for devices larger than 992px */
                @media (min-width: 992px) {
                #intro-example {
                    height: 677px;
                }
                }
            </style>

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-">
                <div class="container-fluid">
                <h3 class="text-dark">Bank Acount Login</h3>
                </div>
                    
                
            </nav>
            <!-- Navbar -->

            <!-- Background image -->
            <div
                id="intro-example"
                class="p-5 bg-image contrast"
                style="background-image: url('login.jpg')"
            >
                <div class=" mask bg " style="background-color: rgba(0, 0, 0, 0.7)">
                    
                        <div class="text-white p-5 my-5">
                             
                             <form method="POST" action="login.php">
                             <div class="form-group">
                           
                            <label for="" class="my-2">Acount Number:</label>
                            <input type="number" name="ano" size="16" maxlength="16 " autocomplete="off" target="_blank" class="form-control btn btn-outline-light btn-lg" placeholder="Acount Nomber" required />

                           </div>                  

                           <div class="form-group">
                           
                           <label for="" class="my-2">Password:</label>
                           <input type="password" name="pass"  maxlength="10" autocomplete="off" target="_blank" class="form-control btn btn-outline-light btn-lg"  placeholder="Mobile Number......." required />
                           
                          </div>                  

                           <div class="form-group">       
                            <button type="submit" name="login" class="form-control btn btn-outline-light btn-lg mt-4"  target="_blank">
                                LOGIN</button>
                            </div> 
                            <div class="form-group mt-3">
                                <h6>Forgate Password <a href="#">Click Here</a></h6>
                            </div>

                            <div class="form-group mt-3">
                                <h6>New User <a href="#">Open Acount</a></h6>
                            </div>
                        </form>
                    </div>
                    
               
                </div>
            </div>
            <!-- Background image -->
                        













    </div>

    <?php
    include('db.php');
    if(isset($_POST['login']))
    {
        $ano = $_POST['ano'];
        $pass = $_POST['pass'];
        
        
        // echo '<script>alert('.$pass.');</script>';       
         $q = mysqli_query($conn,"select * from bank where acoun_no='$ano'");
         if(mysqli_num_rows($q) > 0){         
             while($r=mysqli_fetch_array($q))
             {
                 if($ano == $r['acoun_no'])
            {
                   header("location:acount.php?ano=$ano");
            }
             
             }
         }
         else{ 
             ?>
           
            <script>
            alert("Check you r Acount Number and Password ");
            </script> 
            
            <?php
            }  
        }
?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>