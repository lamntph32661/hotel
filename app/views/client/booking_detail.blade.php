
<section class="banner-tems text-center">
    <div class="container">
        <div class="banner-content">
            <h2>LIST BOOKING</h2>
            
        </div>
    </div>
</section>
<!-- ROOM DETAIL -->
<section class="body-room-6">
    <div class="container">

        <a href="/listbook" style="margin-bottom: 60px"><--Danh sách</a>
            <div class="" style="height: 40px"></div>
      <form class="ml-5" action="/viewbooking/update/{{$booking[0]->ID}}" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        {{$message??''}}
          <div class="form-group">
            <label for="danhmuc">Full Name</label>
            <input type="text" class="form-control" value="{{$booking[0]->FullName}}"  placeholder="Nhập loại phòng" name="FullName" >
            <p style="color: red">{{$checkData['FullName']??''}}</p>
          </div>
          <div class="form-group">
            <label for="danhmuc">Phone Number</label>
            <input type="text" class="form-control"  value="{{$booking[0]->PhoneNumber}}"  placeholder="Nhập loại phòng" name="PhoneNumber" >
            <p style="color: red">{{$checkData['PhoneNumber']??''}}</p>
          </div>
          <div class="form-group">
            <label for="danhmuc">Image</label>
            
            
                        {{-- <p style="color: red">{{$checkData['Image']??''}}</p> --}}
                        <img src="/uploads/{{$booking[0]->Image}}" alt="" height="100px">
          </div>
          <div class="form-group">
            <label for="danhmuc">Room Number</label>
            <input type="text" class="form-control" disabled value="{{$booking[0]->RoomNumber}}"  placeholder="Nhập loại phòng" name="Name" >
            <p style="color: red">{{$checkData['Name']??''}}</p>
          </div>
          <div class="form-group">
            <label for="danhmuc">Room Type</label>
            <input type="text" class="form-control" disabled value="{{$booking[0]->Name}}"  placeholder="Nhập loại phòng" name="Name" >
            <p style="color: red">{{$checkData['Name']??''}}</p>
          </div>
          <div class="form-group">
            <label for="danhmuc">Booking Date</label>
            <input type="text" class="form-control" disabled value="{{$booking[0]->BookingDate}}"  placeholder="Nhập loại phòng" name="Name" >
            <p style="color: red">{{$checkData['Name']??''}}</p>
          </div>
          <div class="form-group">
            <label for="danhmuc">Check-in Date</label>
            <input type="text" class="form-control" disabled value="{{$booking[0]->CheckInDate}}"  placeholder="Nhập loại phòng" name="Name" >
            <p style="color: red">{{$checkData['Name']??''}}</p>
          </div>
          <div class="form-group">
            <label for="danhmuc">Check-out Date</label>
            <input type="text" class="form-control" disabled value="{{$booking[0]->CheckOutDate}}"  placeholder="Nhập loại phòng" name="Name" >
            <p style="color: red">{{$checkData['Name']??''}}</p>
          </div>
          <div class="form-group">
            <label for="danhmuc">Total Amount</label>
            <input type="text" class="form-control"  disabled value="{{$booking[0]->TotalAmount}}"  placeholder="Nhập loại phòng" name="Name" >
            <p style="color: red">{{$checkData['Name']??''}}</p>
          </div>
          @if ($booking[0]->BookingStatus=='Chờ xác nhận')
          <div class="form-group">
            <label for="danhmuc">Booking Status</label>
            <select name="BookingStatus" id=""  class="form-control">
                <option value="Đã hủy">Hủy</option>
                <option value="{{$booking[0]->BookingStatus}}" selected>{{$booking[0]->BookingStatus}}</option>
            </select>
          </div>
          <div class="card-footer">
            <input type="submit" class="btn btn-primary"  value="Submit">
            <input class="btn btn-secondary" type="reset" value="Nhập lại">
            
          </div>
          @else
          <div class="form-group">
            <label for="danhmuc">Total Amount</label>
            <input type="text" class="form-control" disabled value="{{$booking[0]->BookingStatus}}"  placeholder="Nhập loại phòng" name="Name" >
            <p style="color: red">{{$checkData['Name']??''}}</p>
            
          </div>
          @endif
          
      </form>
      <?php
      ?>


</div>
</section>
  