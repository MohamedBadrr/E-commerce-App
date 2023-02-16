<?php

require_once('../../Controllers/DBController.php');
class categoryController
{
  protected $db;

  public function getCategories()
    {
        $this->db=new DBController;
        if($this->db->openconnection())
        {
            $query="select * from category";
            return $this->db->select($query);
        }
        else
        {
            
            echo "Error in Database Connection";
            return false;
        }
       
    }

    
    public function addCategory(category $category)
    {
        $this->db=new DBController;
        if($this->db->openconnection())
     
        {
            $con= $category->getName();
            $query="insert into category values ('','$con')";
            return $this->db->insert($query);
        }
        else
        {
            
            echo "Error in Database Connection";
            return false;
        }
    }  
    public function deleteCategory($id)
    {
      
      $this->db=new DBController;
      if($this->db->openconnection())
      {
          $query="delete from category where id = $id";
  
          return $this->db->delete($query);
      }
      else
      {
          
          echo "Error in Database Connection"; 
          return false;
      }
    }


    
}   

?>