<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="<?php echo base_url('/dashboard/lib/font-awesome/css/font-awesome.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        html{
            height: 100%;
        }
        body.main{
            font-family: 'Nunito', sans-serif !important;
            height: 100%;
            background-color: white;
        }

        .form-control{
            border-radius: .1rem;
            outline: initial!important;
            box-shadow: none!important;
            padding: .7rem .75rem .65rem;
            line-height: 1.5;
            border: 1px solid #d7d7d7;
            background: #fff;
            color: #212121;
        }
        .form-control:focus {
            border-color: black;
        }
        .form-custom-label{
            display: block;
            position: relative;
        }
        .form-custom-label>span{
            position: absolute;
            cursor: text;
            font-size: 13px;
            color: #6e6e6e;
            line-height: 1;
            padding: 0 1px;
            top: -5px;
            left: 10px;
            z-index: 2;
        }
        .form-custom-label>span::after{
            content: " ";
            display: block;
            position: absolute;
            background: #fff;
            height: 10px;
            top: 3px;
            left: -.2em;
            right: -.2em;
            z-index: -1;
        }
        .card{
            border: none;
            -webkit-box-shadow: 0px 0px 15px -4px rgba(0,0,0,0.2);
            -moz-box-shadow: 0px 0px 15px -4px rgba(0,0,0,0.2);
            box-shadow: 0px 0px 15px -4px rgba(0,0,0,0.2);
        }
        .logo{
            color: #72B8E9;
            font-family: 'Kaushan Script', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        }

        .btn-primary {
            background-color: #72B8E9;
            border-color: #72B8E9;
        }

        .btn-primary:active, .btn-primary:focus, .btn-primary:hover {
            background-color: #72B8E9 !important;
            border-color: #72B8E9 !important;
            color: white;
        }

        .btn-primary:active, .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem #72B8E9 !important;
        }

        a:hover{
            text-decoration: none;
        }
    </style>

    <title>Login Page</title>
</head>
<body class="main">
<?php 
    $session = session();
    $login = $session->getFlashdata('login');
    $username = $session->getFlashdata('email');
    $password = $session->getFlashdata('password');
?>
<!-- Main Section -->
<section style="height: 100% !important;">
    <div class="container" style="height: 100% !important;">
        <div class="h-100 row">
            <div class="mx-auto my-auto col-12 col-md-6 col-lg-6">
                <div class="text-center mb-4 logo">
                    <a href="<?php echo base_url('/') ?>"><h2><b>Anis Laundry</b></h2></a>
                </div>
                <div class="card">
                    <div class="card-body p-5">
                        <h5 class="font-weight-bold mb-1">Login</h5>
                        <p class="mb-4">Masukan username dan password anda!</p>
                        <?php if($email){ ?>
                            <div class="alert alert-danger w-100 mx-auto">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong><?php echo $email?></strong>
                            </div>
                        <?php } ?>
                        
                        <?php if($password){ ?>
                            <div class="alert alert-danger w-100 mx-auto">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong><?php echo $password?></strong>
                            </div>
                        <?php } ?>
                        
                        <?php if($login){ ?>
                            <div class="alert alert-success w-100 mx-auto">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong><?php echo $login?></strong>
                            </div>
                        <?php } ?>

                        <form action="/auth/valid_login" method="POST" autocomplete="off">
                            <div class="position-relative mb-4">
                                <div class="form-group form-custom-label">
                                    <input type="email" name="email" id="email" class="form-control" name="email"required autocomplete="email" autofocus>
                                    <span>Email</span>
                                </div>
                            </div>
                            <div class="position-relative mb-4">
                                <div class="form-group form-custom-label">
                                    <input type="password" name="password" id="password" class="form-control" name="password" required autocomplete="current-password">
                                    <span>Password</span>
                                </div>
                            </div>
                            <p>Belum punya akun? <a href="<?php echo base_url('/register') ?>">Register</a></p>
                            <div class="position-relative mt-3">
                                <button type="submit" id="btn-custom" class="btn btn-primary px-5 py-2 btn-sm font-weight-bold text-uppercase">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>

</body>
</html>
