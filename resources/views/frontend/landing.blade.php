<!DOCTYPE html>
<html lang="en">

<head>
    <title>Aplikasi Kegiatan IAD Kaur</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/owl-carousel/css/owl.carousel.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/owl-carousel/css/owl.theme.default.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/aos/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="shortcut icon" href="https://poltekbangplg.ac.id/wp-content/uploads/2020/06/favicon.ico"
        type="image/x-icon" />
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    @stack('style')
    <style>
        .contact-us .contact-us-bgimage {
            padding: 20px !important;
            border-radius: 15px;
        }

        .card.card-body {
            padding: 0;
        }

        .features-overview .content-header {
            padding: 0;
        }

        .navbar {
            padding: 18px 0;
        }

        .font-weight-semibold {
            padding-top: 50px;
        }

        .img-proporsional {
            float: center;
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .img-proporsional:hover,
        .img-proporsional:focus {
            transform: scale(1.1);
        }

        th,
        td {
            white-space: nowrap !important;
        }

        @media only screen and (max-width: 800px) {
            .card .card-body {
                padding: 0 0 43px 0;
            }

            .sika-map {
                margin-bottom: 30px;
            }

            .sika-map iframe {
                height: 320px;
            }

            .sika-description h1 {
                font-size: 25px;
            }

            .web-title {
                display: none;
            }

            .btn-contact-us {
                margin-left: 0 !important;
            }

            .close-icon {
                margin-right: 20px;
            }

            .kuesioner img {
                display: none;
            }

            .card-kuesioner {
                margin: 20px;
            }

            .detail-news-image {
                height: 250px !important;
            }
        }
    </style>
</head>

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
    <header id="header-section">
        <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
            <div class="container" data-aos="fade-down">
                <div class="navbar-brand-wrapper d-flex w-100">
                    <img class="icon-image d-none d-lg-block" src="{{ asset('iad.png') }}"
                        style="margin-top: -5px; width: 7%; height: 7%;" alt="">
                    
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="mdi mdi-menu navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-lg-center align-items-start ml-auto right">
                        <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
                            <div class="navbar-collapse-logo">
                                <img src="{{ asset('iad.png') }}" style="width: 40%;" alt="">
                            </div>
                            <button class="navbar-toggler close-button" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="close-icon toggle-icon mdi mdi-close navbar-toggler-icon pl-5"></span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::is('/')) active @endif"
                                href="{{ url('/') }}"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#jadwal"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::is('/')) active @endif"
                                href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#kegiatan">Kegiatan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('front-absensi') }}">Absensi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login') }}">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-4">
                    <h2>Aplikasi Kegiatan & Laporan</h2>
                    <h6 class="section-subtitle text-muted mb-4">
                        Ikatan Adhyaksa Dharmakarini
                    </h6>
                    <img id="img-fluid" class="h-auto mw-100"
                        src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-1.png"
                        alt="" />
                </div>
            </div>
            <br><br>
        </div>
    </div>
    <div id="jadwal"></div>
    <div class="content-wrapper">
        <div class="container">
            <section class="features-overview" id="features-section">
                <div class="content-header">
                    <h2>Kegiatan dan Event</h2>
                    <h6 class="section-subtitle text-muted mb-4">
                        Ikatan Adhyaksa Dharmakarini
                    </h6>
                </div>
                <div class="d-md-flex">
                    <div class="table-responsive">
                        <table class="table bg-white table-striped" style="width: 100%;">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Agenda</th>
                                    <th>Tanggal Acara</th>
                                    <th>Lokasi</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <?php $agenda = DB::table('agendas')->orderBy('id', 'DESC')->get(); ?>
                            <tbody>
                                @foreach ($agenda as $k => $item)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $item->kegiatan }}</td>
                                        <td>
                                            {{ $item->tanggal_mulai }}
                                            s/d {{ $item->tanggal_selesai }}
                                        </td>
                                        <td>{{ $item->tempat }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <iframe class="embed-responsive"
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15938.708954153537!2d104.6991992!3d-2.9089414!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5e411b86b9a1b4e9!2sPoliteknik%20Penerbangan%20Palembang!5e0!3m2!1sid!2sid!4v1613966893900!5m2!1sid!2sid"
        height="420" title="poltekbangplg" style="border:0" allowfullscreen></iframe>

    <div class="container">
        <footer class="border-top">
            <p class="text-center text-muted pt-4">Copyright © <?php echo date('Y'); ?> Ikatan Adhyaksa Dharmakarini <br>
                Developed by<a target="_blank" href="https://porkaone.com" class="px-1">Porkaone</a>All rights
                reserved.</p>
        </footer>
    </div>

    <script src="{{ asset('frontend/vendors/jquery/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('frontend/vendors/bootstrap/bootstrap.min.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="{{ asset('frontend/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
    {{-- <script src="{{ asset('frontend/vendors/aos/js/aos.js') }}"></script> --}}
    <script src="{{ asset('frontend/js/landingpage.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js "></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        $("#myTable").DataTable({
            "ordering": false,
        })
    </script>
    <script src="https://unpkg.com/axios@0.27.2/dist/axios.min.js"></script>
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function(reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>
</body>

</html>
