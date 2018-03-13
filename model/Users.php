<?php

class Users extends BaseEntity
{

    public $conn;

    public function __construct($con)
    {
        $this->conn = $con;
    }

    public function getUsers()
    {

        $query  = "SELECT * FROM user";
        $result = $this->conn->query($query);
        $output = array();
        if ($result->num_rows > 0)
        {
            //dd($result->fetch_assoc());
            
            while ($row = $result->fetch_assoc())
            {
                
                //dd($row['id']);
                $output[] = new User($this->conn, $row['id']);
                //dd($output) ;  
                //var_dump($output[0]);
            }

            }
            //dd($output);
        return $output;
    }

}
