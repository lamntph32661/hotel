
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <div class="card card-primary w-100" style="height: 585px;">
    <div class="card-header">
      <h3 class="card-title">Thêm loại phòng</h3>
    </div>
    <form class="ml-5" action="/Admin/room/type/update/post/{{$roomtype->id}}" method="POST" enctype="multipart/form-data">
    <div class="card-body">
      {{$message??''}}
        <div class="form-group">
          <label for="danhmuc">Tên loại phòng</label>
          <input type="text" class="form-control" value="{{$roomtype->Name}}"  placeholder="Nhập loại phòng" name="Name" >
          <p style="color: red">{{$checkData['Name']??''}}</p>
        </div>
        <div class="form-group">
          <label for="danhmuc">Image</label>
          
          <input type="file" name="Image_new" id=""  class="form-control">
                      {{-- <p style="color: red">{{$checkData['Image']??''}}</p> --}}
                      <img src="/uploads/{{$roomtype->Image}}" alt="" height="100px">
        </div>
        <div class="form-group">
          <label for="danhmuc">Số người tối đa</label>
          <input type="number" class="form-control"  value="{{$roomtype->MaxPerson}}"  placeholder="Nhập số người tối đa" name="MaxPerson" >
                      <p style="color: red">{{$checkData['MaxPerson']??''}}</p>

        </div>
        <div class="form-group">
          <label for="danhmuc">Loại giường</label>
          <input type="text" class="form-control"  value="{{$roomtype->TypeBed}}"  placeholder="Nhập loại giường" name="TypeBed" >
                      <p style="color: red">{{$checkData['TypeBed']??''}}</p>

        </div>
        <div class="form-group">
          <label for="danhmuc">Giá trên 1 đêm</label>
          <input type="number" class="form-control"  value="{{$roomtype->PricePerNight}}"  placeholder="Nhập tiện ích mở rộng" name="PricePerNight" >
                      <p style="color: red">{{$checkData['PricePerNight']??''}}</p>

        </div>
        <div class="form-group">
          <label for="danhmuc">Tiện ích mở rộng</label>
          <input type="text" class="form-control"  value="{{$roomtype->Extensions}}"  placeholder="Nhập tiện ích mở rộng" name="Extensions" >
                      <p style="color: red">{{$checkData['Extensions']??''}}</p>

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
