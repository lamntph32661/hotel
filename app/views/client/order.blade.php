<section class="banner-tems text-center">
    <div class="container">
        <div class="banner-content">
            <h2>RESERVATION</h2>
            <p>Lorem Ipsum is simply dummy text of the printing</p>
        </div>
    </div>
</section>
<!-- RESERVATION -->
<section class="section-reservation-page ">
    <div class="container">
        <div class="reservation-page">
            <!-- STEP -->
            <div class="reservation_step">
                <ul>
                    <li><a href="#"><span>1.</span>  Choose Date</a></li>
                    <li><a href="#"><span>2.</span> Choose Room</a></li>
                    <li><a href="#"><span>3.</span> Make a Reservation</a></li>
                    <li class="active"><a href="#"><span>4.</span> Confirmation</a></li>
                </ul>
            </div>
            <!-- END / STEP -->
            <div class="row">
                <!-- SIDEBAR -->
                <div class="col-md-4 col-lg-3">
                    <div class="reservation-sidebar">
                        <!-- RESERVATION DATE -->
                        <div class="reservation-date">
                            <!-- HEADING -->
                            <h2 class="reservation-heading">Dates</h2>
                            <!-- END / HEADING -->
                            <ul>
                                <li>
                                    <span>Check-In</span>
                                    <span>{{$_SESSION['Date'][0]}}</span>
                                </li>
                                <li>
                                    <span>Check-Out</span>
                                    <span>{{$_SESSION['Date'][1]}}</span>
                                </li>
                                @php
                                    $date1= new DateTime($_SESSION['Date'][0]);
                                    $date2= new DateTime($_SESSION['Date'][1]);
                                @endphp
                                <li>
                                    <span>Total</span>
                                    <span>{{($date1->diff($date2)->days).' day(s)'}}</span>
                                </li>
                               
                            </ul>
                        </div>
                        <!-- END / RESERVATION DATE -->
                        <!-- ROOM SELECT -->
                        <div class="reservation-room-selected selected-4 ">
                            <!-- HEADING -->
                            <h2 class="reservation-heading">Select Rooms</h2>
                            <!-- END / HEADING -->
                            <!-- ITEM -->
                            <div class="reservation-room-seleted_item">
                                @php
                                    $total=0;
                                @endphp
                                @foreach ($_SESSION['room'] as $item)
                                    <h6>ROOM {{$item[2]}}</h6> 
                                <div class="reservation-room-seleted_name has-package">
                                    <h2><a href="#">{{$item[1]}}</a></h2>
                                </div>
                                @php
                                    
                                    $total+=($date1->diff($date2)->days)*$item[4];
                                @endphp
                                <div class="reservation-room-seleted_package">
                                    <h6>Space Price</h6>
                                    
                                    <ul>
                                        
                                        <li>
                                            <span>Price</span>
                                            <span>{{($date1->diff($date2)->days).' day(s) x '.$item[4].'$'}}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="reservation-room-seleted_total-room">
                                    TOTAL 
                                    <span class="reservation-amout">{{($date1->diff($date2)->days)*$item[4]}}</span>
                                </div>
                                @endforeach
                                
                            </div>
                            <!-- END / ITEM -->
                            <!-- ITEM -->
                            {{-- <div class="reservation-room-seleted_item">
                                <h6>ROOM 2</h6> <span class="reservation-option">2 Adult, 1 Child</span>
                                <div class="reservation-room-seleted_name has-package">
                                    <h2><a href="#">COUPLE ROOM</a></h2>
                                </div>
                                <div class="reservation-room-seleted_package">
                                    <h6>Space Price</h6>
                                    <ul>
                                        <li>
                                            <span>3 June 2015</span>
                                            <span>$250.00</span>
                                        </li>
                                        <li>
                                            <span>6 June 2015</span>
                                            <span>$320.00</span>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <span>Service</span>
                                            <span>Free</span>
                                        </li>
                                        <li>
                                            <span>Tax</span>
                                            <span>$30.00</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="reservation-room-seleted_total-room">
                                    TOTAL Room 2
                                    <span class="reservation-amout">$500.00</span>
                                </div>
                            </div> --}}
                            <!-- END / ITEM -->
                            <!-- TOTAL -->
                            <div class="reservation-room-seleted_total ">
                                <label>TOTAL</label>
                                <span class="reservation-total">${{$total}}</span>
                            </div>
                            <!-- END / TOTAL -->
                        </div>
                        <!-- END / ROOM SELECT -->
                    </div>
                </div>
                <!-- END / SIDEBAR -->
                <!-- CONTENT -->
                <div class="col-md-8 col-lg-9">
                    <div class="reservation_content">
                        <form action="/book" method="post">
                        <div class="reservation-billing-detail">
                            {{-- <p class="reservation-login">Returning customer? <a href="#">Click here to login</a></p> --}}
                            <h4>BILLING DETAILS</h4>
                            {{-- <label>Country <sup> *</sup></label>
                            <select class="awe-select">
                                <option>United Kingdom (Uk)</option>
                                <option>Viet Nam</option>
                                <option>Thai Lan</option>
                                <option>China</option>
                            </select> --}}
                            {{-- <div class="row">
                                <div class="col-sm-6">
                                    <label>First Name<sup> *</sup></label>
                                    <input type="text" class="input-text">
                                </div>
                                <div class="col-sm-6">
                                    <label>Last Name<sup> *</sup></label>
                                    <input type="text" class="input-text">
                                </div>
                            </div> --}}
                            <label>Customer Name</label>
                            <input type="text" class="input-text" name="FullName" value="{{$_SESSION['FullName']}}">
                            <label>Phone Number<sup> *</sup></label>
                            <input type="text" class="input-text" name="PhoneNumber" value="{{$_SESSION['PhoneNumber']}}">
                            
                            <p class="reservation-code">
                                You have a coupon? <a href="#">Click here to enter your code</a>
                            </p>
                            <ul class="option-bank">
                                <li>
                                    <label class="label-radio">
                                        <input type="radio" class="input-radio" name="chose-bank"> Direct Bank Transfer
                                    </label>
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                </li>
                                <li>
                                    <label class="label-radio">
                                        <input type="radio" class="input-radio" name="chose-bank"> Cheque Payment
                                    </label>
                                </li>
                                <li>
                                    <label class="label-radio">
                                        <input type="radio" class="input-radio" name="chose-bank"> Credit Card
                                    </label>
                                    <a href="#" title=""><img src="images/Reservation/american.jpg" alt="#"></a>
                                    <a href="#" title=""><img src="images/Reservation/mastercard.jpg" alt="#"> </a>
                                    <a href="#" title=""><img src="images/Reservation/o.jpg" alt="#"></a>
                                    <a href="#" title=""><img src="images/Reservation/paypal.jpg" alt="#"></a>
                                    <a href="#" title=""><img src="images/Reservation/visa.jpg" alt="#"></a>
                                    <a href="#" title=""><img src="images/Reservation/2co.jpg" alt="#"></a>
                                </li>
                            </ul>
                            <button type="submit" class="btn btn-room btn4">PLACE ORDER</button>
                        </div></form>
                    </div>
                </div>
                <!-- END / CONTENT -->
            </div>
        </div>
    </div>
</section>