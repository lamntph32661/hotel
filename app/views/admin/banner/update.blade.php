
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <div class="card card-primary w-100" style="height: 585px;">
      <div class="card-header">
        <h3 class="card-title">Sửa banner</h3>
      </div>
      <form class="ml-5" action="/admin/banner/update/post/{{$banner->id}}" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        
          <div class="form-group">
            <label for="danhmuc">Tên banner</label>
            <input type="text" class="form-control" value="{{$banner->Name}}"  placeholder="Nhập tên banner" name="Name" >
            <p style="color: red">{{$checkData['Name']??''}}</p>
          </div>
          <div class="form-group">
            <label for="danhmuc">Image</label>
            <input type="file" name="Image_new" id=""  class="form-control">

          </div>
<img src="/uploads/{{$banner->Image}}" alt="" height="100px">
          <div class="card-footer">
            <input type="submit" class="btn btn-primary"  value="Submit">
            <input class="btn btn-secondary" type="reset" value="Nhập lại">
            <a href="/admin/banner/type" class="btn btn-success">Danh sách</a>
          </div>
      </form>
      <?php
      ?>
    </div>
  </nav>
  