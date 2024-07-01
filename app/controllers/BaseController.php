<?php

namespace App\Controllers;

use App\Models\UserModel;
use eftec\bladeone\BladeOne;

class BaseController
{
    public function view($filePath, $data = [])
    {
        extract($data);
        include_once PART_VIEW . "$filePath.php";
    }
    // function render dùng cho bladeone
    public function render($view, $data = [])
    {
        // đường dẫn chứa view
        $viewDir = "./app/views";
        $cache = "./cache";
        $blade = new BladeOne($viewDir, $cache, BladeOne::MODE_DEBUG);
        echo $blade->run($view, $data);
    }
    
    public function header() {
        if (isset($_SESSION['UserName'])) {
            $user=UserModel::where('UserName','like',$_SESSION['UserName'])->get();
        }else {
            $user='';
        }
        
        
        return $this->render('admin\headerAdmin',compact('user'));

    }
    public function footer() {
        return $this->render('admin\footerAdmin');

    }
    function templateRenderAdmin($content,$param=[]) {
        $header=$this->header();
        $contentFunction=$this->$content(...$param);
        $footer=$this->footer();
        return $header.$contentFunction.$footer;
    }
    
    public function headerClient() {
       $infoUser=[];
        return $this->render('client\header',compact('infoUser'));
    }
    public function footerClient() {
        return $this->render('client\footer');
    }
    function templateRenderClient($content,$param=[]) {
        $header=$this->headerClient();
        $contentFunction=$this->$content(...$param);
        $footer=$this->footerClient();
        return $header.$contentFunction.$footer;
    }
}
