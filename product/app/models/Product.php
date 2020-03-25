<?php
class Product{
    private $db;

    public function __construct(){

        $this->db = new Database();
    }

    // Get product
    public function getProduct(){
        
        $this->db->query('SELECT * FROM productlist');
        return $this->db->resultSet();
    }

    // Add product
    public function addProduct($data){
        
        $arr = implode(",", array_keys($data));
        $ArrVal = (':'.implode(", :", array_keys($data)));

        $this->db->query("INSERT INTO productlist ($arr) VALUES($ArrVal)");

        foreach($data as $key => $value){
            $this->db->bind(":$key", $value);
        }
        
        
        if($this->db->executeStatement()){
            return true;
        }else{
            return false;
        }
    }
   
    // Find SKU dublicate
    public function findSKUDublicate($sku){
        $this->db->query('SELECT * FROM productlist WHERE sku = :sku');
        
        $this->db->bind(':sku', $sku);

        $row =$this->db->single();

        if($this->db->rowsCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    // Get sorting product from database
    public function sortedProduct($productName){
        
        $this->db->query('SELECT * FROM productlist WHERE type = :type');
        $this->db->bind(':type', $productName);
        return $this->db->resultSet();  
        
    }

    // Delete from database
    public function productDelete($id){
        $this->db->query('DELETE FROM productlist WhERE id = :id');
        $this->db->bind(':id', $id);

        if($this->db->executeStatement()){
            return true;
        } else {
            return false;
        }
    }
}