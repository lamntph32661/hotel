<?php

namespace App\Controllers;

use App\Models\BookModel;
use DateTime;
use App\Controllers\HomeController;
use App\Models\CheckInOutModel;
use App\Models\RoomModel;
use App\Models\RoomTypeModel;

class BookController extends BaseController
{
    function Book()
    {
        return $this->render('Client\order');
    }
    function checkRoom()
    {
        if (isset($_POST['CheckInDate']) && isset($_POST['CheckOutDate'])) {
            $_SESSION['Date'] = [$_POST['CheckInDate'], $_POST['CheckOutDate']];
        }
        if (isset($_SESSION['Date'])) {
            $list = RoomModel::innerJoin3($_SESSION['Date'][0], $_SESSION['Date'][1]);
        } else {
            $list = RoomModel::innerJoin3();
        }
        return $this->render('Client\step2_booking', compact('list'));
    }
    function renderCheckRoom()
    {
        return $this->templateRenderClient('checkRoom');
    }
    function selectRoom()
    {
        $IDRoom = $_POST['IDRoom'];
        $Name = $_POST['Name'];
        $RoomNumber = $_POST['RoomNumber'];
        $Image = $_POST['Image'];
        $PricePerNight = $_POST['PricePerNight'];
        $data = array($IDRoom, $Name, $RoomNumber, $Image, $PricePerNight);
        array_unshift($_SESSION['room'], $data);
        return $this->renderCheckRoom();
    }
    function unSelectRoom($id)
    {
        array_splice($_SESSION['room'], $id, 1);
        return $this->renderCheckRoom();
    }

    function renderBook()
    {
        return $this->templateRenderClient('Book');
    }
    function bookRoom()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        for ($i = 0; $i < sizeof($_SESSION['room']); $i++) {
            $date1 = new DateTime($_SESSION['Date'][0]);
            $date2 = new DateTime($_SESSION['Date'][1]);
            $data = [
                'UserID' => $_SESSION['UserID'],
                'RoomID' => $_SESSION['room'][$i][0],
                'BookingDate' => date('Y-m-d H:i:s'),
                'FullName' => $_POST['FullName'],
                'PhoneNumber' => $_POST['PhoneNumber'],
                'CheckInDate' => $_SESSION['Date'][0],
                'CheckOutDate' => $_SESSION['Date'][1],
                'TotalAmount' => ($date1->diff($date2)->days) * $_SESSION['room'][$i][4],
                'BookingStatus' => 'Chờ xác nhận'
            ];
            // echo $data['TotalAmount'];
           
            BookModel::insert($data);
        }
        unset($_SESSION['Date']);
        unset($_SESSION['room']);
        $home = new HomeController;
        return $home->renderHome();
    }
    function listAdmin()
    {
        $list = BookModel::innerJoinBase('select * from booking where BookingStatus <> "Đã hủy" and BookingStatus <> "Đã check-out" order by id desc');
        return $this->render('Admin\booking\list', compact('list'));
    }
    function renderListAdmin()
    {
        return $this->templateRenderAdmin('listAdmin');
    }
    function listAdminHistory()
    {
        $list = BookModel::innerJoinBase('select * from booking where BookingStatus like "Đã hủy" or BookingStatus like "Đã check-out" order by id desc');
        return $this->render('Admin\booking\list_history', compact('list'));
    }
    function renderListAdminHistory()
    {
        return $this->templateRenderAdmin('listAdminHistory');
    }
    function updateForm($id)
    {
        $booking = BookModel::find($id);
        return $this->render('Admin\booking\update', compact('booking'));
    }
    function renderUpdate($id)
    {
        return $this->templateRenderAdmin('updateForm', [$id]);
    }
    function UpdateBooking($id)
    {
        $data = ['BookingStatus' => $_POST['BookingStatus']];
        BookModel::update($id, $data);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if ($_POST['BookingStatus'] == 'Đã check-in') {
            $checkinout = [
                'BookingID' => $_POST['ID'],
                'RoomID' => $_POST['RoomID'],
                'CheckInTime' => date('Y-m-d H:i:s'),
                'CheckOutTime' => null,
                'Status' => 'Đã check-in'
            ];
            CheckInOutModel::insert($checkinout);
            $booking=BookModel::find($id);
        $data2 = ['Status' => 0];
        $bookingIDRoom=$booking->RoomID;
        RoomModel::update($bookingIDRoom, $data2);
        }
        if ($_POST['BookingStatus'] == 'Đã check-out') {

            CheckInOutModel::innerJoinBase('UPDATE CheckInOut
SET CheckOutTime = CURRENT_TIMESTAMP, Status = "Đã check-out"
WHERE BookingID = ' . $_POST['ID'] . ' AND RoomID = ' . $_POST['RoomID'] . ';
');
$booking=BookModel::find($id);
        $data2 = ['Status' => 1];
        $bookingIDRoom=$booking->RoomID;
        RoomModel::update($bookingIDRoom, $data2);
        }
        return $this->renderListAdmin();
    }

    function Booknow()
    {
        $IDRoom = $_POST['IDRoom'];
        $Name = $_POST['Name'];
        $RoomNumber = $_POST['RoomNumber'];
        $Image = $_POST['Image'];
        $PricePerNight = $_POST['PricePerNight'];
        $data = array($IDRoom, $Name, $RoomNumber, $Image, $PricePerNight);
        array_unshift($_SESSION['room'], $data);
        return $this->renderCheckRoom();
    }
    function listBook() {
        $list=RoomModel::innerJoinBase('SELECT booking.*,roomtype.Name, room.RoomNumber FROM `room` INNER JOIN booking ON booking.RoomID=room.id INNER JOIN roomtype on roomtype.id=room.RoomType WHERE booking.UserID='.$_SESSION['UserID'].' AND booking.BookingStatus <> "Đã hủy" AND booking.BookingStatus <> "Đã check-out"  ORDER BY booking.ID DESC');
        return $this->render('Client\list_booking',compact('list'));
    }
    function renderListBook() {
        return $this->templateRenderClient('listBook');
    }
    function listBookHistory() {
        $list=RoomModel::innerJoinBase('SELECT booking.*,roomtype.Name, room.RoomNumber FROM `room` INNER JOIN booking ON booking.RoomID=room.id INNER JOIN roomtype on roomtype.id=room.RoomType WHERE booking.UserID='.$_SESSION['UserID'].' AND (booking.BookingStatus like "Đã hủy" OR booking.BookingStatus like "Đã check-out")  ORDER BY booking.ID DESC');
        return $this->render('Client\list_booking_history',compact('list'));
    }
    function renderListBookHistory() {
        return $this->templateRenderClient('listBookHistory');
    }
    function viewBooking($id,$checkData=[])  {
        $booking=RoomModel::innerJoinBase('SELECT booking.*,roomtype.Name,roomtype.Image, room.RoomNumber FROM `room` INNER JOIN booking ON booking.RoomID=room.id INNER JOIN roomtype on roomtype.id=room.RoomType WHERE booking.UserID='.$_SESSION['UserID'].' AND booking.ID='.$id.' ORDER BY booking.ID DESC;');
        return $this->render('Client\booking_detail',compact('booking','checkData'));
    }
    function renderViewBook($id,$checkData=[])  {
        return $this->templateRenderClient('viewBooking',[$id,$checkData]);
    }
    function updateBookingClient($id)  {
        $count=0;
        if (!isset($_POST['FullName'])||(!$_POST['FullName'])) {
        $checkData['FullName']='Vui lòng nhập tên';
        $count++;
        }
        if (!isset($_POST['PhoneNumber'])||(!$_POST['PhoneNumber'])) {
            $checkData['PhoneNumber']='Vui lòng nhập số điện thoại';
            $count++;
        }
        if ($count==0) {
            $data=[
                'FullName'=>$_POST['FullName'],
                'PhoneNumber'=>$_POST['PhoneNumber'],
                'BookingStatus'=>$_POST['BookingStatus']
            ];
            BookModel::update($id,$data);
            return $this->renderListBook();
        }
        else {
            return $this->renderViewBook($id,$checkData);
        }
    }
}
