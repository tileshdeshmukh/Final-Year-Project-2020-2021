<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Home</title>
    <style>
    .homep {
        margin-left: 30%;
        margin-right: 30%;
        margin-top: 5%;
    }
    </style>

</head>

<!-- <script>
    let chains = {}
   fetch("http://localhost:3000/api/100/111111").then((response)=>response.json()).then((data)=>{
    console.log(data);
    if(data){
        chains = data
    }
    console.log(chains.chain[1].hash)
})
</script> -->

<body>
    <div class="text-center">
        <div>



            <!-- <a href="http://localhost:3000/api/100"> <button id="mybtn" class="btn btn-warning"> Block-chain</button></a> -->

            <!-- <form action="index.php">

        <button id="mybtn" class="btn btn-warning"> Block-chain</button>

        </form> -->


        </div>

    </div>
    <div class="homep">

        
        <div class="card shadow p-3 mb-5 bg-light rounded m-5 ">

            <form method="POST" action="index.php">
                <div class="form-group">
                    <lable class="my-3">Enter Amount:</lable>
                    <input type="number" class="form-control my-3" name="amount" placeholder="Amount....?" required>
                </div>
                <div class="form-group">
                    <button name="btn" class="btn btn-primary form-control my-3 fs-5" type="submit">Transaction
                        Proceeds</button>
                    <div>

                        <div>
                            <a class="" href="admin.php"> Admin </a> &nbsp <a class="" href="login.php">User
                                Account</a>&nbsp <a class="" href="mob_log.php">My Device</a> &nbsp <a class=""
                                href="blockchain.php">Blockchain</a>
                        </div>

            </form>

        </div>
    </div>


    <?php
if(isset($_POST['btn']))
{
    $amo = base64_encode($_POST['amount']);
    //$enc_amo = (($amo*1234*5678)/910);
    
    header("location:home.php?amo=".$amo);
}


?>
<!-- <button type="hidden" class="md-trigger" id="startConfetti" data-modal="modal"></button>
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
        //   print('<div id="stopConfetti"></div>');
        }, 6000);
      };

      startit();
      stopit(); </script>  -->
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