<?php
namespace App\Controllers;

use App\Models\BannerModel;
use App\Models\BaseModel;

final class BannerController extends BaseController 
{
    function listBanner($message)  {
        $list=BannerModel::all();
        
        return $this->render('admin\banner\list',compact('list','message'));
    }
    function renderListBanner($message='')  {
        return $this->templateRenderAdmin('listBanner',[$message]);
    }
    function addBanner($data=[],$checkData=[])  {
        return $this->render('admin\banner\add',compact('data','checkData'));
    }
    function renderAddBanner($data=[],$checkData=[]) {
        return $this->templateRenderAdmin('addBanner',[$data,$checkData]);
    }
    function post() {
        if (isset($_POST['Name'])&&isset($_FILES['Image']['name'])) {
            $data=[
                'Name'=>$_POST['Name'],
                'Image'=>$_FILES['Image']['name'],
            ];
            $target_dir='uploads/';
            $target_file = $target_dir . basename($_FILES['Image']['name']);
                move_uploaded_file($_FILES['Image']['tmp_name'], $target_file);
            BannerModel::insert($data);
            $message=' :Thêm thành công';
            return $this->renderListBanner($message);
        }
    }
    function delete($id) {
        $message=' :xóa thành công';
        BannerModel::delete($id);
        return $this->renderListBanner($message);
    }
    function updateBanner($id,$data=[],$checkData=[])  {
        $banner=BannerModel::find($id);
        return $this->render('admin\banner\update',compact('banner','data','checkData','id'));
    }
    function renderUpdateBanner($id,$data=[],$checkData=[]) {
        return $this->templateRenderAdmin('updateBanner',[$id,$data,$checkData]);
    }
    function updateBannerPost($id) {
        if (isset($_POST['Name'])&&($_POST['Name'])) {
            $data=[
                'Name'=>$_POST['Name']
            ];
            if (isset($_FILES['Image_new'])&&($_FILES['Image_new']['name'])) {
                $data['Image']=$_FILES['Image_new']['name'];
                
                $target_file='uploads/'.basename($_FILES['Image_new']['name']);
                move_uploaded_file($_FILES['Image_new']['tmp_name'],$target_file);
            }
            BannerModel::update($id,$data);
            $message=' :Cập nhật thành công';
            return $this->renderListBanner($message);
        }else{
            $checkData['Name']='Vui lòng nhập tên';
            return $this->renderUpdateBanner($id,$data=[],$checkData);
        }
    }
}

?>