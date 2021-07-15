<?php


namespace App\Model;


class UserModel
{
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }

    public function save($request)
    {
        try {
            $sql = "insert into `Account`(`username`, `password`, `email`) values (?,?,?)";
            $stmt = $this->dbConnect->connect()->prepare($sql);
            $stmt->bindParam(1, $request['username']);
            $stmt->bindParam(2, $request['password']);
            $stmt->bindParam(3, $request['email']);
            $stmt->execute();
        } catch (\PDOException $exception) {
          echo $exception->getMessage();
        }
    }

    public function loginUser($request)
    {

        try {
            $sql = 'select * from `Account` where `username`=? and `password`=?';
            $stmt = $this->dbConnect->connect()->prepare($sql);
            $stmt->bindParam(1,$request['username']);
            $stmt->bindParam(2,$request['password']);
            $stmt->execute();
            if ($stmt->rowCount()>=1){
                $user = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                if ($user[0]->role == 1) {
                    header('location:admin-home.php');
                } else if ($user[0]->role == 0) {
                    header('location:index.php');
                }
            }
        }catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
        }
}


