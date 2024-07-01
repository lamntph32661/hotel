<?php
session_start();
if (!isset($_SESSION['room'])) {
    $_SESSION['room']=array();
}
// include "app/Views/admins/header.blade.php";

use App\Controllers\BannerController;
use App\Controllers\BookController;
use App\Controllers\CheckInOutController;
use App\Controllers\HomeController;
use App\Controllers\ImageController;
use App\Controllers\RoomController;
use App\Controllers\RoomTypeController;
use App\Controllers\UserController;
use Phroute\Phroute\RouteCollector;

require_once "env.php";
require_once "functions.php";
require_once __DIR__ . "/vendor/autoload.php";

// laays duong dan
$url = $_GET['url'] ?? '/';
$router = new RouteCollector();

$router->get("/", [HomeController::class, 'renderHome']);
$router->get("room", [HomeController::class, 'renderRoom']);
$router->get("checkroom", [BookController::class, 'renderCheckRoom']);
$router->get("listbook", [BookController::class, 'renderListBook']);
$router->get("listbookhistory", [BookController::class, 'renderListBookHistory']);
$router->get("viewbooking/{id}", [BookController::class, 'renderViewBook']);
$router->post("viewbooking/update/{id}", [BookController::class, 'updateBookingClient']);
$router->post("selectroom", [BookController::class, 'selectRoom']);
$router->post("selectdate", [BookController::class, 'renderCheckRoom']);
$router->get("bill", [BookController::class, 'renderBook']);
$router->post("selectroomdate", [BookController::class, 'Booknow']);
$router->post("book", [BookController::class, 'bookRoom']);
$router->get("userinfo/{id}", [UserController::class, 'renderInfo']);
$router->post("userinfo/update/{id}", [UserController::class, 'updateInfo']);
$router->get("unselectroom/{id}", [BookController::class, 'unSelectRoom']);

$router->get("room/detail/{id}", [HomeController::class, 'renderRoomDetail']);
$router->get("login", [HomeController::class, 'renderLogin']);
$router->get("signup", [HomeController::class, 'renderSignup']);
$router->post("signup/post", [HomeController::class, 'postUser']);

$router->get("logout", [HomeController::class, 'logout']);

$router->post("login/check", [HomeController::class, 'checkLogin']);

$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->get('/', [HomeController::class, 'renderHomeAdmin']);
    $router->get('room', [RoomController::class, 'renderList']);
    $router->get('room/add', [RoomController::class, 'renderAddForm']);
    $router->post('room/add/post', [RoomController::class, 'post']);
    $router->get('room/delete/{id}', [RoomController::class, 'delete']);
    $router->get('room/update/{id}', [RoomController::class, 'renderUpdateRoom']);
    $router->post('room/update/post/{id}', [RoomController::class, 'postUpdate']);


    $router->get('room/type', [RoomTypeController::class, 'renderList']);
    $router->get('room/type/add', [RoomTypeController::class, 'renderAdd']);
    $router->post('room/type/add/post', [RoomTypeController::class, 'post']);
    $router->get('room/type/delete/{id}', [RoomTypeController::class, 'deleteRoomType']);
    $router->get('room/type/update/{id}', [RoomTypeController::class, 'renderUpdateRoomType']);
    $router->post('room/type/update/post/{id}', [RoomTypeController::class, 'UpdateRoomType']);

    $router->get('booking', [BookController::class, 'renderListAdmin']);
    $router->get('booking/history', [BookController::class, 'renderListAdminHistory']);
    $router->get('booking/update/{id}', [BookController::class, 'renderUpdate']);
    $router->post('booking/update/post/{id}', [BookController::class, 'UpdateBooking']);

    $router->get('banner/list', [BannerController::class, 'renderListBanner']);
    $router->get('banner/add', [BannerController::class, 'renderAddBanner']);
    $router->get('banner/delete/{id}', [BannerController::class, 'delete']);
    $router->get('banner/update/{id}', [BannerController::class, 'renderUpdateBanner']);
    $router->post('banner/add/post', [BannerController::class, 'post']);
    $router->post('banner/update/post/{id}', [BannerController::class, 'updateBannerPost']);

    $router->get('checkinout/list', [CheckInOutController::class, 'renderListCheckInOut']);
    $router->get('user/list', [UserController::class, 'renderListUser']);
    $router->get('user/delete/{id}', [UserController::class, 'delete']);

    $router->get('image/list', [ImageController::class, 'renderListAdmin']);
    $router->get('image/add', [ImageController::class, 'renderAdd']);
    $router->post('image/add/post', [ImageController::class, 'post']);
    $router->get('image/delete/{id}', [ImageController::class, 'deleteImage']);
    $router->get('image/update/{id}', [ImageController::class, 'renderUpdateImage']);
    $router->post('image/update/post/{id}', [ImageController::class, 'postUpdateImage']);
});


try {
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

    // Print out the value returned from the dispatched function
    echo $response;
} catch (\Phroute\Phroute\Exception\HttpRouteNotFoundException $e) {
    echo "404 file not found";
}

// include "app/Views/admins/footer.blade.php";


// $products = ProductModel::all();

// $product = ProductModel::find(143);
// dd($product);

// $data = [
//     "name" => "Iphone 16 new",
//     "price" => 1210,
//     "image" => "iphone16.jpg",
//     "cate_id" => 15
// ];
// // ProductModel::insert($data);
// // ProductModel::update(177, $data);
// // ProductModel::delete(177);

// //Lấy sản phẩm có price > 20000, từ danh mục có cate_id=6
// // $products = ProductModel::where('price', '>', 40000)
// //     ->andWhere('cate_id', '=', 6)->get();

// $products = ProductModel::where('name', 'LIKE', "%Samir%")->get();
// dd($products);