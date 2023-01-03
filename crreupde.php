<?php 
include_once "Connection.php";
class crreupde{
    private $conne;
    private $sku;
    private $name;
    private $price;
    private $type;
    private $size;
    private $weight;
    private $height;
    private $width;
    private $length;

    public function __construct(){$this->conne = dbconnection();}
    function setSKU($sku){$this->sku = $sku;}
    function getSKU(){return $this->sku;}
    function setName($name){$this->name = $name;}
    function getName(){return $this->name;}
    function setPrice($price){$this->price = $price;}
    function getPrice(){return $this->price;}
    function setType($type){$this->type = $type;}
    function getType(){return $this->type;}
    function setSize($size){$this->size = $size;}
    function getSize(){return $this->size;}
    function setWeight($weight){$this->weight = $weight;}
    function getWeight(){return $this->weight;}
    function setHeight($height){$this->height = $height;}
    function getHeight(){return $this->height;}
    function setWidth($width){$this->width = $width;}
    function getWidth(){return $this->width;}
    function setLength($length){$this->length = $length;}
    function getLength(){return $this->length;}

    public function create(){
        $this->setSKU($_POST['SKU']);
        $this->setName($_POST['name']);
        $this->setPrice($_POST['price']);
        $this->setType($_POST['type']);
        $this->setSize($_POST['size']);
        $this->setWeight($_POST['weight']);
        $this->setHeight($_POST['height']);
        $this->setWidth($_POST['width']);
        $this->setLength($_POST['length']);
        $sql = "INSERT INTO products(sku,name,price,type,size,height,length,width,weight) VALUES ('".$this->getSKU()."','".$this->getName()."','".$this->getPrice()."','".$this->getType()."','".$this->getSize()."','".$this->getHeight()."','".$this->getLength()."','".$this->getWidth()."','".$this->getWeight()."')";
        $lastline = $this->conne->prepare($sql);
        $lastline->execute();
    }
    public function readdisc(){
        $sql = "SELECT SKU,name,price,size FROM products WHERE type='DVD Disc'";
        $disc = $this->conne->prepare($sql);   
        $disc->execute();
        $disc->setFetchMode(PDO::FETCH_ASSOC);
        $discarray = $disc->fetchAll();   
        return $discarray;
    }
    public function readbook(){
        $sql = "SELECT SKU,name,price,weight FROM products WHERE type='book'";
        $book = $this->conne->prepare($sql);   
        $book->execute();
        $book->setFetchMode(PDO::FETCH_ASSOC);
        $bookarray = $book->fetchAll();
        foreach($bookarray as $row){
        $this->setSKU($row["SKU"]);
        $this->setName($row["name"]);
        $this->setPrice($row["price"]);
        $this->setSize($row["weight"]);
        }
        return $bookarray;
    }
    public function readfurniture(){
        $sql = "SELECT SKU,name,price,height,width,length FROM products WHERE type='furniture'";
        $furniture = $this->conne->prepare($sql);   
        $furniture->execute();
        $furniture->setFetchMode(PDO::FETCH_ASSOC);
        $furniturearray = $furniture->fetchAll();
        foreach($furniturearray as $row){
        $this->setSKU($row["SKU"]);
        $this->setName($row["name"]);
        $this->setPrice($row["price"]);
        $this->setHeight($row["height"]);
        $this->setWidth($row["width"]);
        $this->setLength($row["length"]);
        }
        return $furniturearray;
    }
    public function delete(){
        $sql = "DELETE FROM products WHERE SKU = ".$this->getSKU()."";
        $lastline = $this->conne->prepare($sql);   
        $lastline->execute();
    }
}
?>