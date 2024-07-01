<section class="body-page page-v1">
    <div class="container">
        <div class="content">
            <h2 class="sky-h3">SIGNUP ACCOUNT</h2>
            <h5 class="p-v1">{{$err??''}}</h5>
            <form action="/signup/post" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="UserName" value="{{$data['UserName']??''}}" placeholder="User Name" >
                    <p >{{$checkData['UserName']??''}}</p>
                </div>
                <div class="form-group">
                    <input id="password-field" type="password" class="form-control" value="{{$data['PassWord']??''}}" name="PassWord" placeholder="Password" >
                    <span class="fa fa-fw fa-eye field-icon toggle-password " data-toggle="#password-field"></span>
                    <p >{{$checkData['PassWord']??''}}</p>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="FullName" value="{{$data['FullName']??''}}" placeholder="Full Name" >
                    <p >{{$checkData['FullName']??''}}</p>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="Email" value="{{$data['Email']??''}}" placeholder="Email" >
                    <p >{{$checkData['Email']??''}}</p>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="PhoneNumber" value="{{$data['PhoneNumber']??''}}" placeholder="Phone Number" >
                    <p >{{$checkData['PhoneNumber']??''}}</p>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="Address" value="{{$data['Address']??''}}" placeholder="Address" >
                    <p >{{$checkData['Address']??''}}</p>
                </div>
                <input type="hidden" name="Roles" value="1">
                <button type="submit" class="btn btn-default">LOGIN</button>
            </form>
            
            <p><a href="/login" style="color: aliceblue">Login</a> &nbsp;- &nbsp; Forgot Password</p>
        </div>
    </div>
</section>