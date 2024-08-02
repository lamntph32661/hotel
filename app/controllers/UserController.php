<?php
namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController 
{
    function listUser()  {
        $list=UserModel::all();
        return $this->render('Admin\user\list',compact('list'));
    }
    function renderListUser()  {
        return $this->templateRenderAdmin('listUser');
    }
    function delete($id)  {
        UserModel::delete($id);
        return $this->renderListUser();
    }
    function info($id,$checkData=[],$message='') {
        $info=UserModel::find($id);
        return $this->render('Client\info',compact('info','checkData','message'));
    }
    function renderInfo($id,$checkData=[],$message='')  {
        return $this->templateRenderClient('info',[$id,$checkData,$message]);
    }
    function updateInfo($id)  {
        $count=0;
        $checkData=[];
        if (!$_POST['FullName']) {
            $checkData['FullName']='Vui lòng nhập tên';
            $count++;
        }
        if (!$_POST['PassWord']) {
            $checkData['PassWord']='Vui lòng nhập mật khẩu';
            $count++;
        }
        if (!$_POST['Email']) {
            $checkData['Email']='Vui lòng nhập email';
            $count++;
        }
        if (!$_POST['PhoneNumber']) {
            $checkData['PhoneNumber']='Vui lòng nhập SDT';
            $count++;
        }
        if (!$_POST['Address']) {
            $checkData['Address']='Vui lòng nhập địa chỉ';
            $count++;
        }
        if ($count==0) {
            $data=$_POST;
            UserModel::update($id,$data);
            $message="Cập nhật thành công";
            return $this->renderInfo($id,$checkData,$message);
        }else{
            return $this->renderInfo($id,$checkData);
        }
    }
}

?>