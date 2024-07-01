<section class="banner-tems text-center">
    <div class="container">
        <div class="banner-content">
            <h2>RESERVATION</h2>
            <p>Lorem Ipsum is simply dummy text of the printing</p>
        </div>
    </div>
</section>
<!-- RESERVATION -->
<section class="section-reservation-page">
    <div class="container">
        <div class="reservation-page">
            <!-- STEP -->
            {{-- <div class="reservation_step">
                <ul>
                    <li><a href="#"><span>1.</span>  Choose Date</a></li>
                    <li class="active"><a href="#"><span>2.</span> Choose Room</a></li>
                    <li><a href="#"><span>3.</span> Make a Reservation</a></li>
                    <li><a href="#"><span>4.</span> Confirmation</a></li>
                </ul>
            </div> --}}
            <!-- END / STEP -->
            <div class="row">
                <!--  SIDEBAR -->
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <!-- SELECT-ROOM -->
                        
                        <!-- END/SELECT-ROOM -->
                        <!-- WIDGET CHECK AVAILABILITY -->
                        <div class="widget widget_check_availability widget-1">
                            <form action="/selectdate" method="post"><h4 class="widget-title">YOUR RESERVATION</h4>
                            <div class="check_availability">
                                <h6 class="check_availability_title">your stay dates</h6>
                                <div class="check_availability-field">
                                    <label>Arrive</label>
                                    
                                        <input class="form-control" name="CheckInDate" type="date" value="{{$_SESSION['Date'][0]??''}}" placeholder="Arrival Date">
                                        
                                    
                                </div>
                                {{-- <div class="check_availability-field">
                                    <label>Night</label>
                                    <select class="awe-select">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div> --}}
                                <div class="check_availability-field">
                                    <label>Depature</label>
                                    
                                        <input class="form-control" name="CheckOutDate" type="date" value="{{$_SESSION['Date'][1]??''}}"  placeholder="Departure Date">
                                        
                                    
                                </div>
                                {{$err??''}}
                                {{-- <h6 class="check_availability_title">ROOMS &amp; GUest</h6>
                                <div class="check_availability-field">
                                    <label>ROOMS</label>
                                    <select class="awe-select">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="check_availability_group">
                                    <span class="label-group">ROOMS 1</span>
                                    <div class="check_availability-field_group">
                                        <div class="check_availability-field">
                                            <label>Adult</label>
                                            <select class="awe-select">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                        <div class="check_availability-field">
                                            <label>Chirld</label>
                                            <select class="awe-select">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="check_availability_group">
                                    <span class="label-group">ROOMS 2</span>
                                    <div class="check_availability-field_group">
                                        <div class="check_availability-field">
                                            <label>Adult</label>
                                            <select class="awe-select">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                        <div class="check_availability-field">
                                            <label>Chirld</label>
                                            <select class="awe-select">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> --}}
                                <button type="submit" class="btn-room btn">Check Date</button>
                            </div></form>
                            
                        </div>
                        <div class="reservation-room-selected ">
                            <!-- HEADING -->
                            <h2 class="reservation-heading">Select Rooms</h2>
                            <!-- END / HEADING -->
                            {{-- <div class="content-room ">
                                <div class="room">ROOM 1 <span>2 Adult, 1 Child</span></div>
                                <div class="room1">LUXURY ROOM <span>$500.00</span></div>
                                <a href="#" title="">Change Room</a>
                            </div> --}}
                           <?php 
                           if (isset($_SESSION['room'])) {
                            $total=0;
                            for ($i=0; $i < sizeof($_SESSION['room']); $i++) { 
                                $total+=$_SESSION['room'][$i][4];
                                echo '
                                <div class="content-room border-top">
                                <div class="room">'.$_SESSION['room'][$i][2].' </div>
                                <div class="room1">'.$_SESSION['room'][$i][1].' <span>$'.$_SESSION['room'][$i][4].'</span></div>
                                <a href="/unselectroom/'.$i.'" title="">Delete Room</a>
                            </div>
                                ';


                                // echo $_SESSION['room'][$i][0].'<br>';
                                // echo .'<br>';
                                // echo .'<br>';
                                // echo $_SESSION['room'][$i][3].'<br>';
                                // echo .'<br>';
                            }
                            echo '
                            <div class="total total-3">
                                TOTAL <span>$'.$total.'</span>
                            </div>
                            ';
                           }
                           ?>
                           <br>
                           @if (isset($_SESSION['Date'])&&isset($_SESSION['room'])&&!empty($_SESSION['room'])&&!empty($_SESSION['Date']))
                           <a href="/bill">
                                <div class="total total-3">
                                    Next Step ->
                                </div>
                            </a>
                           @else
                           <a href="#" onclick="return alert('Vui lòng chọn ngày và phòng')">
                            <div class="total total-3">
                                Next Step ->
                            </div>
                            </a>
                           @endif
                            
                            <!-- ITEM -->
                            
                            <!-- END / ITEM -->
                        </div>
                        <!-- END / WIDGET CHECK AVAILABILITY -->
                    </div>
                </div>
                <!--  END/SIDEBAR -->
                <!-- CONTENT -->
                
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="reservation_content">
                        <!-- RESERVATION ROOM -->
                        <div class="reservation-room">{{$errDate??''}}
                            <!-- ITEM -->
                            @foreach ($list as $item)
                            <form action="/selectroom" method="post">
                                <input type="hidden" name="IDRoom" value="{{$item->IDRoom}}">
                                <input type="hidden" name="Name" value="{{$item->Name}}">
                                <input type="hidden" name="RoomNumber" value="{{$item->RoomNumber}}">
                                <input type="hidden" name="Image" value="{{$item->Image}}">
                                <input type="hidden" name="PricePerNight" value="{{$item->PricePerNight}}">
                                <div class="reservation-room_item">
                                <h2 class="reservation-room_name"><a href="#">{{$item->Name}} / Room Number: {{$item->RoomNumber}}</a></h2>
                                <div class="reservation-room_img">
                                    <a href="#"><img src="/uploads/{{$item->Image}}" alt="#" class="img-responsive"></a>
                                </div>
                                <div class="reservation-room_text">
                                    <div class="reservation-room_desc">
                                        <p><strong>Extension(s):</strong> {{$item->Extensions}}</p>
                                        <ul>
                                            <li><strong>Type Bed:</strong> {{$item->TypeBed}}</li>
                                            <li><strong>Max Person(s):</strong> {{$item->MaxPerson}}</li>
                                            {{-- <li>Separate sitting area</li> --}}
                                        </ul>
                                    </div>
                                    <a href="/room/detail/{{$item->id}}" class="reservation-room_view-more">View More Infomation</a>
                                    <div class="clear"></div>
                                    <p class="reservation-room_price">
                                        <span class="reservation-room_amout">${{$item->PricePerNight}}</span> / days
                                    </p>
                                    
                                    
                                    
                                    
                                    
                                    <?php
                                    $count=0;
                                    for ($i=0; $i < sizeof($_SESSION['room']); $i++) { 
                                        if ($_SESSION['room'][$i][0]==$item->IDRoom) {
                                            echo '<a href="#" class="btn btn-room" style="background-color: red; color:aliceblue">SELECTED</a>';
                                        $count++;
                                        }
                                    }
                                    // if ($item->Status==0) {
                                    //     echo '<a href="#" class="btn btn-room" style="background-color: red; color:aliceblue">ĐÃ được đặt</a>';
                                    // }
                                    ?>
                                    @if ($count==0)
                                        @if (!isset($_SESSION['Date']))
                                        <a href="#" style="color: #8E7037; padding-left: 12px ">    <- Please choose the date</a>
                                        
                                        @else
                                            @if ($item->Status==0)
                                            <a href="#" class="btn btn-room" style="background-color: red; color:aliceblue">RESERVED</a>
                                            @else
                                                <input type="submit" class="btn btn-room" value="SELECT ROOM">
                                            @endif
                                            
                                        @endif
                                            
                                        
                                        </form>
                                    @endif
                                        
                                        {{-- <a href="/selectroom" class="btn btn-room">SELECT ROOM</a> --}}
                                    
                                    
                                </div>
                                
                            </div>
                            @endforeach
                            
                            <!-- END / ITEM -->
                            <!-- ITEM -->
                            {{-- <div class="reservation-room_item">
                                <h2 class="reservation-room_name"><a href="#">COUPLE room</a></h2>
                                <div class="reservation-room_img">
                                    <a href="#"><img src="/app/views/client/landing.engotheme.com/images/Reservation/COUPLE.jpg" alt="#" class="img-responsive"></a>
                                </div>
                                <div class="reservation-room_text">
                                    <div class="reservation-room_desc">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type ...</p>
                                        <ul>
                                            <li>1 King Bed</li>
                                            <li>Free Wi-Fi in all guest rooms</li>
                                            <li>Separate sitting area</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="reservation-room_view-more">View More Infomation</a>
                                    <div class="clear"></div>
                                    <p class="reservation-room_price">
                                        <span class="reservation-room_amout">$330</span> / days
                                    </p>
                                    <a href="#" class="btn btn-room">BOOK ROOM</a>
                                </div>
                                <div class="reservation-room_package">
                                    <a data-toggle="collapse" href="#reservation-room_package-2" class="reservation-room_package-more collapsed">Show more package</a>
                                    <div class="reservation-room_package-content collapse" id="reservation-room_package-2">
                                        <!-- ITEM PACKAGE -->
                                        <div class="reservation-package_item">
                                            <div class="reservation-package_img">
                                                <a href="#"><img src="/app/views/client/landing.engotheme.com/images/Reservation/COUPLE.jpg" alt="#" class="img-responsive"></a>
                                            </div>
                                            <div class="reservation-package_text">
                                                <h4><a href="#">package standar</a></h4>
                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                                <div class="reservation-package_book-price">
                                                    <p class="reservation-package_price">
                                                        <span class="amout">$330</span>
                                                    </p>
                                                    <a href="#" class="btn btn-room">Book package</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END / ITEM PACKAGE -->
                                        <!-- ITEM PACKAGE -->
                                        <div class="reservation-package_item">
                                            <div class="reservation-package_img">
                                                <a href="#"><img src="/app/views/client/landing.engotheme.com/images/Reservation/COUPLE.jpg" alt="#" class="img-responsive"></a>
                                            </div>
                                            <div class="reservation-package_text">
                                                <h4><a href="#">package standar</a></h4>
                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                                <div class="reservation-package_book-price">
                                                    <p class="reservation-package_price">
                                                        <span class="amout">$330</span>
                                                    </p>
                                                    <a href="#" class="btn btn-room">Book package</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END / ITEM PACKAGE -->
                                        <!-- ITEM PACKAGE -->
                                        <div class="reservation-package_item">
                                            <div class="reservation-package_img">
                                                <a href="#"><img src="/app/views/client/landing.engotheme.com/images/Reservation/COUPLE.jpg" alt="#" class="img-responsive"></a>
                                            </div>
                                            <div class="reservation-package_text">
                                                <h4><a href="#">package standar</a></h4>
                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                                <div class="reservation-package_book-price">
                                                    <p class="reservation-package_price">
                                                        <span class="amout">$330</span>
                                                    </p>
                                                    <a href="#" class="btn btn-room">Book package</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END / ITEM PACKAGE -->
                                    </div>
                                </div>
                            </div>
                            <!-- END / ITEM -->
                            <!-- ITEM -->
                            <div class="reservation-room_item  current-select">
                                <h2 class="reservation-room_name"><a href="#">STANDARD room</a></h2>
                                <div class="reservation-room_img">
                                    <a href="#"><img src="/app/views/client/landing.engotheme.com/images/Reservation/STANDARD.jpg" alt="#" class="img-responsive"></a>
                                </div>
                                <div class="reservation-room_text">
                                    <div class="reservation-room_desc">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type ...</p>
                                        <ul>
                                            <li>1 King Bed</li>
                                            <li>Free Wi-Fi in all guest rooms</li>
                                            <li>Separate sitting area</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="reservation-room_view-more">View More Infomation</a>
                                    <div class="clear"></div>
                                    <p class="reservation-room_price">
                                        <span class="reservation-room_amout">$330</span> / days
                                    </p>
                                    <a href="#" class="btn btn-room">BOOK ROOM</a>
                                </div>
                                <div class="reservation-room_package">
                                    <a data-toggle="collapse" href="#reservation-room_package-3" class="reservation-room_package-more collapsed">Show more package</a>
                                    <div class="reservation-room_package-content collapse" id="reservation-room_package-3">
                                        <!-- ITEM PACKAGE -->
                                        <div class="reservation-package_item">
                                            <div class="reservation-package_img">
                                                <a href="#"><img src="/app/views/client/landing.engotheme.com/images/Reservation/STANDARD.jpg" alt="#" class="img-responsive"></a>
                                            </div>
                                            <div class="reservation-package_text">
                                                <h4><a href="#">package standar</a></h4>
                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                                <div class="reservation-package_book-price">
                                                    <p class="reservation-package_price">
                                                        <span class="amout">$330</span>
                                                    </p>
                                                    <a href="#" class="btn btn-room">Book package</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END / ITEM PACKAGE -->
                                        <!-- ITEM PACKAGE -->
                                        <div class="reservation-package_item">
                                            <div class="reservation-package_img">
                                                <a href="#"><img src="/app/views/client/landing.engotheme.com/images/Reservation/STANDARD.jpg" alt="#" class="img-responsive"></a>
                                            </div>
                                            <div class="reservation-package_text">
                                                <h4><a href="#">package standar</a></h4>
                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                                <div class="reservation-package_book-price">
                                                    <p class="reservation-package_price">
                                                        <span class="amout">$330</span>
                                                    </p>
                                                    <a href="#" class="btn btn-room">Book package</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END / ITEM PACKAGE -->
                                        <!-- ITEM PACKAGE -->
                                        <div class="reservation-package_item">
                                            <div class="reservation-package_img">
                                                <a href="#"><img src="/app/views/client/landing.engotheme.com/images/Reservation/STANDARD.jpg" alt="#" class="img-responsive"></a>
                                            </div>
                                            <div class="reservation-package_text">
                                                <h4><a href="#">package standar</a></h4>
                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                                <div class="reservation-package_book-price">
                                                    <p class="reservation-package_price">
                                                        <span class="amout">$330</span>
                                                    </p>
                                                    <a href="#" class="btn btn-room">Book package</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END / ITEM PACKAGE -->
                                    </div>
                                </div>
                            </div>
                            <!-- END / ITEM -->
                            <!-- ITEM -->
                            <div class="reservation-room_item">
                                <h2 class="reservation-room_name"><a href="#">FAMILY room</a></h2>
                                <div class="reservation-room_img">
                                    <a href="#"><img src="/app/views/client/landing.engotheme.com/images/Reservation/family.jpg" alt="#" class="img-responsive"></a>
                                </div>
                                <div class="reservation-room_text">
                                    <div class="reservation-room_desc">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type ...</p>
                                        <ul>
                                            <li>1 King Bed</li>
                                            <li>Free Wi-Fi in all guest rooms</li>
                                            <li>Separate sitting area</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="reservation-room_view-more">View More Infomation</a>
                                    <div class="clear"></div>
                                    <p class="reservation-room_price">
                                        <span class="reservation-room_amout">$330</span> / days
                                    </p>
                                    <a href="#" class="btn btn-room">BOOK ROOM</a>
                                </div>
                                <div class="reservation-room_package">
                                    <a data-toggle="collapse" href="#reservation-room_package-4" class="reservation-room_package-more collapsed">Show more package</a>
                                    <div class="reservation-room_package-content collapse" id="reservation-room_package-4">
                                        <!-- ITEM PACKAGE -->
                                        <div class="reservation-package_item">
                                            <div class="reservation-package_img">
                                                <a href="#"><img src="/app/views/client/landing.engotheme.com/images/Reservation/family.jpg" alt="#" class="img-responsive"></a>
                                            </div>
                                            <div class="reservation-package_text">
                                                <h4><a href="#">package standar</a></h4>
                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                                <div class="reservation-package_book-price">
                                                    <p class="reservation-package_price">
                                                        <span class="amout">$330</span>
                                                    </p>
                                                    <a href="#" class="btn btn-room">Book package</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END / ITEM PACKAGE -->
                                        <!-- ITEM PACKAGE -->
                                        <div class="reservation-package_item current-select">
                                            <div class="reservation-package_img">
                                                <a href="#"><img src="/app/views/client/landing.engotheme.com/images/Reservation/family.jpg" alt="#" class="img-responsive"></a>
                                            </div>
                                            <div class="reservation-package_text">
                                                <h4><a href="#">package standar</a></h4>
                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                                <div class="reservation-package_book-price">
                                                    <p class="reservation-package_price">
                                                        <span class="amout">$330</span>
                                                    </p>
                                                    <a href="#" class="btn btn-room">Book package</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END / ITEM PACKAGE -->
                                        <!-- ITEM PACKAGE -->
                                        <div class="reservation-package_item">
                                            <div class="reservation-package_img">
                                                <a href="#"><img src="/app/views/client/landing.engotheme.com/images/Reservation/family.jpg" alt="#" class="img-responsive"></a>
                                            </div>
                                            <div class="reservation-package_text">
                                                <h4><a href="#">package standar</a></h4>
                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                                <div class="reservation-package_book-price">
                                                    <p class="reservation-package_price">
                                                        <span class="amout">$330</span>
                                                    </p>
                                                    <a href="#" class="btn btn-room">Book package</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END / ITEM PACKAGE -->
                                    </div>
                                </div>
                            </div> --}}
                            <!-- END / ITEM -->
                        </div>
                        <!-- END / RESERVATION ROOM -->
                    </div>
                </div>
                <!-- END / CONTENT -->
            </div>
        </div>
    </div>
</section>