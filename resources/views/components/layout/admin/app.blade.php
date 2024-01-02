<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Kegiatan Belajar Masyarakat</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="shortcut icon" href="{{ url('public/assets/image/logo1.svg') }}">
    <link rel="stylesheet" href="{{ url('public') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('public') }}/assets/plugins/datatables/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ url('public') }}/assets/plugins/datatables/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ url('public') }}/assets/plugins/datetimepicker/build/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="{{ url('public') }}/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.3.67/css/materialdesignicons.min.css">
</head>

@php
    $auth = Auth::guard('admin')->user();
@endphp

<body class="main-screen">
    <aside class="sidebar">
        <div class="sidebar-header">
            <a href="#" class="logo"><img src="{{ url('public/assets/image/logo2.svg') }}" height="50"
                    alt="logo"></a>
        </div>
        <div class="sidebar-user">
            <div class="user-image">
                <i class="mdi mdi-account-circle"></i>
            </div>
            <div class="user-captions">
                <span class="name">{{ $auth->nama }}</span>
                <span class="username">Admin sistem</span>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <x-layout.admin.menu-btn url="admin/dashboard" icon="mdi-view-dashboard" title="Dashboard" />
            <x-layout.admin.menu-btn url="admin/telusuri" icon="mdi mdi-magnify" title="Telusuri" />
            <x-layout.admin.menu-btn url="admin/guru" icon="mdi-account" title="Data Guru" />
            <x-layout.admin.menu-btn url="admin/kelas" icon="mdi-home" title="Data Kelas" />
            <x-layout.admin.menu-btn url="admin/kuis" icon="mdi mdi-comment-question-outline" title="Data Kuis" />
            <x-layout.admin.menu-btn url="admin/tugas" icon="
            mdi mdi-comment-text-outline"
                title="Data Tugas" />
            <x-layout.admin.menu-btn url="admin/ujian" icon="mdi mdi-comment-processing-outline" title="Data Ujian" />
            

        </ul>
    </aside>
    <section class="content-container">
        <!-- Navbar -->
        <header class="navbars">
            <button class="btn-toggle-navbar">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="user-dropdown dropdown">
                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $auth->nama }}
                </button>
                <div class="dropdown-menu">
                    <ul>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li class="divider"></li>
                        <li><a class="dropdown-item" href="{{ url('admin/logout') }}"
                                onclick="return confirm('Yakin ingin keluar dari sistem ini ?!')">Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- #End Navbar -->

        <!-- content-body -->
        <section class="content-body">
            @foreach (['success', 'danger'] as $type)
                @if (session()->has($type))
                    <div class="alert alert-{{ $type }}">
                        {{ session($type) }}
                    </div>
                @endif
            @endforeach
            {{ $slot }}
        </section>
        <!-- #END content-body -->
    </section>

    <script src="{{ url('public') }}/assets/js/jquery-3.7.1.min.js"></script>
    <script src="{{ url('public') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('public') }}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('public') }}/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="{{ url('public') }}/assets/plugins/datatables/dataTables.bootstrap5.min.js"></script>
    <script src="{{ url('public') }}/assets/plugins/datatables/responsive.bootstrap5.min.js"></script>
    <script src="{{ url('public') }}/assets/plugins/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
    <script src="{{ url('public') }}/assets/js/app.js"></script>
    <script src="{{ url('public') }}/assets/js/datetime.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(() => {
                $('.alert').hide('slow')
            }, 2000);
        })
    </script>
</body>

</html>
