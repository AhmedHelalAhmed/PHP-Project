<?php

class Product extends BaseEntity
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $categoryId;
    public $photo;
    public $conn;
    public $createdAt;
    public function __construct($conn, $argument)
    {
        if (is_array($argument))
        {
            $this->tomankeproduct($conn, $argument);
        }
        else
        {
            
            $this->tomakeproductforsearch($conn, $argument);
        }
    }

    private function tomankeproduct($conn, $productArray)
    {
        $this->id          = $productArray['id'];
        $this->name        = $productArray['name'];
        $this->description = $productArray['description'];
        $this->price       = $productArray['price'];
        $this->categoryId  = $productArray['category_id'];
        /* @var $htis type */
        $this->photo       = $productArray['photo'];
        $this->conn        = $conn;
        $this->createdAt   = $productArray['created_at'];
    }

    private function tomakeproductforsearch($conn, $productId = false)
    {
        $this->conn = $conn;
        if ($productId)
        {
            $query  = "SELECT * FROM product WHERE id={$productId}";
            $result = $this->conn->query($query);
            if ($result->num_rows > 0)
            {
                // output data of each row
                $row = $result->fetch_assoc();
                foreach ($row as $key => $value)
                {
                    $this->$key = $value;
                }
                $this->createdAt = $row['created_at'];
                unset($this->created_at);
            }
            else
            {
                die('Product Not Found');
            }
        }
    }

    public function save()
    {
        $time  = date("Y-m-d H:i:s");
        $query = "INSERT INTO `product` (`id`, `name`, `description`, `price`, `photo`, `category_id`, `created_at`)"
                . " VALUES (NULL, '{$this->getName()}', '{$this->getDescription()}', '{$this->getPrice()}', '{$this->getPhoto()}', '{$this->getCategoryId()}', '{$time}')";
        //$query = "INSERT INTO `user` (`id`, `name`, `username`, `photo`, `email`, `password`, `phone`, `created_at`) "
        //        . "VALUES (NULL, '{$this->getName()}', '{$this->getUsername()}', '{$this->getPhoto()}', '{$this->getEmail()}', '{$this->getPassword()}', '{$this->getPhone()}', '{$time}');";

        mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
        $this->id = mysqli_insert_id($this->conn);
        return $this->id;
    }

    public function update()
    {

        $query = "UPDATE `product` SET  `name` = '{$this->getName()}', `description` = '{$this->getDescription()}', `price` = '{$this->getPrice()}', `photo` = '{$this->getPhoto()}', `category_id` = '{$this->getCategoryId()}' WHERE `product`.`id` = {$this->getId()};";
        mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
    }

    public function delete()
    {
        $query = "DELETE FROM `product` WHERE `user`.`id` = {$this->id}";
        mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
    }

}
