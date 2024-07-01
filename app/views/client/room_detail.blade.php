<section class="banner-tems text-center">
    <div class="container">
        <div class="banner-content">
            <h2>{{$detail->Name}}</h2>
            
        </div>
    </div>
</section>
<!-- ROOM DETAIL -->
<section class="section-product-detail">
    <div class="container">
        <!-- DETAIL -->
        <div class="product-detail margin">
            <div class="row">
                <div class="col-lg-9">
                    <!-- LAGER IMGAE -->
                    <div class="wrapper">
                        <div class="gallery3">
                            
                            <div class="gallery__img-block  current">
                                
                                 <img src="/uploads/{{$detail->Image}}" alt="/uploads/{{$detail->Image}}" class="">
                            </div>
                            @foreach ($image as $item)
                                <div class="gallery__img-block  ">
                                <span class="">
                                 
                             </span>
                                    <img src="/uploads/{{$item->Image}}" alt="/uploads/{{$item->Image}}" class="" style="width: 870px; height: 496px; object-fit: cover">
                            </div>
                            @endforeach
                            
                            
                            
                            
                            
                            
                            <div class="gallery__controls">
                            </div>
                        </div>
                    </div>
                    <!-- END / LAGER IMGAE -->
                </div>
                <div class="col-lg-3">
                    <!-- FORM BOOK -->
                    <div class="product-detail_book">
                        <div class="product-detail_total">
                            <img src="/app/views/client/landing.engotheme.com/images/Product/icon.png" alt="#" class="icon-logo">
                            <h6>STARTING ROOM FROM</h6>
                            <p class="price">
                                <span class="amout">${{$detail->PricePerNight}}</span> /days
                            </p>
                        </div>
                        <div class="product-detail_form">
                            <form action="/selectroomdate" method="post">
                                <div class="sidebar">
                                <!-- WIDGET CHECK AVAILABILITY -->
                                <div class="widget widget_check_availability">
                                    <div class="check_availability">
                                        <div class="check_availability-field">
                                            <label>Arrive</label>
                                            <div class="input-group date">
                                                <input class="form-control wrap-box"  name="CheckInDate" value="{{$_SESSION['Date'][0]??''}}" type="date" placeholder="Arrival Date">
                                                
                                            </div>
                                        </div>
                                        <div class="check_availability-field">
                                            <label>Depature</label>
                                            <div  class="input-group date" >
                                                <input class="form-control wrap-box" name="CheckOutDate" value="{{$_SESSION['Date'][1]??''}}" type="date" placeholder="Departure Date">
                                                
                                            </div>
                                        </div>
                                        {{$errDate??''}}
                                    </div>
                                </div>
                                <!-- END / WIDGET CHECK AVAILABILITY -->
                            </div> 
                            
                            <input type="hidden" name="IDRoom" value="{{$oneroom[0]->id}}">
                            <input type="hidden" name="Name" value="{{$detail->Name}}">
                            <input type="hidden" name="RoomNumber" value="{{$oneroom[0]->RoomNumber}}">
                            <input type="hidden" name="Image" value="{{$detail->Image}}">
                            <input type="hidden" name="PricePerNight" value="{{$detail->PricePerNight}}">
                            @if (!isset($_SESSION['UserID']))
                                <a href="/login" onclick="return confirm('Vui lòng đăng nhập để sử dụng chức năng')">
                                    <button type="button" class="btn btn-room btn-product">Book Now</button>
                                </a>
                            @else
                                @if (empty($oneroom[0]->id))
                                    <a href="#" onclick="return alert('Đã hết phòng thuộc danh mục phòng này')">
                                        <button type="button" class="btn btn-room btn-product">Book Now</button>
                                    </a>
                                @else
                                    @if (!empty($_SESSION['room'])||isset($_SESSION['room']))
                                        <?php 
                                            $count1=0;
                                            for ($i=0; $i < sizeof($_SESSION['room']); $i++) { 
                                                if ($_SESSION['room'][$i][0]==$oneroom[0]->id) {
                                                    $count1++;
                                                }
                                            }
                                        ?>
                                        
                                        @if ($count1==0)
                                        <button type="submit" class="btn btn-room btn-product">Book Now</button>
                        
                        
                                        @else
                                        <a href="#" onclick="return alert('Đã có phòng trong danh sách chờ')">
                                            <button type="button" class="btn btn-room btn-product">Book Now</button>
                                        </a>
                                    @endif
                        
                                @endif
                    
                    
                    
                        
                    @endif
                    {{-- <button type="submit" class="btn btn-room btn-product">Book Now</button> --}}
                   
                    
                @endif
                            </form>
                        </div>
                    </div>
                    <!-- END / FORM BOOK -->
                </div>
            </div>
        </div>
        <!-- END / DETAIL -->
        <!-- TAB -->
        <div class="product-detail_tab">
            <div class="row">
                <div class="col-md-3">
                    <ul class="product-detail_tab-header">
                        
                        <li class="active"><a href="#amenities" data-toggle="tab">OVERVIEW</a></li>
                        
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="product-detail_tab-content tab-content">
                        <!-- OVERVIEW -->
                        
                        <!-- END / OVERVIEW -->
                        <!-- AMENITIES -->
                        <div class="tab-pane fade active in" id="amenities">
                            <div class="product-detail_amenities">
                                <p></p>
                                <div class="product-detail_overview">
                                
                                    <div class="row">
                                        <div class="col-xs-6 col-md-4">
                                            <h6>SPECIAL ROOM</h6>
                                            <ul>
                                                <li>Max: {{$detail->MaxPerson}} Person(s)</li>
                                                
                                                <li>Bed: {{$detail->TypeBed}}</li>
                                                <li>Extension(s): {{$detail->Extensions}}</li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END / AMENITIES -->
                        <!-- PACKAGE -->

                        <!-- END / CALENDAR -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END / TAB -->
        <!-- ANOTHER ACCOMMODATION -->
        <div class="product-detail">
            <h2 class="product-detail_title">Another accommodations</h2>
            <div class="product-detail_content">
                <div class="row">
                    <!-- ITEM -->
                    @foreach ($another as $item)
                        <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="product-detail_item">
                            <div class="img">
                                <a href="/room/detail/{{$item->id}}"><img src="/uploads/{{$item->Image}}" alt="#" style="width: 270px; height: 202px; object-fit: cover"></a>
                            </div>
                            <div class="text">
                                <h2><a href="/room/detail/{{$item->id}}">{{$item->Name}}</a></h2>
                                <ul>
                                    <li><i class="fa fa-child" aria-hidden="true"></i> Max: {{$item->MaxPerson}} Person(s)</li>
                                    <li><i class="fa fa-bed" aria-hidden="true"></i> Bed: {{$item->TypeBed}}</li>
                                    <li><i class="fa fa-eye" aria-hidden="true"></i> Extensions: {{$item->Extensions}}</li>
                                </ul>
                                <a href="/room/detail/{{$item->id}}" class="btn btn-room">VIEW DETAIL</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    <!-- END / ITEM -->
                    <!-- ITEM -->
                    {{-- <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="product-detail_item">
                            <div class="img">
                                <a href="#"><img src="/uploads/{{$detail->Image}}" alt="#"></a>
                            </div>
                            <div class="text">
                                <h2><a href="#">Family Room</a></h2>
                                <ul>
                                    <li><i class="fa fa-child" aria-hidden="true"></i> Max: 2 Person(s)</li>
                                    <li><i class="fa fa-bed" aria-hidden="true"></i> Bed: King-size or twin beds</li>
                                    <li><i class="fa fa-eye" aria-hidden="true"></i> View: Ocen</li>
                                </ul>
                                <a href="#" class="btn btn-room">VIEW DETAIL</a>
                            </div>
                        </div>
                    </div>
                    <!-- END / ITEM -->
                    <!-- ITEM -->
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="product-detail_item">
                            <div class="img">
                                <a href="#"><img src="/app/views/client/landing.engotheme.com/images/Product/Another-3.jpg" alt="#"></a>
                            </div>
                            <div class="text">
                                <h2><a href="#">standard Room</a></h2>
                                <ul>
                                    <li><i class="fa fa-child" aria-hidden="true"></i> Max: 2 Person(s)</li>
                                    <li><i class="fa fa-bed" aria-hidden="true"></i> Bed: King-size or twin beds</li>
                                    <li><i class="fa fa-eye" aria-hidden="true"></i> View: Ocen</li>
                                </ul>
                                <a href="#" class="btn btn-room">VIEW DETAIL</a>
                            </div>
                        </div>
                    </div>
                    <!-- END / ITEM -->
                    <!-- ITEM -->
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="product-detail_item">
                            <div class="img">
                                <a href="#"><img src="/app/views/client/landing.engotheme.com/images/Product/Another-4.jpg" alt="#"></a>
                            </div>
                            <div class="text">
                                <h2><a href="#">couple Room</a></h2>
                                <ul>
                                    <li><i class="fa fa-child" aria-hidden="true"></i> Max: 2 Person(s)</li>
                                    <li><i class="fa fa-bed" aria-hidden="true"></i> Bed: King-size or twin beds</li>
                                    <li><i class="fa fa-eye" aria-hidden="true"></i> View: Ocen</li>
                                </ul>
                                <a href="#" class="btn btn-room">VIEW DETAIL</a>
                            </div>
                        </div>
                    </div> --}}
                    <!-- END / ITEM -->
                </div>
            </div>
        </div>
        <!-- END / ANOTHER ACCOMMODATION -->
    </div>
</section>