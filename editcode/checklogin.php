<!DOCTYPE html>
<html>
<head>
    <title>Bài Tập Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" type="text/css" />

    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <div class="row">
            <?php
                $user = $_POST['user'];
                $pass = $_POST['password'];

                if($user == 'admin' && $pass == '123456'){
                    echo '<div class="alert alert-success"> Đăng nhập thành công</div>';

                }else{
                    echo '<div class="alert alert-danger">Đăng nhập thất bại</div>';
                }
            ?>
        </div>
    </div>

</body>

</html>