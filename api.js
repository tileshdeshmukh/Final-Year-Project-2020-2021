const express = require('express');
const app = express();
const bodyParser = require('body-parser');
app.use(bodyParser.json());

const nodeAddr = 'JavaSampleApproach';

const Blockchain = require('../src/blockchain');

const bitcoin = new Blockchain();




app.get('/blockchain', function (req, res) {
    
    res.send(bitcoin);
    // res.json(bitcoin);
   
});
// req.body.amount,
// req.body.sender,
// req.body.recipient 
app.get('/transaction/:amount/:sender/:recipient', function (req, res) {
    const blockIndex = bitcoin.makeNewTransaction(
        req.params.amount,
        req.params.sender,
        req.params.recipient
    );

    res.json(
        {
            message: `Transaction is added to block with index: ${blockIndex}`
        }
    );
});

app.get('/mine', function (req, res) {
    const latestBlock = bitcoin.getLatestBlock();
    const prevBlockHash = latestBlock.hash;
    const currentBlockData = {
        transactions: bitcoin.pendingTransactions,
        index: latestBlock.index + 1
    }
    const nonce = bitcoin.proofOfWork(prevBlockHash, currentBlockData);
    const blockHash = bitcoin.hashBlock(prevBlockHash, currentBlockData, nonce);

    // reward for mining
    // bitcoin.makeNewTransaction(1, '00000', nodeAddr);

    const newBlock = bitcoin.creatNewBlock(nonce, prevBlockHash, blockHash)
    res.json(
        {
            message: 'Mining new Block successfully!',
            newBlock
        }
    );
});

app.listen(3000, function () {

    console.log('> listening on port 3000...');
});