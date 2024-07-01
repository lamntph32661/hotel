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
                          <th>UserID </th>
                          <th>RoomID </th>
                          <th>Booking date</th>
                          <th>Check in date</th>
                          <th>Check out date</th>
                          <th>Total amount </th>
                          <th>Status </th>
                          
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