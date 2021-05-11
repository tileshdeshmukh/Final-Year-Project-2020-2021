<table class="table table-hover table-responsive ">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Timestamp</th>
                                <th scope="col">PrevBlockHash</th>
                                <th scope="col">Rs</th>
                                <th scope="col">Sender</th>
                                <th scope="col">Hash</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                    <?php               
                    
                    $response = file_get_contents('http://127.0.0.1:3000/blockchain');
                    
                    $blocks = json_decode($response);
                    
                    //echo $blocks->chain[0]->index;
                    $chains = count($blocks->chain);
                    $pending = count($blocks->pendingTransactions);

                    for($i=0; $i<$chains; $i++){

                    ?>

                            <tr>
                                <th scope="row"><?php echo $blocks->chain[$i]->index ?></th>
                                <td scope="row"><?php echo $blocks->chain[$i]->timestamp ?></td>
                                <td scope="row"><?php echo $blocks->chain[$i]->prevBlockHash ?></td>

                             <?php
                            if($i == 0)
                            { 
                            ?>
                                <td scope="row"><?php echo '--' ?></td>
                                <td scope="row"><?php echo '--' ?></td>
                            <?php
                            }
                            else
                            {
                            ?> 

                                <td scope="row"><?php echo $blocks->chain[$i]->transactions[0]->amount ?></td>
                                <td scope="row"><?php echo $blocks->chain[$i]->transactions[0]->sender ?></td>
                                
                            <?php } ?>


                                <td scope="row"><?php echo $blocks->chain[$i]->hash ?></td>
                                <td scope="row"><?php echo 'Completed'?></td>

                            </tr>
                            <?php } ?>

                        </tbody>


                    </table>
