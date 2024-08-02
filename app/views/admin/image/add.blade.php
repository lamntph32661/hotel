
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <div class="card card-primary w-100" style="height: 585px;">
      <div class="card-header">
        <h3 class="card-title">Thêm Image</h3>
      </div>
      <form class="ml-5" action="/Admin/image/add/post" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        {{$message??''}}
          <div class="form-group">
            <label for="danhmuc">Loại phòng</label>
            <select name="RoomType" id="" class="form-control">
              @foreach ($roomType as $item)
                  <option value="{{$item->id}}">{{$item->Name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="danhmuc">Image</label>
            <input type="file" name="Image" id="" class="form-control">
            <p style="color: red">{{$checkData['Image']??''}}</p>
          </div>

          <div class="card-footer">
            <input type="submit" class="btn btn-primary"  value="Submit">
            <input class="btn btn-secondary" type="reset" value="Nhập lại">
            <a href="/Admin/image/list" class="btn btn-success">Danh sách</a>
          </div>
      </form>
      <?php
      ?>
    </div>
  </nav>
  