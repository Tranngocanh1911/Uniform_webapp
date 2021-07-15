<?php
require __DIR__ . '/vendor/autoload.php';

use App\Controller\UserController;

$dbconnect = new \App\Model\DBConnect();
$usercontrol = new UserController();
$page = '';
if (isset($_REQUEST['register'])) {
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
    $data = $_POST;
    $usercontrol->createUser($data);
}
if (isset($_REQUEST['login'])) {
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
    $data = $_POST;
    $usercontrol->login();
}
