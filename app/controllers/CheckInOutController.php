<?php
namespace App\Controllers;

use App\Models\CheckInOutModel;

final class CheckInOutController extends BaseController
{
    function listCheckInOut()  {
        $list=CheckInOutModel::all();
        return $this->render('admin\checkinout\list',compact('list'));
    }
    function renderListCheckInOut()  {
        return $this->templateRenderAdmin('listCheckInOut');
    }
}

?>