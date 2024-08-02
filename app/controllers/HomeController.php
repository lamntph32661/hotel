<?php
namespace App\Controllers;
use App\Models\BannerModel;
use App\Models\ImageModel;
use App\Models\RoomModel;
use App\Models\RoomTypeModel;
use App\Models\UserModel;

class HomeController extends BaseController
{

    public function home()
    {
        $banners = BannerModel::all();
        $rooms = RoomModel::innerJoinBase(
            'SELECT * FROM roomtype;'
        );

        return $this->render('Client\home', compact('rooms', 'banners'));
    }


    public function renderHome()
    {
        return $this->templateRenderClient('home');
    }
    function room()
    {
        $detail = RoomTypeModel::all();
        return $this->render('Client\room', compact('detail'));
    }
    public function renderRoom()
    {
        return $this->templateRenderClient('room');
    }

    function signup($err = '',$data=[],$checkData=[])
    {

        return $this->render('Client\signup', compact('err','data','checkData'));
    }
    function renderSignup($err = '',$data=[],$checkData=[])
    {
        return $this->templateRenderClient('signup', [$err,$data,$checkData]);
    }
    function postUser()
    {
        $checkUser = UserModel::where('UserName', 'like', $_POST['UserName'])->get();
        $err = '';
        $checkData=[];
        $count=0;
        $data=$_POST;
        if (!empty($checkUser)) {
            $err = 'Tên đăng nhập đã tồn tại, vui lòng chọn tên đăng nhập khác';
            $count++;
        }
        if (!isset($_POST['FullName'])||!$_POST['FullName']) {
            $checkData['FullName'] = 'Vui lòng điền tên';
            $count++;
        }
        if (!isset($_POST['PassWord'])||!$_POST['PassWord']) {
            $checkData['PassWord'] = 'Vui lòng điền PassWord';
            $count++;
        }
        if (!isset($_POST['UserName'])||!$_POST['UserName']) {
            $checkData['UserName'] = 'Vui lòng điền tên đăng nhập';
            $count++;
        }
        if (!isset($_POST['PhoneNumber'])||!$_POST['PhoneNumber']) {
            $checkData['PhoneNumber'] = 'Vui lòng điền SDT';
            $count++;
        }
        if (!isset($_POST['Address'])||!$_POST['Address']) {
            $checkData['Address'] = 'Vui lòng điền địa chỉ';
            $count++;
        }
        if (!isset($_POST['Email'])||!$_POST['Email']) {
            $checkData['Email'] = 'Vui lòng điền email';
            $count++;
        }
        if ($count==0) {
            $err = 'Đăng ký thành công, vui lòng đăng nhập';
            $data = $_POST;
            UserModel::insert($data);
            return $this->renderSignup($err,[],[]);
        }else {
            return $this->renderSignup($err,$data,$checkData);
        }
    }
    function logout()
    {
        session_unset();
        return $this->renderHome();
    }
    function login($err = '')
    {

        return $this->render('Client\login', compact('err'));
    }
    public function renderLogin($err = '')
    {
        return $this->templateRenderClient('login', [$err]);
    }
    function checkLogin()
    {
        // Lấy thông tin người dùng từ cơ sở dữ liệu dựa trên UserName và PassWord
        $user = UserModel::where('UserName', 'LIKE', $_POST['UserName'])->andWhere('PassWord', 'LIKE', $_POST['PassWord'])->get();

        if (!empty($user)) {
            // Giả sử $user chứa một đối tượng người dùng với thuộc tính Roles
            // Lưu thông tin đăng nhập vào session
            $_SESSION['UserName'] = $_POST['UserName'];
            $_SESSION['PassWord'] = $_POST['PassWord'];
            // Lưu giá trị Roles vào session
            $_SESSION['Roles'] = $user[0]->Roles; // Giả sử $user trả về một mảng và bạn cần truy cập phần tử đầu tiên
            $_SESSION['UserID'] = $user[0]->ID;
            $_SESSION['FullName'] = $user[0]->FullName;
            $_SESSION['PhoneNumber'] = $user[0]->PhoneNumber;
            // var_dump($user);
            // echo $_SESSION['UserID'];
            header("location:" . BASE_URL);
            // Hiển thị trang chủ
            return $this->renderHome();
        } else {
            // Hiển thị thông báo lỗi nếu thông tin đăng nhập không chính xác
            $err = "Tài khoản hoặc mật khẩu không chính xác";
            return $this->renderLogin($err);
        }
    }

    function roomDetail($id)
    {
        $another = RoomTypeModel::where('id', '<>', $id)->get();
        $detail = RoomTypeModel::find($id);
        $image=ImageModel::where('RoomType','like',$id)->get();
        $oneroom = RoomModel::innerJoinBase('SELECT room.id,roomtype.id as RoomTypeID, room.RoomNumber, room.Status FROM room INNER JOIN roomtype ON room.RoomType=roomtype.id WHERE roomtype.id=' . $id . ' and room.Status=1 LIMIT 1');

        return $this->render('Client\room_detail', compact('detail', 'another','image', 'oneroom'));
    }
    public function renderRoomDetail($id)
    {
        return $this->templateRenderClient('roomDetail', [$id]);
    }
    function homeAdmin()
    {
        return $this->render('Admin\homeAdmin');
    }
    public function renderHomeAdmin()
    {
        return $this->templateRenderAdmin('homeAdmin');
    }




















    // public function listPro()
    // {
    //     return $this->render('Admins\products\ListProductClient');
    // }
    // public function renderListPro()
    // {
    //     return $this->renderWithTemplate('listPro');
    // }
    // public function blog()
    // {
    //     return $this->render('blogs\Clients\Blog');
    // }
    // public function renderBlog()
    // {
    //     return $this->renderWithTemplate('blog');
    // }
    // public function singleBlog()
    // {
    //     return $this->render('blogs\Clients\SingleBlog');
    // }
    // public function renderSingleBlog()
    // {
    //     return $this->renderWithTemplate('singleBlog');
    // }
    // public function cart()
    // {
    //     return $this->render('carts\Clients\Cart');
    // }
    // public function renderCart()
    // {
    //     return $this->renderWithTemplate('cart');
    // }
}
