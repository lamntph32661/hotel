
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
      <form class="ml-5" action="/userinfo/update/{{$info->ID}}" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        {{$message??''}}
          <div class="form-group">
            <label for="danhmuc">Full Name</label>
            <input type="text" class="form-control" value="{{$info->UserName}}" disabled placeholder="Nhập loại phòng" name="UserName" >
            
          </div>
          <div class="form-group">
            <label for="danhmuc">PassWord</label>
            <input type="text" class="form-control"  value="{{$info->PassWord}}"  placeholder="Nhập loại phòng" name="PassWord" >
            <p style="color: red">{{$checkData['PassWord']??''}}</p>
          </div>
          
          <div class="form-group">
            <label for="danhmuc">Full Name</label>
            <input type="text" class="form-control"  value="{{$info->FullName}}"  placeholder="Nhập loại phòng" name="FullName" >
            <p style="color: red">{{$checkData['FullName']??''}}</p>
          </div>
          <div class="form-group">
            <label for="danhmuc">Email</label>
            <input type="email" class="form-control"  value="{{$info->Email}}"  placeholder="Nhập loại phòng" name="Email" >
            <p style="color: red">{{$checkData['Email']??''}}</p>
          </div>
          <div class="form-group">
            <label for="danhmuc">Phone Number</label>
            <input type="text" class="form-control"  value="{{$info->PhoneNumber}}"  placeholder="Nhập loại phòng" name="PhoneNumber">
            <p style="color: red">{{$checkData['PhoneNumber']??''}}</p>
          </div>
          <div class="form-group">
            <label for="danhmuc">Address</label>
            <input type="text" class="form-control"  value="{{$info->Address}}"  placeholder="Nhập loại phòng" name="Address" >
            <p style="color: red">{{$checkData['Address']??''}}</p>
          </div>
            <div class="card-footer">
            <input type="submit" class="btn btn-primary"  value="Submit">
            <input class="btn btn-secondary" type="reset" value="Nhập lại">
            
          </div>
          
          
          
      </form>
      <?php
      ?>


</div>
</section>
  