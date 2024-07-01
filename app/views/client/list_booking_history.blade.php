<section class="banner-tems text-center">
    <div class="container">
        <div class="banner-content">
            <h2>LIST BOOKING HISTORY</h2>
            
        </div>
    </div>
</section>
<!-- ROOM DETAIL -->
<section class="body-room-6">
    <div class="container">
        <a href="/listbook" style="margin-bottom: 60px"><--Danh sách</a>
            <div class="" style="height: 40px"></div>
        <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                <th>Full Name</th>
                <th>Phone Number</th>
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Booking Date</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Total Amount</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr>
                        <td>{{$item->FullName}}</td>
                        <td>{{$item->PhoneNumber}}</td>
                        <td>{{$item->RoomNumber}}</td>
                        <td>{{$item->Name}}</td>
                        <td>{{$item->BookingDate}}</td>
                        <td>{{$item->CheckInDate}}</td>
                        <td>{{$item->CheckOutDate}}</td>
                        <td>{{$item->TotalAmount}}</td>
                        <td>{{$item->BookingStatus}}</td>
                        <td><a href="/viewbooking/{{$item->ID}}" class="btn btn-primary">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
                    
        {{-- <div class="wrap-room-6">
            @foreach ($detail as $item)
                <div class="wrap-item ">
                <div class="img">
                    <img src="/uploads/{{$item->Image}}" style="width: 1170px; height: 400px;" alt="#">
                </div>
                <div class="text">
                    <h2 class="h2-rooms">{{$item->Name}}</h2>
                    <h5 class="h5-room">Start form ${{$item->PricePerNight}} per day</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                    <ul>
                        <li>Max Person {{$item->MaxPerson}}(s)</li>
                        <li>Size: 35 m2 / 376 ft2</li>
                        <li>Bed: {{$item->TypeBed}}</li>
                        <li>Extensions: {{$item->Extensions}}</li>
                    </ul>
                    <a href="/room/detail/{{$item->id}}" class="view-dateails btn btn-room">VIEW DETAILS</a>
                </div>
            </div>
            @endforeach
            
            <div class="wrap-item ">
                <div class="img">
                    <img src="/app/views/client/landing.engotheme.com/images/Room/room-35.jpg" alt="#">
                </div>
                <div class="text-1">
                    <h2 class="h2-rooms">FAMILY ROOM</h2>
                    <h5 class="h5-room">Start form $120 per day</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                    <ul>
                        <li>Max: 4 Person(s)</li>
                        <li>View: Ocean</li>
                        <li>Size: 35 m2 / 376 ft2</li>
                        <li>Bed: King-size or twin beds</li>
                    </ul>
                    <a href="/room/detail" class="view-dateails btn btn-room">VIEW DETAILS</a>
                </div>
            </div>
            <div class="wrap-item ">
                <div class="img">
                    <img src="/app/views/client/landing.engotheme.com/images/Room/room-36.jpg" alt="#">
                </div>
                <div class="text">
                    <h2 class="h2-rooms">COUPLE ROOM</h2>
                    <h5 class="h5-room">Start form $120 per day</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                    <ul>
                        <li>Max: 4 Person(s)</li>
                        <li>Size: 35 m2 / 376 ft2</li>
                        <li>View: Ocean</li>
                        <li>Bed: King-size or twin beds</li>
                    </ul>
                    <a href="/room/detail" class="view-dateails btn btn-room">VIEW DETAILS</a>
                </div>
            </div>
            <div class="wrap-item ">
                <div class="img">
                    <img src="/app/views/client/landing.engotheme.com/images/Room/room-37.jpg" alt="#">
                </div>
                <div class="text-1">
                    <h2 class="h2-rooms">STANDARD ROOM</h2>
                    <h5 class="h5-room">Start form $120 per day</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                    <ul>
                        <li>Max: 4 Person(s)</li>
                        <li>View: Ocean</li>
                        <li>Size: 35 m2 / 376 ft2</li>
                        <li>Bed: King-size or twin beds</li>
                    </ul>
                    <a href="/room/detail" class="view-dateails btn btn-room">VIEW DETAILS</a>
                </div>
            </div>
        </div> --}}
    </div>
</section>