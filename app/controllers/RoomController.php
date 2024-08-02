<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoomModel;
use App\Models\RoomTypeModel;

class RoomController extends BaseController
{

    function list($message = '')
    {
        $listTypeRoom=RoomTypeModel::all();
        $listRoom = RoomModel::all();
        return $this->render('Admin\room\list', compact('listRoom','listTypeRoom', 'message'));
    }
    function renderList($message = '')
    {
        return $this->templateRenderAdmin('list', [$message]);
    }
    function add($checkData = [], $data = [])
    {
        $listTypeRoom = RoomTypeModel::all();
        return $this->render('Admin\room\add', compact('listTypeRoom', 'checkData', 'data'));
    }
    function renderAddForm($checkData = [], $data = [])
    {
        return $this->templateRenderAdmin('add', [$checkData, $data]);
    }
    function post()
    {
        $count = 0;
        $message = 'Thêm thành công';
        $data = [
            'RoomNumber' => $_POST['RoomNumber'],
            
            'RoomType' => $_POST['TypeRoom'],
            
            'Status' => $_POST['Status']
        ];
        // Kiểm tra nếu tên loại phòng rỗng
        if (empty($data['RoomNumber'])) {

            $checkData['RoomNumber'] = 'Vui lòng nhập loại phòng'; // Sử dụng dấu '=' để gán giá trị
            $count++;
        } else {
            if (mb_strlen($data['RoomNumber']) > 255) {
                $checkData['RoomNumber'] = 'Độ dài cho phép trong khoảng 1 đến 255 ký tự'; // Sử dụng dấu '=' để gán giá trị
                $count++;
            }
        }

        if (empty($data['RoomType'])) {

            $checkData['RoomType'] = 'Vui lòng nhập số người tối đa'; // Sử dụng dấu '=' để gán giá trị
            $count++;
        } else {
            if ($data['RoomType'] > 100) {
                $checkData['RoomType'] = 'Số người tối đa trong 1 phòng là 99'; // Sử dụng dấu '=' để gán giá trị
                $count++;
            }
        }
        if ($count == 0) {
           
            RoomModel::insert($data);
            return $this->renderList($message);
        } else {
            return $this->renderAddForm($checkData, $data); // Cần return để dừng hàm tại đây

        }
    }
    function delete($id)
    {
        RoomModel::delete($id);
        return $this->renderList();
    }
    function updateForm($id, $message = '', $checkData = [])
    {
        $listTypeRoom = RoomTypeModel::all();
        $room = RoomModel::find($id);
        return $this->render('Admin\room\update', compact('room', 'message', 'listTypeRoom', 'checkData'));
    }
    function renderUpdateRoom($id, $message = '', $checkData = [])
    {
        return $this->templateRenderAdmin('updateForm', [$id, $message, $checkData]);
    }
    function postUpdate($id)
    {
        
        $message = '';
        $count = 0;
        $data = [
            'RoomNumber' => $_POST['RoomNumber'],
            'RoomType' => $_POST['TypeRoom'],

            'Status' => $_POST['Status']
        ];
        if (empty($data['RoomNumber'])) {

            $checkData['RoomNumber'] = 'Vui lòng nhập loại phòng'; // Sử dụng dấu '=' để gán giá trị
            $count++;
        } else {
            if (mb_strlen($data['RoomNumber']) > 10) {
                $checkData['RoomNumber'] = 'Độ dài cho phép trong khoảng 1 đến 10 ký tự'; // Sử dụng dấu '=' để gán giá trị
                $count++;
            }
        }

        if (empty($data['RoomType'])) {

            $checkData['RoomType'] = 'Vui lòng nhập số người tối đa'; // Sử dụng dấu '=' để gán giá trị
            $count++;
        } else {
            if ($data['RoomType'] > 100) {
                $checkData['RoomType'] = 'Số người tối đa trong 1 phòng là 99'; // Sử dụng dấu '=' để gán giá trị
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
            $message = 'Cập nhật thành công';
            RoomModel::update($id, $data);
            return $this->renderList();
        }else {
            
            return $this->renderUpdateRoom($id,$message, $checkData); // Cần return để dừng hàm tại đây

        }
    }
}
