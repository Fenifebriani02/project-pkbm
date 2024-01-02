<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Fonts -->
    <link rel="shortcut icon" href="{{ url('public/assets/image/logo1.svg') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('public') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('public') }}/assets/plugins/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ url('public') }}/assets/css/style-depan.css">
</head>

<body class="login-screen">


    <div class="left">
        <div class="left-box">
            <h2>PKBM</h2>
            <p>Pusat Kegiatan Belajar Masyarakat</p>
        </div>
    </div>
    <div class="right">
        <form action="{{ url('auth/login') }}" method="POST" class="form-login">
            @csrf
            <div class="header">
                <h2>LOGIN</h2>
                <p>Silahkan login menggunakan akun anda</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="form-icons">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <input type="text" name="username" id="username"
                            class="form-control  @error('password') is-invalid  @enderror"
                            placeholder="Masukan username  ...">
                        <label for="email" class="label">Username</label>
                        @error('username')
                            <span class="text-invalid">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="form-icons">
                            <i class="fa fa-lock"></i>
                        </div>
                        <input type="password" name="password" id="password"
                            class="form-control  @error('password') is-invalid  @enderror"
                            placeholder="Masukan password">
                        <label for="password" class="label">Password</label>
                        @error('password')
                            <span class="text-invalid">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="d-flex align-items-center justify-content-end">
                        <button class="btn-signin">SIGN-IN</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ url('public') }}/assets/js/jquery-3.7.1.min.js"></script>
    <script src="{{ url('public') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('public') }}/assets/plugins/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>
</body>

</html>
