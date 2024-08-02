<?php

namespace App\Controllers;

use App\Models\RoomTypeModel;

class RoomTypeController extends BaseController
{
    function list($message="")
    {
        
        $list = RoomTypeModel::all();
        return $this->render('Admin\roomtype\list', compact('list','message'));
    }
    function renderList($message='')
    {
        return $this->templateRenderAdmin('list',[$message]);
    }

    function add($message = '', $checkData = [], $data = [])
    {
        return $this->render('Admin\roomtype\add', compact('message', 'checkData', 'data'));
    }

    function renderAdd($message = '', $checkData = [], $data = [])
    {
        return $this->templateRenderAdmin('add', [$message, $checkData, $data]);
    }

    function post()
    {
        $count = 0;
        $message = 'Thêm thành công';
        $data = [
            'Name' => $_POST['Name'],
            'Image' => $_FILES['Image']['name'],
            'MaxPerson' => $_POST['MaxPerson'],
            'TypeBed' => $_POST['TypeBed'],
            'PricePerNight' => $_POST['PricePerNight'],
            'Extensions' => $_POST['Extensions']
        ];

        // Kiểm tra nếu tên loại phòng rỗng
        if (empty($data['Name'])) {
            
            $checkData['Name'] = 'Vui lòng nhập loại phòng'; // Sử dụng dấu '=' để gán giá trị
            $count++;
        } else {
            if (mb_strlen($data['Name']) > 255) {
                $checkData['Name'] = 'Độ dài cho phép trong khoảng 1 đến 255 ký tự'; // Sử dụng dấu '=' để gán giá trị
                $count++;
            }
        }

        if (empty($data['MaxPerson'])) {
            
            $checkData['MaxPerson'] = 'Vui lòng nhập số người tối đa'; // Sử dụng dấu '=' để gán giá trị
            $count++;
        } else {
            if ($data['MaxPerson'] > 100) {
                $checkData['MaxPerson'] = 'Số người tối đa trong 1 phòng là 99'; // Sử dụng dấu '=' để gán giá trị
                $count++;
            }
        }
        if (empty($data['PricePerNight'])) {

            $checkData['PricePerNight'] = 'Vui lòng nhập loại giường'; // Sử dụng dấu '=' để gán giá trị
            $count++;
        } else {
            if (mb_strlen($data['PricePerNight']) > 30) {
                $checkData['PricePerNight'] = 'Độ dài cho phép trong khoảng 1 đến 30 ký tự'; // Sử dụng dấu '=' để gán giá trị
                $count++;
            }
        }
        if (empty($data['TypeBed'])) {
            
            $checkData['TypeBed'] = 'Vui lòng nhập loại giường'; // Sử dụng dấu '=' để gán giá trị
            $count++;
        } else {
            if (mb_strlen($data['TypeBed']) > 30) {
                $checkData['TypeBed'] = 'Độ dài cho phép trong khoảng 1 đến 30 ký tự'; // Sử dụng dấu '=' để gán giá trị
                $count++;
            }
        }

        if (empty($data['Extensions'])) {
            
            $checkData['Extensions'] = 'Vui lòng nhập tiện ích mở rộng'; // Sử dụng dấu '=' để gán giá trị
            $count++;
        } else {
            if (mb_strlen($data['Extensions']) > 255) {
                $checkData['Extensions'] = 'Độ dài cho phép trong khoảng 1 đến 255 ký tự'; // Sử dụng dấu '=' để gán giá trị
                $count++;
            }
        }
        if ($count == 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES['Image']['name']);
            move_uploaded_file($_FILES['Image']['tmp_name'], $target_file);
            RoomTypeModel::insert($data); // Chèn dữ liệu vào cơ sở dữ liệu
            return $this->renderList($message); // Cần return để dừng hàm tại đây
        } else {
            return $this->renderAdd($message, $checkData, $data); // Cần return để dừng hàm tại đây

        }
    }
    function UpdateRoomTypeForm($id, $message = '', $checkData = [])
    {
        $roomtype = RoomTypeModel::find($id);
        return $this->render('Admin\roomtype\update', compact('message', 'checkData', 'roomtype'));
    }
    function renderUpdateRoomType($id,$message = '', $checkData = [])
    {
        return $this->templateRenderAdmin('UpdateRoomTypeForm', [$id,$message, $checkData]);
    }
    function UpdateRoomType($id)
    {
        $count = 0;
        $message = 'Cập nhật thành công';
        $data = [
            'Name' => $_POST['Name'],
            'MaxPerson' => $_POST['MaxPerson'],
            'TypeBed' => $_POST['TypeBed'],
            'PricePerNight' => $_POST['PricePerNight'],
            'Extensions' => $_POST['Extensions']
        ];

        // Kiểm tra nếu tên loại phòng rỗng
        if (empty($data['Name'])) {
            
            $checkData['Name'] = 'Vui lòng nhập loại phòng'; // Sử dụng dấu '=' để gán giá trị
            $count++;
        } else {
            if (mb_strlen($data['Name']) > 255) {
                $checkData['Name'] = 'Độ dài cho phép trong khoảng 1 đến 255 ký tự'; // Sử dụng dấu '=' để gán giá trị
                $count++;
            }
        }
        if (empty($data['PricePerNight'])) {

            $checkData['PricePerNight'] = 'Vui lòng nhập loại giường'; // Sử dụng dấu '=' để gán giá trị
            $count++;
        } else {
            if (mb_strlen($data['PricePerNight']) > 30) {
                $checkData['PricePerNight'] = 'Độ dài cho phép trong khoảng 1 đến 30 ký tự'; // Sử dụng dấu '=' để gán giá trị
                $count++;
            }
        }
        if (empty($data['MaxPerson'])) {
            
            $checkData['MaxPerson'] = 'Vui lòng nhập số người tối đa'; // Sử dụng dấu '=' để gán giá trị
            $count++;
        } else {
            if ($data['MaxPerson'] > 100) {
                $checkData['MaxPerson'] = 'Số người tối đa trong 1 phòng là 99'; // Sử dụng dấu '=' để gán giá trị
                $count++;
            }
        }

        if (empty($data['TypeBed'])) {
            
            $checkData['TypeBed'] = 'Vui lòng nhập loại giường'; // Sử dụng dấu '=' để gán giá trị
            $count++;
        } else {
            if (mb_strlen($data['TypeBed']) > 30) {
                $checkData['TypeBed'] = 'Độ dài cho phép trong khoảng 1 đến 30 ký tự'; // Sử dụng dấu '=' để gán giá trị
                $count++;
            }
        }

        if (empty($data['Extensions'])) {
            
            $checkData['Extensions'] = 'Vui lòng nhập tiện ích mở rộng'; // Sử dụng dấu '=' để gán giá trị
            $count++;
        } else {
            if (mb_strlen($data['Extensions']) > 255) {
                $checkData['Extensions'] = 'Độ dài cho phép trong khoảng 1 đến 255 ký tự'; // Sử dụng dấu '=' để gán giá trị
                $count++;
            }
        }
        if ($count == 0) {
            if (isset($_FILES['Image_new']) && $_FILES['Image_new']['name']) {
                $data['Image'] = $_FILES['Image_new']['name'];
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES['Image_new']['name']);
                move_uploaded_file($_FILES['Image_new']['tmp_name'], $target_file);
            }
            RoomTypeModel::update($id, $data); // Chèn dữ liệu vào cơ sở dữ liệu
            return $this->renderList($message); // Cần return để dừng hàm tại đây
        } else {
            return $this->renderUpdateRoomType($id,$message, $checkData); // Cần return để dừng hàm tại đây

        }
    }
    function deleteRoomType($id)
    {
        RoomTypeModel::delete($id);
        $this->renderList();
    }
}
