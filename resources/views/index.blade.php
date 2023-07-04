@extends('layout.app')

@section('content')
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark" id="navbar" style="background-color: #670979">
        <div class="container">
            <a class="navbar-brand logo-image" href="index.html"><img src="gemdev/images/logo.png" alt="alternative" style="width:auto; height:50px"></a>

            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse ml" id="navbarsExampleDefault" style="margin-left: 1050px">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#features" style="color: #fff">Features</a>
                    </li>

                    @auth
                    <li class="nav-item ">

                      <a class="btn-outline-sm btn-solid" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();" style="color: #fff">
                         LOGOUT
                      </a>
                    </li>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST">
                         @csrf
                    </form>
                    @endauth
                    @guest
                     <li class="nav-item" >
                        <a class="btn-outline-sm btn-solid"  href="/login" style="color: #fff" >LOG IN</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <div class="header">
        <div class="ocean">
            <div class="wave"></div>
            <div class="wave"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h1 class="h1-large">Welcome To The Warranty Checking Website</h1>
                          <p class="p-large"> Mulai Check Garansi Barang Anda Dengan Mudah Dan Cepat </p>
                        @role('admin')
                            <a class="btn-solid-lg page-scroll" href="/products">Dasboard</a>
                        @endrole
                        @role('user')
                            <a class="btn-solid-lg page-scroll" href="#features">Check</a>
                        @endrole
                        @guest
                            <a class="btn-solid-lg page-scroll" href="#features">Check</a>
                        @endguest
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="gemdev/images/verified.png" alt="alternative">
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- Product Table -->
   <section id="features" class="features-area pt-250 pb-265" style="padding-top: 130px; margin-bottom: 170px">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 offset-lg-2 offset-xl-2">
                <div class="section-title text-center mb-70">
                    <H3 style="font-weight: bold;">Warranty Check</H3>
                    @guest
                    <p>Silakan Login/Register untuk memeriksa garansi produk Anda.</p>
                    @endguest
                    @auth
                    <p>Masukkan kode produk Anda di bawah ini untuk melihat masa garansi produk anda</p>
                    @endauth
                </div>
            </div>
        </div>
        <div class="row" style="padding-top: 50px">
            @auth
            <div class="col-12">
                <input type="search" id="query" class="form-control mb-3" placeholder="Masukkan kode product Anda" aria-label="Search" />
            </div>
            <div class="card-body" id="table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
            @endauth
         </div>
        </div>
    </section>


    <!-- Copyright -->
    <div class="copyright bg-gray" style="background-color: #670979; margin-top:120px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small" style="color: #fff">Copyright © <a class="no-line" href="#your-link" style="color: #fff">Adhib Dhimas</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small" style="color: #fff">Distributed by: <a class="no-line" href="https://themewagon.com/" style="color: #fff">GueGamn</a></p>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var resultsContainer = $('#results');
            var delayTimer;

            $('#query').on('input', function() {
                clearTimeout(delayTimer);

                delayTimer = setTimeout(function() {
                    var query = $('#query').val();

                    $.ajax({
                        url: "{{ route('product.search') }}",
                        method: 'GET',
                        data: {
                            query: query
                        },
                        success: function(response) {
                            var results = '';

                            resultsContainer.empty();

                            if (query !== '') {
                                if (response.length > 0) {
                                    $.each(response, function(index, product) {
                                        results += '<tr>';
                                        results += '<td>' + product.product_name + '</td>';
                                        results += '<td>' + product.product_code + '</td>';
                                        results += '<td>' + product.description + '</td>';
                                        results += '<td>' + product.warranty_start_date + '</td>';
                                        results += '<td>' + product.warranty_end_date + '</td>';
                                        results += '<td>' + product.warranty_status + '</td>';
                                        results += '</tr>';
                                    });
                                } else {
                                    results = '<tr><td colspan="6" style="text-align: center;">Produk yang Anda cari tidak dapat ditemukan</td></tr>';
                                }
                            }

                            resultsContainer.html(results);
                        }
                    });
                }, 700); // delay
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.navbar-toggler').on('click', function() {
                $('.navbar-collapse').toggleClass('show');
            });

            $('.nav-link').on('click', function() {
                $('.navbar-collapse').removeClass('show');
            });
        });
    </script>

    @endsection
