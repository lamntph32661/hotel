
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <div class="card card-primary w-100" style="height: 585px;">
      <div class="card-header">
        <h3 class="card-title">Thêm loại phòng</h3>
      </div>
      <form class="ml-5" action="/Admin/booking/update/post/{{$booking->ID}}" method="POST">
      <div class="card-body">
        <div class="form-group"><input type="hidden" name="ID"  class="form-control" value="{{$booking->ID}}" id="" ></div>
          <div class="form-group"><input type="hidden" name="UserID"  class="form-control" value="{{$booking->UserID}}" id="" ></div>
          <div class="form-group"><input type="hidden" name="RoomID"  class="form-control" value="{{$booking->RoomID}}" id="" ></div>
          <div class="form-group"><input type="hidden" name="BookingDate"  class="form-control" value="{{$booking->BookingDate}}" id="" ></div>
          <div class="form-group"><input type="hidden" name="CheckInDate"  class="form-control" value="{{$booking->CheckInDate}}" id="" ></div>
          <div class="form-group"><input type="hidden" name="CheckOutDate"  class="form-control" value="{{$booking->CheckOutDate}}" id="" ></div>
          <div class="form-group"><input type="hidden" name="TotalAmount"  class="form-control" value="{{$booking->TotalAmount}}" id="" ></div>
          <div class="form-group">
            <label for="danhmuc">Booking status</label>
            
            <select name="BookingStatus" id="" class="form-control">
                <?php 
                  //  if ($booking->BookingStatus=='Chờ xác nhận') {
                  //   echo '<option value="Chờ xác nhận" selected >Chờ xác nhận</option>';
                  //  } else {
                  //   echo '<option value="Chờ xác nhận" >Chờ xác nhận</option>';
                  //  }
                  //  if ($booking->BookingStatus=='Đã xác nhận') {
                  //   echo '<option value="Đã xác nhận" selected >Đã xác nhận</option>';
                  //  } else {
                  //   echo '<option value="Đã xác nhận" >Đã xác nhận</option>';
                  //  }
                  //  if ($booking->BookingStatus=='Đã check-in') {
                  //   echo '<option value="Đã check-in" selected >Đã check-in</option>';
                  //  } else {
                  //   echo '<option value="Đã check-in" >Đã check-in</option>';
                  //  }
                  //  if ($booking->BookingStatus=='Đã check-out') {
                  //   echo '<option value="Đã check-out" selected >Đã check-out</option>';
                  //  } else {
                  //   echo '<option value="Đã check-out" >Đã check-out</option>';
                  //  }
                  //  if ($booking->BookingStatus=='Đã hủy') {
                  //   echo '<option value="Đã hủy" selected >Đã hủy</option>';
                  //  } else {
                  //   echo '<option value="Đã hủy" >Đã hủy</option>';
                  //  }
                ?>
               @if ($booking->BookingStatus=='Chờ xác nhận')
               <option value="Chờ xác nhận" selected >Chờ xác nhận</option>
               <option value="Đã xác nhận" >Đã xác nhận</option>
               <option value="Đã check-in" >Đã check-in</option>
               <option value="Đã check-out" >Đã check-out</option>
               <option value="Đã hủy" >Đã hủy</option>
               @endif
               @if ($booking->BookingStatus=='Đã xác nhận')
               
               <option value="Đã xác nhận" selected>Đã xác nhận</option>
               <option value="Đã check-in" >Đã check-in</option>
               <option value="Đã check-out" >Đã check-out</option>
               <option value="Đã hủy" >Đã hủy</option>
               @endif
               @if ($booking->BookingStatus=='Đã check-in')
               
               
               <option value="Đã check-in" selected>Đã check-in</option>
               <option value="Đã check-out" >Đã check-out</option>
               <option value="Đã hủy" >Đã hủy</option>
               @endif
               @if ($booking->BookingStatus=='Đã check-out')
               <option value="Đã check-out" selected>Đã check-out</option>
               <option value="Đã hủy" >Đã hủy</option>
               @endif
            </select>
          </div>
          <div class="card-footer">
            <input type="submit" class="btn btn-primary"  value="Submit">
            <input class="btn btn-secondary" type="reset" value="Nhập lại">
            <a href="/Admin/room/type" class="btn btn-success">Danh sách</a>
          </div>
      </form>
      <?php
      ?>
    </div>
  </nav>
  