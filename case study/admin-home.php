<?php
require __DIR__ . '/vendor/autoload.php';

use App\Controller;

$dbconnect = new \App\Model\DBConnect();
$dbconnect->connect();
$pdController = new Controller\ProductController();
$userController = new Controller\UserController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
include_once 'app/View/layouts/header.php';
try {
    switch ($page) {
        case 'product-list':
            $pdController->showAllProducts();
            break;
        case 'create-product':
            $pdController->addProduct();
            break;
        case 'delete-product':
            $pdController->deleteProduct();
            break;
        case 'update-product':
            $pdController->updateProduct();
            break;
        case 'find':
            $pdController->searchProduct();
            break;
        case 'logout':
            $userController->logOut();
            break;
        case 'adult-product-list':
            $pdController->showAllAdultProduct();
            break;
        case 'children-product-list':
            $pdController->showAllChildrenProduct();
            break;
        default:
            $pdController->showAllProducts();;
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
}
include_once 'app/View/layouts/footer.php';