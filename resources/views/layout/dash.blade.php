<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/template/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/template/dist/css/adminlte.min.css')}}">
  @stack('styles')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    {{-- Navbar --}}
     @include('partial.nav')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <span class="brand-text font-weight-light">Warranty Check</span>
    </a>

    <!-- Sidebar -->
    @include('partial.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('title')</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">@yield ('sub-title')</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div> <br>

        <div class="card-body">
          @yield('content')
          <div class="row">
            <div class="col-lg-4 col-8 ">
                <a href="/products">
                    <div class="small-box bg-info p-3">
                        <div class="inner">
                            <h4>Total Produk</h4>
                            <p style="font-size: 20px">{{ $productCount }}</p>
                        </div>
                        <div class="icon">
                            <i class="fa-sharp fa-solid fa-scroll"></i>
                        </div>
                    </div>
                </a>
            </div>


            <!-- ./col -->
            <div class="col-lg-4 col-12 ">
                <div class="small-box bg-success p-3">
                  <div class="inner">
                    <h4 style="font-family: 'Poppins', sans-serif;">Produk Aktif</h4>
                    <p style="font-size: 20px">{{ $activeProductCount }}</p>
                  </div>
                  <div class="icon">
                    <i class="fa-solid fa-file-circle-check"></i>
                  </div>
                </div>
              </div>

            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <div class="small-box bg-danger p-3">
                <div class="inner">
                  <h4 >Produk Expired</h4>
                  <p style="font-size: 20px">{{$expiredProductCount}}</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-file-circle-xmark"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
          </div>
        </div>
      </div>

    </section>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ ('/template/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ ('/template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ ('/template/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ ('/template/dist/js/demo.js') }}"></script>
<script src="https://kit.fontawesome.com/61bcac0926.js" crossorigin="anonymous"></script>
@stack('scripts')
</body>
</html>
