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




        //echo $blocks->chain[0]->index;
        // $chains = count($blocks->chain);
        // $pending = count($blocks->pendingTransactions);
?>