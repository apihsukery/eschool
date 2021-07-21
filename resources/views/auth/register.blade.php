<?php

$roles = App\Role::all();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E-School | Registration Page</title>
@include('layout.partials.head')
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h1><b>E-School</b></h1>
        </div>
        <div class="card-body">
            
            @if(session()->get('success'))
                <div class="col-sm-12">
                    <div class="alert alert-success">
                    {{ session()->get('success') }}
                    </div>
                </div>
                <?php $new = App\User::orderBy('created_at', 'desc')->first(); ?> <!-- get latest user -->
                <h5>Login Details</h5>
                <p>ID : <?=$new->id?><br>Password : IC Number</p>
                <br>
                <a href="{{ route('register') }}" class="text-center">Register More</a><br>
            @else
            <p class="login-box-msg">Register a new membership</p>
                <form method="POST" action="{{ route('register') }}">
                @csrf
                    @error('role_id')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <select id="role_id" name="role_id" class="form-control" placeholder="Role">
                            <option value="">Choose Role</option>
                            <!-- <option value="1">Student</option>
                            <option value="2">Teacher</option> -->
                            @foreach ($roles as $role)
                                <option @if (old('role_id') == "$role->id") selected="selected" @endif value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-user-tag"></span>
                            </div>
                        </div>
                    </div>
                    @error('ic')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="text" id="ic" name="ic" class="form-control" value="{{ old('ic') }}" placeholder="IC Number" maxlength="12">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-id-card"></span>
                            </div>
                        </div>
                    </div>
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Full name" maxlength="255">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <span class="text-danger" style="display:none" id="email_error">Email already used</span>
                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" maxlength="255" wire:model="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button id="btnRegister" type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            @endif
            <a href="{{ route('login') }}" class="text-center">I already registered</a>
        </div>
    <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

</body>

@include('layout.partials.footer-script')

<script type="text/javascript">

$(document).ready(function(){

    // allow positive number only
    // $('#ic').keypress(function() {
    //     return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57;
    // });

    // // checking ic
    // $("#ic,#email").keyup(function (e) {
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     e.preventDefault();
    //     $.ajax({
    //         type: "POST",
    //         url: "{{ route('checkRecord') }}",
    //         data: {
    //                 ic: $('#ic').val(),
    //                 email: $('#email').val()
    //             },
    //         dataType: 'json',
    //         success: function (data) {           
    //             if(data.ic == "1" || data.email == "1")
    //             {
    //                 $("#btnRegister").prop("disabled",true);

    //                 if(data.ic == "1") 
    //                 {
    //                     $("#ic_error").show();
    //                 }
    //                 else{
    //                     $("#ic_error").hide();
    //                 }

    //                 if(data.email == "1")
    //                 {
    //                     $("#email_error").show();   
    //                 } 
    //                 else{
    //                     $("#email_error").hide();  
    //                 }
    //             }
    //             else{
    //                 $("#btnRegister").prop("disabled",false);
    //                 $("#ic_error").hide();
    //                 $("#email_error").hide();  
    //             }
    //         },
    //         error: function (data) {
    //             console.log(data);
    //         }
    //     });
    // });

    // $( "#btnRegister" ).click(function() {
    //     // if( $("#role_id").val() != 0 && $("#ic").val() != "" && $("#name").val() != "" && $("#email").val() != "" )
    //     // {
    //     //     // console.log("submit");
    //         $( "#user_register" ).submit();
    //     // }
    //     // else
    //     // {
    //     //     // console.log("not submit");
    //     //     alert("Please complete all field")
    //     // }
    // });

});

</script>


</html>
