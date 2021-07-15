<?php
namespace App\Model;
use PDO;
use PDOException;

class DBConnect
{

private $dsn;
private $username;
private $password;


    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=E-Commerce;charset=utf8";
        $this->username = "Nanhbabe9";
        $this->password = "the1thatgotaway";
    }

    public function connect(){
        try {
            $conn= new PDO($this->dsn,$this->username,$this->password);
            return $conn;
        }catch (PDOException $exception){
           echo $exception->getMessage();
        }
    }


}