<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/login.css">
    <title>Đăng ký</title>
</head>
<body>
    <div class="form__signup">
        {!! Form::open(['url' => 'register/store']) !!}
            <div class="form__signup_title">
                <a href="{{ route('layouts.computech') }}">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                Đăng ký tài khoản
            </div>
            <div class="form__signup_input">
                {!! Form::text('name', '', ['placeholder' => 'Tên đăng nhập']) !!}
                @error('name')
                    <small class="form-text text-danger ">
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="form__signup_input">
                {!! Form::text('email', '', ['placeholder' => 'Email']) !!}
                @error('email')
                    <small class="form-text text-danger ">
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="form__signup_input">
                {!! Form::password('password', ['placeholder' => 'Mật khẩu']) !!}
                @error('password')
                    <small class="form-text text-danger ">
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="form__signup_input">
                {!! Form::password('confirm_password', ['placeholder' => 'Xác nhận mật khẩu']) !!}
                @error('confirm_password')
                    <small class="form-text text-danger ">
                        {{$message}}
                    </small>
                @enderror
            </div>

            <div class="form__signup_submit">
                {!! Form::submit('Đăng ký',['class' => 'btn btn-info btn-submit']) !!}
            </div>

            <div class="form__login_signup-now">
                <span>Bạn đã có tài khoản? <a href="{{route('login')}}">Đăng nhập ngay</a> </span>
            </div>
        {!! Form::close() !!}
    </div>
</body>
</html>