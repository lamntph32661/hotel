<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  
    <div class="row w-100">
              <div class="col-12">
                <div class="card  card-primary">
                  <div class="card-header">
                    
                    <h3 class="card-title">Danh sách phòng {{$message??''}}</h3>
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
                          <th>Room Number </th>
                          
                          <th>Type Room </th>
                          
                          <th>Status </th>
                          <th>Functions </th>
                          </tr>
                            
                      </thead>
                      <tbody>
                        @foreach ($listRoom as $item)
                        <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->RoomNumber}}</td>
                        <td>
                          <?php
                            foreach ($listTypeRoom as $key) {
                              if ($key->id==$item->RoomType) {
                                echo $key->Name;
                              }
                            }
                          ?>
                        </td>
                        <td>
                          <?php
                            if ($item->Status==1) {
                              echo 'Chưa được đặt';
                            }else {
                              echo 'Đã được đặt';
                            }
                          ?>
                        </td>

                        <td><a href="/Admin/room/update/{{$item->id}}" ><button class="btn btn-primary">Cập nhật</button></a> 
                          <a href="/Admin/room/delete/{{$item->id}}" onclick="return confirm('Bạn có muốn xóa')"><button class="btn btn-danger">xóa</button></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                     
                      
                        
                      </tbody>
                    </table>
    
    
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div><a href="/Admin/room/add"><input  class="btn btn-primary" type="button" value="Thêm mới" style="margin-left: 6px;"></a>
            </div>
            <!-- /.row --></nav>