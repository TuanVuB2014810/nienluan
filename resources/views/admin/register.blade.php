
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <div class="container">
            
            <form action="" method="POST" role="form">
                @csrf
                <legend>Form register</legend>
                <div class="form-group">
                    <label for="">Họ và tên </label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập vào email">
                    @error('name') <small>{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Nhập vào email">
                    @error('email') <small>{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="">Mật khẩu </label>
                    <input type="text" class="form-control" name="password" placeholder="Nhập vào mật khẩu">
                    @error('password') <small>{{ $message }}</small> @enderror
                </div>
                
                <div class="form-group">
                    <label for="">Nhập lại mật khẩu </label>
                    <input type="text" class="form-control" name="confirm_password" placeholder="Nhập vào mật khẩu">
                    @error('comfirm_password') <small>{{ $message }}</small> @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Đăng ký</button>
                <a href="{{ route('admin.login')}}">Đăng nhập</a>
            </form>
            
        </div>
        
    </body>
</html>
