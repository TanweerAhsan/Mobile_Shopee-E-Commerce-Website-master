<?php

// php LoginDatabase class
class LoginDatabase
{
    public $db = null;
    

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into user table
    public  function selectFromUser($username, $formPassword, $table="user") {

        if ($this->db->con != null){    
            
            // create sql query
            $query_string = "select * from $table where username='$username'";
     
            // execute query
            $result = $this->db->con->query($query_string);

            return $result;
        
      }
    }
}

?>

           