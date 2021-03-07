<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.rtlcss.com/bootstrap/v4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-40ix5a3dj6/qaC7tfz0Yr+p9fqWLzzAXiwxVLt9dw7UjQzGYw6rWRhFAnRapuQyK" crossorigin="anonymous"></script>
    <title>Itbeep Challenge </title>
    <style>
        body{
            background: #f0f2f5 !important;
        }
        .form
        {
            box-shadow: 1px 1px 10px #ddd
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        div label input {
            margin-right:100px;
        }


        #ck-button {

            background-color:#660d84;
            border-radius:4px;
            border:1px solid #660d84;
            overflow:auto;
            color:#fff;

        }

        #ck-button label {
            float:left;
            width:4.0em;
        }

        #ck-button label span {
            text-align:center;
            padding:3px 0px;
            display:block;
            border-radius:4px;
        }

        #ck-button label input {
            position:absolute;
            top:-20px;
        }

        #ck-button input:hover + span {
            cursor: pointer;
        }

        #ck-button input:hover + span + #ck-button {
            background-color: #806888;
        }

        #ck-button input:checked + span {
            background-color:#911;
            color:#fff;
        }

        #ck-button input:checked:hover + span +  #ck-button {
            background-color:#c11;
            color:#fff;
        }
    </style>

</head>
<body>
<div class="container col-lg-4 mt-5">

    <!-- Modal 1 -->
    <div class="modal fade" id="servicesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" dir="rtl">
                    <h5 class="modal-title" id="exampleModalLabel">إختر عرض من العروض التالية</h5>
                </div>
                <div class="modal-body w-100">
                    <form>
                        @csrf
                        <div class="d-flex">
                            @foreach($services as $service)
                            <div class="form-group col-lg-4">
                                <div id="ck-button">
                                    <label class="w-100 h-100 m-0">
                                        <input type="checkbox" id="check_service" name="check_service" class="mr-5 p-0" value="{{$service->service_id}}" style='display:none;'><span>{{$service->service_name}}</span>
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </form>
                    <button type="button" id="next-1" class="btn btn-primary w-100" style="background: #660d84" data-toggle="modal" data-target="#interestsModal" data-whatever="@mdo" data-dismiss="modal" >التالي</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2 -->
    <div class="modal fade" id="interestsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" dir="rtl">
                    <h5 class="modal-title" id="exampleModalLabel">متى ترغب برفع الطلب</h5>
                </div>
                <div class="modal-body w-100">
                    <form>
                        @csrf
                        <div class="d-flex">
                            @foreach($interests as $interest)
                                <div class="form-group col-lg-4">
                                    <div id="ck-button">
                                        <label class="w-100 h-100 m-0">
                                            <input type="radio" id="check_interest" name="check_interest" class="mr-5 p-0" value="{{$interest->interest_id}}" style='display:none;'><span>{{$interest->interested_period}}</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </form>
                    <button type="button" id="next-2" class="btn btn-primary w-100" style="background: #660d84" data-toggle="modal" data-target="#confirmModal" data-whatever="@mdo" data-dismiss="modal" >التالي</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 3 -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Thank you!</h5>
                </div>
                <div class="modal-body w-100">
                    <form  dir="ltr" class="p-4">
                        @csrf
                        <div class="d-flex mb-4">
                            We have sent you an email confirmation.
                            Please check your email.
                        </div>
                    </form>
                    <button type="button" class="btn btn-secondary w-100" id="closeModal" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>

    <form class="form bg-white p-4 mx-auto"  dir="rtl" id="userinfo" name="registration">
        @csrf
        <div class="d-flex justify-content-center align-items-center">
            <img src="Assests/Images/logo_dark.png" alt=""/>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">الأسم</label>
            <input type="text" name="name"  class="form-control name  @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" required>
        </div>
            @error('name')
            <div class="alert alert-danger" dir="ltr">{{ $message }}</div>
            @enderror
        <div class="mb-3">
            <label for="mobile" class="form-label">الجوال</label>
            <input type="text" name="mobile" class="form-control mobile @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" id="mobile" required>
        </div>
            @error('mobile')
            <div class="alert alert-danger" dir="ltr">{{ $message }}</div>
            @enderror

        <div class="mb-3">
            <label for="email" class="form-label" >البريد الألكتروني</label>
            <input type="email"  name="email" class="form-control email  @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" aria-describedby="emailHelp" required>
        </div>
            @error('email')
            <div class="alert alert-danger" dir="ltr">{{ $message }}</div>
            @enderror

        <button   type="submit" class="btn btn-primary w-100" id="submit" style="background: #660d84" data-toggle="modal" data-target="#servicesModal" data-whatever="@mdo">إرسال</button>

    </form>
    {{csrf_field()}}
</div>

<script >
    $(document).ready(function(){
        let name = document.querySelector(".name");
        let email = document.querySelector(".email");
        let mobile = document.querySelector(".mobile");
        let button = document.getElementById("submit");

        button.disabled = true;
        name.addEventListener("change", stateHandle);
        email.addEventListener("change", stateHandle);
        mobile.addEventListener("change", stateHandle);
        function stateHandle() {
            if (name.value === "" || email.value === "" || mobile.value === "") {
                button.disabled = true;
            } else {
                button.disabled = false;
            }
        }


        $('#userinfo').submit(function(event){
            event.preventDefault();

            let user_name     = $('#name').val();
            let user_mobile   = $('#mobile').val();
            let user_email    = $('#email').val();
            let services_user = "";
            let interest_user;
            if(user_email != '' && user_name != '' && user_mobile != '' ) {

                sessionStorage.setItem("name", user_name);
                sessionStorage.setItem("mobile", user_mobile);
                sessionStorage.setItem("email", user_email);
                $.post('store',{
                    'name'  : user_name,
                    'mobile': user_mobile,
                    'email' : user_email,
                    '_token':$('input[name=_token]').val()},function(data){
                    sessionStorage.setItem("user_id", data)
                    console.log(data);
                });

            }

            $('#next-1').click(function(){
                let services = [];
                $.each($("input[name='check_service']:checked"), function(){
                    services.push($(this).val());
                });
                services_user = services;
                $.post('update',{
                    'services_id'  : services_user,
                    'user_id'        : sessionStorage.getItem("user_id"),
                    '_token'         : $('input[name=_token]').val()},function(data){
                    console.log(data);});
            });

            $('#next-2').click(function(){
                interest_user = $("input[name='check_interest']:checked").val();

                $.post('updateInterest',{
                    'interest_id'    : interest_user,
                    'user_id'        : sessionStorage.getItem("user_id"),
                    '_token'         : $('input[name=_token]').val()},function(data){
                    console.log(data);});

                $.get('sendemail',{
                    '_token'         : $('input[name=_token]').val()},function(data){
                    console.log(data);});
            });
        });
    });
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
