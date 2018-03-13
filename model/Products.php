<?php

class Products extends BaseEntity
{

    public $id;
    public $name;
    public $description;
    public $price;
    public $categoryId;
    public $photo;
    public $conn;
    public $createdAt;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getProducts()
    {
        $query  = "SELECT * FROM product ORDER BY created_at DESC LIMIT " . NO_PER_PAGE;
        #$query  = "SELECT * FROM product ORDER BY created_at DESC ";
        $result = $this->conn->query($query);
        $output = array();
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $output[] = new Product($this->conn, $row);
            }
        }
        return $output;
    }

    public function filter($keyword)
    {
        $query  = "SELECT * FROM product WHERE name LIKE '%{$keyword}%'";
        $result = $this->conn->query($query);
        $output = array();
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $output[] = new Product($this->conn, $row['id']);
            }
        }
        return $output;
    }

}
