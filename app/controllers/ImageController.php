<?php
namespace App\Controllers;

use App\Models\ImageModel;
use App\Models\RoomTypeModel;

class ImageController extends BaseController 
{
    function listAdmin($message='') {
        $list=ImageModel::all();
        $roomType=RoomTypeModel::all();
        return $this->render('admin\image\list',compact('list','roomType','message'));
    }
    function renderListAdmin($message='')  {
        return $this->templateRenderAdmin('listAdmin',[$message]);
    }
    function addForm($data=[],$checkData=[]) {
        $roomType=RoomTypeModel::all();
        return $this->render('admin\image\add',compact('roomType','data','checkData'));
    }
    function renderAdd($data=[],$checkData=[])  {
        return $this->templateRenderAdmin('addForm',[$data,$checkData]);
    }
    function post()  {
        
        if (!isset($_FILES['Image']['name'])||!$_FILES['Image']['name']) {
            $checkData['Image']='Vui lòng chọn ảnh';
            return $this->renderAdd([],$checkData);
        }else {
            $data=[
                'RoomType'=>$_POST['RoomType'],
                'Image'=>$_FILES['Image']['name']
            ];
            ImageModel::insert($data);
            $target_file='uploads/'.basename($_FILES['Image']['name']);
            move_uploaded_file($_FILES['Image']['tmp_name'],$target_file);
            $message=" :Thêm thành công";
            return $this->renderListAdmin($message);
        }
    }
    function deleteImage($id)  {
        ImageModel::delete($id);
        $message=' :Xóa thành công';
        return $this->renderListAdmin($message);
    }
    function updateImage($id,$checkData=[])  {
        $roomType=RoomTypeModel::all();
        $image=ImageModel::find($id);
        return $this->render('admin\image\update',compact('roomType','image','checkData'));
    }
    function renderUpdateImage($id,$checkData=[]) {
        return $this->templateRenderAdmin('updateImage',[$id,$checkData]);
    }
    function postUpdateImage($id)  {
        $data=['RoomType'=>$_POST['RoomType']];
        if (isset($_FILES['Image_new']['name'])&&$_FILES['Image_new']['name']) {
           $data['Image']=$_FILES['Image_new']['name'];
           $target_file='uploads/'.basename($_FILES['Image_new']['name']);
            move_uploaded_file($_FILES['Image_new']['tmp_name'],$target_file);
            
        }
        ImageModel::update($id,$data);
        $message=" :Thêm thành công";
        return $this->renderListAdmin($message);
    }
}

?>