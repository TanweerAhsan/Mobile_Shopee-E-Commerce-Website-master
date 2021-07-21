<?php

// php SignupDatabase class
class SignupDatabase
{
    public $db = null;
    

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into user table
    public  function insertIntoUser($username, $user_email, $password, $table="user") {
        if ($this->db->con != null){    
            // create sql query
            $query_string = "INSERT INTO $table (`username`, `user_email`, `password`) VALUES('$username', '$user_email','$password')";
            // execute query
            $result = $this->db->con->query($query_string);
            /* if($result){ 
                header("location:login.php");
            } */
            return $result;
        
      }
    }
}

?>

           