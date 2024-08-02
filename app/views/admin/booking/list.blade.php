<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  
    <div class="row w-100">
              <div class="col-12">
                <div class="card  card-primary">
                  <div class="card-header">
                    
                    <h3 class="card-title">Danh sách Booking {{$message??''}}</h3>
                    <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        
                        <div class="input-group-append">
                          <a href="/Admin/booking/history"><button class="btn" style="border: 1px solid white; color: aliceblue">Lịch sử</button></a>
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
                          <th>UserID </th>
                          <th>RoomID </th>
                          <th>Booking date</th>
                          <th>Check in date</th>
                          <th>Check out date</th>
                          <th>Total amount </th>
                          <th>Status </th>
                          <th>Functions </th>
                          </tr>
                            
                      </thead>
                      <tbody>
                        @foreach ($list as $item)
                        <tr>
                        <td>{{$item->ID}}</td>
                        <td>{{$item->UserID}}</td>
                        <td>{{$item->RoomID}}</td>
                        <td>{{$item->BookingDate}}</td>
                        <td>{{$item->CheckInDate}}</td>
                        <td>{{$item->CheckOutDate}}</td>
                        <td>{{$item->TotalAmount}}</td>
                        <td>{{$item->BookingStatus}}</td>
                        <td><a href="/Admin/booking/update/{{$item->ID}}" ><button class="btn btn-primary">Cập nhật</button></a> <a href="/Admin/room/type/delete/{{$item->id}}" onclick="return confirm('Bạn có muốn xóa')"><button class="btn btn-danger">xóa</button></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                     
                      
                        
                      </tbody>
                    </table>
    
    
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              
            </div>
            <!-- /.row --></nav>