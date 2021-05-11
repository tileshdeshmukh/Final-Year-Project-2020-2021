const express = require("express");
const SHA256 = require("crypto-js/sha256");
const cors = require('cors')
const app = express();
app.use(cors())
let ind = 0;
var k = 0;

app.get("/api/:amount/:no", (req, res) => {

  let a = req.params.amount;
  let n = req.params.no;
  if(a == 0 && n == 0)
  {
      return res.json(chains);
  }
  else{

  class Block {
    constructor(index, timestamp, data, previousHash = "") {
      this.index = index;
      this.timestamp = timestamp;
      this.data = data;
      this.previousHash = previousHash;
      this.hash = this.calculateHash();
      this.nonce = 0; //Proof Of Work
      
    }
    calculateHash() {
      return SHA256(
        this.index +
          this.previousHash +
          this.timestamp +
          JSON.stringify(this.data)
      ).toString();
    }
  }
  class Blockchain {
    
    constructor() {
      
      this.chain = [this.createGenesisBlock()];
      // this.difficulty = 2; ////Proof Of Work
       
    }
    
    createGenesisBlock() {     
      return new Block(ind++, "01/01/2020", "Genesisblock", "0");
    }

    getLasteBlock() {
      return this.chain[this.chain.length - 1];
    }
    addBlock(newBlock) {
      newBlock.previousHash = this.getLasteBlock().hash;
      ////Proof Of Work
      //newBlock.mineBlock(this.difficulty);
      newBlock.hash = newBlock.calculateHash();
      this.chain.push(newBlock);
    }
  }

    var b = new Blockchain();  

  // let b = new Blockchain();

  
 
   
  //console.log("Mining Block 1...");
  b.addBlock(new Block(ind++, "01/02/2021", { amount: req.params.amount, Acount_No: req.params.no }));
  // b.addBlock(new Block(ind++, "01/02/2021", { amount: 4}));
  // b.addBlock(new Block(ind++, "01/02/2021", { amount: 5}));
  // b.addBlock(new Block(ind++, "01/02/2021", { amount: 5}));
  // console.log("Mining Block 2...");
  
  

  var data = b
  chains = {chain:[...chains.chain,...data.chain]}
  
  
  
     
    res.json(chains);
}
  //res.send('Blockchain');
  
});

  let chains = {chain:[]}

app.listen(3000, () => console.log("PORT 3000"));
