<?php
require_once('../../Models/user.php');
require_once('../../Controllers/DBController.php');
class AuthController
{
  protected $db;

  public function login(User $user)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $username = $user->getUserName();
            $password = $user->getPassword();
            $query="select * from users where username='$username' and password ='$password'";
            $result=$this->db->select($query);
            if($result===false)
            {
                echo "Error in Query";
                return false;
            }
            else
            {
                if(count($result)==0)
                {
                    session_start();
                    $_SESSION["errMsg"]="You have entered wrong email or password";
                    $this->db->closeConnection();
                    return false;
                }
                else
                {
                    session_start();
                    $_SESSION["userId"]=$result[0]["id"];
                    $_SESSION["userName"]=$result[0]["firstName"]." ".$result[0]["lastName"];
                    if($result[0]["roleId"]==1)
                    {
                        $_SESSION["userRole"]="Client";
                    }
                    else
                    {
                        $_SESSION["userRole"]="Admin";
                    }
                    $this->db->closeConnection();
                    return true;
                }
            }
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }


    public function register(User $user){
        $this->db=new DBController;
        if($this->db->openConnection()){
            $username = $user->getUserName();
            $password = $user->getPassword();
            $firstName = $user->getFirstName();
            $lastName = $user->getLastName();
            $query="insert into users values ('',' $firstName','$lastName','$username','$password',1)";    
            $result=$this->db->insert($query);
            if($result!=false)
            {
                session_start();
                $_SEESION["userName"]=$user->getUsername();;
                $_SEESION["password"]=$user->getPassword();
                $_SEESION["userId"]="Client";
                $this->db->closeConnection();
                return true; 
            }
            else
            {
                $_SESSION["errMsg"]="Somthing went wrong... try again later";
                $this->db->closeConnection();
                return false;

            }
 
        }
        else
        {
            echo "Error in Database Connection";
            return false;

        }


    }

    public function checkAdmin()
    {
     session_start();
    if(!isset($_SESSION["userRole"]))
    {	  
        header("location:../Auth/login.php");
    }
    else
    {
        if($_SESSION["userRole"]!="Admin"){
            header("location:../Auth/login.php");
        }
    }
    }


    public function checkClient(){
        
    session_start();
    if(!isset($_SESSION["userRole"]))
    {	
        header("location:../Auth/login.php");
    }
    else
    {
        if($_SESSION["userRole"]!="Client"){
            header("location:../Auth/login.php");
        }
    }

    }    

}

?>