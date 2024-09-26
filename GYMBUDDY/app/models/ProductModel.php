<?php

class ProductModel {
    private $db;

    public function __construct() {
        $this->db = new Database(); 
    }

    public function addProduct($product_name, $product_category, $product_brand, $product_price, $product_stock, $product_description, $folder) {
        $query = "INSERT INTO products (product_name, product_category, product_brand, product_price, product_stock, product_description, product_image_1) 
                  VALUES (:product_name, :product_category, :product_brand, :product_price, :product_stock, :product_description, :folder)";
        $this->db->query($query);
    
        $this->db->bind(':product_name', $product_name);
        $this->db->bind(':product_category', $product_category);
        $this->db->bind(':product_brand', $product_brand); 
        $this->db->bind(':product_price', $product_price);
        $this->db->bind(':product_stock', $product_stock);
        $this->db->bind(':product_description', $product_description);
        $this->db->bind(':folder', $folder);
    
        $this->db->execute();
    }
    



    public function getProducts() {
        $this->db->query("SELECT id, product_name, product_category, product_brand, product_price, product_stock, product_description, product_image_1 FROM products");
        $result = $this->db->resultSet();
        return $result;  
    }

    public function deleteProductById($id)
    {
        $this->db->query("DELETE FROM products WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();   
    }



    public function updateProductById($id, $product_name, $product_category, $product_brand, $product_price, $product_stock, $product_description, $folder) {
        $query = "UPDATE products SET product_name = :product_name, product_category = :product_category, product_brand = :product_brand, product_price = :product_price, product_stock = :product_stock, product_description = :product_description, product_image_1 = :folder WHERE id = :id";
        
        $this->db->query($query);
    
        // Binding parameters to the placeholders
        $this->db->bind(':id', $id);
        $this->db->bind(':product_name', $product_name);
        $this->db->bind(':product_category', $product_category);
        $this->db->bind(':product_brand', $product_brand);
        $this->db->bind(':product_price', $product_price);
        $this->db->bind(':product_stock', $product_stock);
        $this->db->bind(':product_description', $product_description);
        $this->db->bind(':folder', $folder);
    
        $this->db->execute();
    }
    
    
    

    // public function getProductsByCategory($categoryName) {
    //     $query = "SELECT id, product_name, product_category, product_brand, product_price, product_stock, product_description, product_image_1 
    //               FROM products 
    //               WHERE product_category = :category AND product_stock > 0";
    //     $this->db->query($query);
    //     $this->db->bind(':category', $categoryName);
    //     $result = $this->db->resultSet();
    //     return $result ? $result : false;
    // }
    public function getAllGlutamin()
    {
        $query =   "SELECT * 
                    FROM products
                    WHERE product_category = 'Glutamin';
                    ";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    public function getAllCreatine()
    {
        $query =   "SELECT * 
                    FROM products
                    WHERE product_category = 'Creatine';
                    ";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    public function getAllVitamin()
    {
        $query =   "SELECT * 
                    FROM products
                    WHERE product_category = 'Vitamin';
                    ";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    public function getAllEnergyDrinks()
    {
        $query =   "SELECT * 
                    FROM products
                    WHERE product_category = 'EnergyDrinks';
                    ";
        $this->db->query($query);
        return $this->db->resultSet();
    } 
    public function getAllMassGainers()
    {
        $query =   "SELECT * 
                    FROM products
                    WHERE product_category = 'MassGainers';
                    ";
        $this->db->query($query);
        return $this->db->resultSet();
    }  
    public function getAllFatBurners()
    {
        $query =   "SELECT * 
                    FROM products
                    WHERE product_category = 'FatBurners';
                    ";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    public function getAllTestosterone()
    {
        $query =   "SELECT * 
                    FROM products
                    WHERE product_category = 'Testosterone';
                    ";
        $this->db->query($query);
        return $this->db->resultSet();
    }  
    public function getAllProteinBars()
    {
        $query =   "SELECT * 
                    FROM products
                    WHERE product_category = 'ProteinBars';
                    ";
        $this->db->query($query);
        return $this->db->resultSet();
    } 

    public function getProductsByCategory($category) {
        $query = "SELECT * FROM products WHERE product_category = :category";
        $this->db->query($query);
        $this->db->bind(':category', $category);
        return $this->db->resultSet();
    }
    public function getProductById($id) {
        $query = "SELECT * FROM products WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        
        return $this->db->single();  // Fetch and return a single product
    }
    

    
}
