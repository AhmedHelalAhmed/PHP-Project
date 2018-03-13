<?php

class Category extends BaseEntity
{

    public $conn;
    public $id;
    public $name;

    public function __construct($con, $CategoryArray)
    {
        $this->conn = $con;
        $this->name = $CategoryArray['name'];
        $this->id   = $CategoryArray['id'];
    }


    public static function getProducts($con, $id)
    {
   
        $query      = "SELECT * FROM product where category_id = {$id} ORDER BY created_at DESC LIMIT " . NO_PER_PAGE;
     
        $result     = $con->query($query);
        $output     = array();
     
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                 
                    $output[] = new Product($con, $row);
                }
            }
            return $output;
        
    }

}
