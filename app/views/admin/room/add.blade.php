
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <div class="card card-primary w-100" style="height: 585px;">
      <div class="card-header">
        <h3 class="card-title">Thêm phòng</h3>
      </div>
      <form class="ml-5" action="/Admin/room/add/post" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        {{$message??''}}
          <div class="form-group">
            <label for="danhmuc">Số phòng</label>
            <input type="text" class="form-control" value="{{$data['RoomNumber']??''}}"  placeholder="Nhập loại phòng" name="RoomNumber" >
            <p style="color: red">{{$checkData['RoomNumber']??''}}</p>
          </div>
          
          <div class="form-group">
            <label for="danhmuc">Loại phòng</label>
            <select name="TypeRoom" id="" value="{{$data['RoomType']??''}}"  class="form-control">
              
                @foreach ($listTypeRoom as $item)
                    <option value="{{$item->id}}">{{$item->Name}}</option>
                @endforeach
                
            </select>
           

          </div>
          
          <div class="form-group">
            <label for="danhmuc">Trạng thái</label>
            <select name="Status" id="" class="form-control">
              <option value="0">Đã được đặt</option>
              <option value="1">Chưa được đặt</option>
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
  