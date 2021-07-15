<?php


namespace App\Controller;

use App\Model\UserModel;

class UserController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }


    public function createUser($data)
    {
        $this->userModel->save($data);
        header('location:app/View/User/login.php');
    }

    public function login()
    {
        $user = $this->userModel->loginUser($_REQUEST);
        if ($user) {
            session_start();
            $_SESSION['userLogin'] = $user;
        }
        return false;
    }

    public function  logOut()
    {
        if (isset($_SESSION['userLogin'])){
            session_destroy();
            header('location:index.php');
        }
    }
}