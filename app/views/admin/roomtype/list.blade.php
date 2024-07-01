<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  
    <div class="row w-100">
              <div class="col-12">
                <div class="card  card-primary">
                  <div class="card-header">
                    
                    <h3 class="card-title">Danh sách danh mục {{$message??''}}</h3>
                    <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0"  style="height: 500px;">
                    <table class="table table-head-fixed text-nowrap">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name </th>
                          <th>Image </th>
                          <th>Max Person </th>
                          <th>Type Bed</th>
                          <th>Price Per Night</th>
                          <th>Extensions </th>
                          <th>Functions </th>
                          </tr>
                            
                      </thead>
                      <tbody>
                        @foreach ($list as $item)
                        <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->Name}}</td>
                        <td><img src="/uploads/{{$item->Image}}" alt="" height="100px"></td>
                        <td>{{$item->MaxPerson}}</td>
                        <td>{{$item->TypeBed}}</td>
                        <td>{{$item->PricePerNight}}</td>
                        <td>{{$item->Extensions}}</td>

                        <td><a href="/admin/room/type/update/{{$item->id}}" ><button class="btn btn-primary">Cập nhật</button></a> <a href="/admin/room/type/delete/{{$item->id}}" onclick="return confirm('Bạn có muốn xóa')"><button class="btn btn-danger">xóa</button></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                     
                      
                        
                      </tbody>
                    </table>
    
    
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div><a href="/admin/room/type/add"><input  class="btn btn-primary" type="button" value="Thêm mới" style="margin-left: 6px;"></a>
            </div>
            <!-- /.row --></nav>