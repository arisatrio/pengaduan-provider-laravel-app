<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Layanan Pengaduan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">

    <style>
        body {
            max-width: 425px;
            margin: auto !important;
        }
        
        #page {
            border-radius: 15px;
            border: 0px;
            box-shadow: 0 4px 10px 0 rgb(0 0 0 / 10%) !important;
        }

        #footer-bar {
            left:50%;
            margin-left:-210px; /*negative half the width */
            width: 421px;
        }

        .bg-inap {
            background: linear-gradient(0deg, rgb(158, 12, 237) 24%, rgb(225, 135, 255) 100%);
        }
        
        i {
            color: #bdbebf;
        }

        .active {
            color: rgba(158,12,237,1);
        }

        .bg-active {
            background-color: rgba(158,12,237,1);
            color: white;
        }
    </style>
</head>
<body class="theme-light" data-highlight="blue2">

    <div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
    <div id="page">
        <div class="page-content" style="min-height:50vh!important">

            <div class="page-title page-title-small">
                <!-- <img class="img-fluid" src="img/inap-logo-white.png" alt="inap-logo" style="width: 30px; height: 50px;"> -->
                <span class="text-white" style="font-size: 11px;">Jl. Merdeka Barat No. 123, Kelurahan Margadadi, Indramayu 45212</span> <br>
                <span class="text-white" style="font-size: 11px;">Telp. 08181818181</span>
                <h2>
                    <a href="#" data-back-button>Layanan Pengaduan @Mediastore</a>
                </h2>    
            </div>
            
            <div class="card header-card shape-rounded" data-card-height="225px">
                <div class="card-overlay bg-inap opacity-95"></div>
                <div class="card-overlay dark-mode-tint"></div>
                <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
            </div>


            <!-- Content -->
            <div class="card card-style mt-5 py-4">
                <div class="content mt-2 mb-0">
                    <div class="row mb-0">
            
                        <div class="col-12">
                            <a href="#" style="color: #6c6c6c !important;">
                                <h2>Cek Status</h2>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card card-style" style="height: 100%;">
                <div class="content mb-0 p-2" style="height: 100%;">
                    <div class="row mb-0">
                        <div class="col">

                            <div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <td>{{ $pengaduan->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>No. Handphone</th>
                                            <td>{{ $pengaduan->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                <span class="badge badge-warning">{{ $pengaduan->status }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Kategori</th>
                                            <td>
                                                <span class="badge badge-info">{{ $pengaduan->kategori->name }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Isi</th>
                                            <td>
                                                <p>
                                                    {{ $pengaduan->deskripsi }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal</th>
                                            <td>{{ $pengaduan->created_at->format('d F Y') }}</td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                        <button class="btn btn-block text-left" type="button" data-toggle="cosllapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            Umpan Balik
                                        </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            @if ($pengaduan->replies)
                                                @foreach ($pengaduan->replies as $reply)
                                                    <div>
                                                        <span><i style="color: rgb(121, 121, 121);">{{ $reply->reply }}</i></span> <br>
                                                        <span><b> - {{ $reply->replyBy->name }} -</b></span> <br>
                                                        — {{ $reply->created_at->formatLocalized('%A, %d %B %Y') }} - {{ $reply->created_at->diffForHumans() }}
                                                    </div>
                                                    <hr>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div id="footer-bar" class="footer-bar-5">
                <a href="{{ url('/') }}">
                    <i class="fas fa-sticky-note active"></i>
                    <span>Cek Status</span>
                </a>
            
                <a href="{{ route('tambah-pengaduan.create') }}">
                    <i class="fas fa-plus" style="color: white; background-color: rgba(158,12,237,1); padding: 15px; border-radius: 25px;"></i>
                    <span></span>
                </a>
            
                <a href="{{ route('kontak-kami') }}">
                    <i class="fas fa-phone"></i>
                    <span>Kontak</span>
                </a>
            </div>

        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->
    <script src="js/custom.js"></script>
</body>
</html>