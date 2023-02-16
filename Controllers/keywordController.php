<?php

require_once('../../Controllers/DBController.php');
class keywordController
{
  protected $db;

  public function getkeywords()
    {
        $this->db=new DBController;
        if($this->db->openconnection())
        {
            $query="select * from keywords";
            return $this->db->select($query);
        }
        else
        {
            
            echo "Error in Database Connection";
            return false;
        }
       
    }

    public function addKeyword(Keyword $keyword)
    {
        $this->db=new DBController;
        if($this->db->openconnection())
     
        {
            $con= $keyword->getWord();
            $query="insert into keywords values ('','$con')";
            return $this->db->insert($query);
        }
        else
        {
            
            echo "Error in Database Connection";
            return false;
        }
    } 
    
    public function deleteKeyword($id)
    {
      
      $this->db=new DBController;
      if($this->db->openconnection())
      {
          $query="delete from keywords where id = $id";
  
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