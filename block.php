<!DOCTYPE html>
<head><title></title></head>
<body>
<div>
<p id="demo"></p>
</div>
<script type="text/JAVASCRIPT">
 var x = document.getElementById("demo");
const SHA256 = require('crypto-js/sha256');
class Block{
    constructor(index,timestamp,data,previousHash=''){
        this.index = index;
        this.timestamp = timestamp;
        this.data = data;
        this.previousHash = previousHash;
        this.hash = this.calculateHash(); 
        this.nonce = 0; //Proof Of Work./ 
    } 
    calculateHash(){
        return SHA256(this.index + this.previousHash + this.timestamp + JSON.stringify(this.data) + this.nonce).toString();
    }
    ////Proof Of Work
    mineBlock(difficulty){
        while(this.hash.substring(0, difficulty) !== Array(difficulty + 1).join("0")){
            this.nonce++;
            this.hash = this.calculateHash();
        }
        console.log("Block mined:" + this.hash);
    }
} 
class Blockchain{
    constructor(){
        this.chain=[this.createGenesisBlock()];
        this.difficulty = 2; ////Proof Of Work
    }
    createGenesisBlock(){
        return new Block(0,"01/01/2020","Genesisblock","0");
  
    }
    getLasteBlock(){
        return this.chain[this.chain.length - 1];
    }
    addBlock(newBlock){
        newBlock.previousHash=this.getLasteBlock().hash;
        ////Proof Of Work
        newBlock.mineBlock(this.difficulty);
        //newBlock.hash=newBlock.calculateHash();
        this.chain.push(newBlock);

    }
    ischainvalid(){
        for(let i=1;i<this.chain.length;i++){
            const currentBlock = this.chain[i];
            const previousBlock = this.chain[i - 1];
            if(currentBlock.hash !== currentBlock.calculateHash()){
                return false;
            }
            if(currentBlock.previousHash !== previousBlock.hash){
                return false;
            }
        }
        return true;
    }
} 

let b = new Blockchain();

 console.log("Mining Block 1...");
 b.addBlock(new Block(1,"01/02/2021",{ amount: 4, sender: 'me' } ));

 console.log("Mining Block 2...");
 b.addBlock(new Block(2,"01/02/2021",{ amount: 11 } ));







var store = JSON.stringify(b, null, 4);
x.innerHTML = "this"+ store;
//window.location="store.php?values="+store;



// console.log('It Blockchain Valid' + b.ischainvalid());

// b.chain[1].data = {amount: 100};
// b.chain[1].hash = b.chain[1].calculateHash();

// console.log('It Blockchain Valid' + b.ischainvalid());
</script>
<h3>block</h3>

</body>
</html>



<!-- 
    const SHA256 = require('crypto-js/sha256');
class Block{
    constructor(index,timestamp,data,previousHash=''){
        this.index = index;
        this.timestamp = timestamp;
        this.data = data;
        this.previousHash = previousHash;
        this.hash = this.calculateHash(); 
        this.nonce = 0; //Proof Of Work
    } 
    calculateHash(){
        return SHA256(this.index + this.previousHash + this.timestamp + JSON.stringify(this.data) + this.nonce).toString();
    }
    ////Proof Of Work
    mineBlock(difficulty){
        while(this.hash.substring(0, difficulty) !== Array(difficulty + 1).join("0")){
            this.nonce++;
            this.hash = this.calculateHash();
        }
        console.log("Block mined:" + this.hash);
    }
} 
class Blockchain{
    constructor(){
        this.chain=[this.createGenesisBlock()];
        this.difficulty = 2; ////Proof Of Work
    }
    createGenesisBlock(){
        return new Block(0,"01/01/2020","Genesisblock","0");
  
    }
    getLasteBlock(){
        return this.chain[this.chain.length - 1];
    }
    addBlock(newBlock){
        newBlock.previousHash=this.getLasteBlock().hash;
        ////Proof Of Work
        //newBlock.mineBlock(this.difficulty);
         newBlock.hash=newBlock.calculateHash();
        this.chain.push(newBlock);

    }
    ischainvalid(){
        for(let i=1;i<this.chain.length;i++){
            const currentBlock = this.chain[i];
            const previousBlock = this.chain[i - 1];
            if(currentBlock.hash !== currentBlock.calculateHash()){
                return false;
            }
            if(currentBlock.previousHash !== previousBlock.hash){
                return false;
            }
        }
        return true;
    }
} 

let b = new Blockchain();

 //console.log("Mining Block 1...");
 b.addBlock(new Block(1,"01/02/2021",{ amount: 4 } ));

// console.log("Mining Block 2...");
 b.addBlock(new Block(2,"01/02/2021",{ amount: 11 } ));



 console.log(JSON.stringify(b, null, 4));

//  b.chain[1].data = {amount: 100};
//  b.chain[1].hash = b.chain[1].calculateHash();

// console.log('It Blockchain Valid' + b.ischainvalid());
 -->