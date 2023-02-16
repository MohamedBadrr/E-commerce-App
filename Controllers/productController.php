<?php
require_once('../../Models/product.php');
require_once('../../Controllers/DBController.php');
class productController
{
  protected $db;
  

  public function addProduct(Product $product)
  {
    
    $this->db=new DBController;
    if($this->db->openconnection())
    {
        $pname =$product->getName();
        $pdesc =$product->getDescription();
        $pprice=$product->getPrice();
        $pcatid=$product->getCategoryid();
        $pimg =$product->getImage();
        $query="insert into products values ('','$pname','$pdesc',0,$pcatid,$pprice,'$pimg')";

        //$query="insert into products valuse ()";
        return $this->db->insert($query);
    }
    else
    {
        
        echo "Error in Database Connection"; 
        return false;
    }
  }

  public function getAllProducts()
  {
      $this->db=new DBController;
      if($this->db->openconnection())
      {
        $query="select products.id,products.name,products.rate,price,category.name as 'category' from products,category where products.categoryid=category.id;";
          return $this->db->select($query);
      }
      else
      {
          
          echo "Error in Database Connection";
          return false;
      }
     
  }

  public function deleteProduct( $id)
  {
    
    $this->db=new DBController;
    if($this->db->openconnection())
    {
        $query="delete from products where id = $id";

        return $this->db->delete($query);
    }
    else
    {
        
        echo "Error in Database Connection"; 
        return false;
    }
  }


  public function getAllProductsWithImages()
  {
      $this->db=new DBController;
      if($this->db->openconnection())
      {
        $query="select products.id,products.name,products.rate,price,category.name as 'category',image from products,category where products.categoryid=category.id;";
          return $this->db->select($query);
      }
      else
      {
          
          echo "Error in Database Connection";
          return false;
      }
     
  }



      
  public function getCategoryProducts($id)
  {
       $this->db=new DBController;
       if($this->db->openConnection())
       {
          $query="select products.id,products.name,products.rate,price,category.name as 'category',image from products,category where products.categoryId=category.id and category.id=$id;";
          return $this->db->select($query);
       }
       else
       {
          echo "Error in Database Connection";
          return false; 
       }
  }

  public function getProductDetails($id)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select products.id,products.name,products.information,products.rate,price,category.name as 'category',image from products,category where products.categoryId=category.id and products.id=$id;";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

}

?>