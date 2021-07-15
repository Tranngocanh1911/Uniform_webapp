<?php


namespace App\Model;

use App\Model\Blueprint\Product;

class ProductModel
{
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }

    public function convertToObject($data)
    {
        $product = new Product($data['name'], $data['price'], $data['category_id']);
        $product->setId($data['id']);
        if ($data['image'] == null) {
            $product->setImage('uploads/default/default.jpg');
        } else $product->setImage($data['image']);

        return $product;
    }

    public function convertAllToObj($data)
    {
        $products = [];
        foreach ($data as $item) {
            $products[] = $this->convertToObject($item);
        }
        return $products;
    }

    public function getAll()
    {
        try {
            $sql = "SELECT product.id, product.name, product.price, product.image, catergory.name AS category_id
            FROM `product` 
            JOIN catergory ON catergory.id = product.category_id";
            $stmt = $this->dbConnect->connect()->query($sql);
            $stmt->execute();
            return $this->convertAllToObj($stmt->fetchAll());
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }

    }
    public function getAdultProduct()
    {
        try {
            $sql = "SELECT product.id, product.name, product.price, product.image, product.category_id
            FROM `product` 
            JOIN catergory ON catergory.id = product.category_id AND catergory.id = 1";
            $stmt = $this->dbConnect->connect()->query($sql);
            $stmt->execute();
            return $this->convertAllToObj($stmt->fetchAll());
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }

    }
    public function getChildrenProduct()
    {
        try {
            $sql = "SELECT product.id, product.name, product.price, product.image, product.category_id
            FROM `product` 
            JOIN catergory ON catergory.id = product.category_id AND catergory.id = 2";
            $stmt = $this->dbConnect->connect()->query($sql);
            $stmt->execute();
            return $this->convertAllToObj($stmt->fetchAll());
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }

    }
    public function search($search): array
    {
        try {
            $sql = "SELECT product.id, product.name, product.price, product.image, catergory.name AS category_id
            FROM `product` 
            JOIN catergory ON catergory.id = product.category_id
            WHERE product.name = '$search' OR catergory.name ='$search'";
            $stmt = $this->dbConnect->connect()->query($sql);
            $stmt->execute();
            return $this->convertAllToObj($stmt->fetchAll());

        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }
    }

    public function getById($id)
    {
        try {
            $sql = "SELECT * FROM `product` where `id`= $id";
            $stmt = $this->dbConnect->connect()->query($sql);
            $stmt->execute();
            return $this->convertToObject($stmt->fetch());
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }
    }

    public function create($request)
    {
        $url = 'uploads/' . $_FILES['fileToUpload']['name'];
        $sql = "INSERT INTO product (`name`, `price`, `image`,`category_id`) VALUES (?, ?, ?,?)";
        $stmt = $this->dbConnect->connect()->prepare($sql);
        $stmt->bindParam(1, $request['name']);
        $stmt->bindParam(2, $request['price']);
        $stmt->bindParam(3, $url);
        $stmt->bindParam(4,$request['category_id']);
        $stmt->execute();
    }

    public function update($request)
    {
        $product = $this->getById($_REQUEST['id']);
        if ($_FILES['fileToUpload']['name'] == '') {
            $url = $product->getImage();
        } else {
            $url = 'uploads/' . $_FILES['fileToUpload']['name'];
        }
        try {
            $sql = "UPDATE `product` SET `name`=?, `price`=?,`image`=?,`category_id`=? WHERE `id`=" . $request['id'];
            $stmt = $this->dbConnect->connect()->prepare($sql);
            $stmt->bindParam(1, $request['name']);
            $stmt->bindParam(2, $request['price']);
            $stmt->bindParam(3, $url);
            $stmt->bindParam(4,$request['category_id']);
            $stmt->execute();
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function delete($id)
    {
        $id = $_REQUEST['id'];
        $sql = "DELETE FROM product WHERE id=" . $id;
        $stmt = $this->dbConnect->connect()->query($sql);
        $stmt->execute();
    }
}