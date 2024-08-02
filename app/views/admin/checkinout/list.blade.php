<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  
    <div class="row w-100">
              <div class="col-12">
                <div class="card  card-primary">
                  <div class="card-header">
                    
                    <h3 class="card-title">Danh sách check-in-out {{$message??''}}</h3>
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
                          <th>BookingID</th>                    
                          <th>RoomID</th>
                          <th>CheckInTime</th>
                          <th>CheckOutTime</th>
                          <th>Status</th>
                          
                          
                          </tr>
                            
                      </thead>
                      <tbody>
                        @foreach ($list as $item)
                        <tr>
                        <td>{{$item->ID}}</td>
                        <td>{{$item->BookingID}}</td>
                        <td>{{$item->RoomID}}</td>
                        <td>{{$item->CheckInTime}}</td>
                        <td>{{$item->CheckOutTime}}</td>
                        <td>{{$item->Status}}</td>
                        
                        <td>
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