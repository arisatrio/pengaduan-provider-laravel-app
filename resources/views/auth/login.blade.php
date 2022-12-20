<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('dist/css/login.css') }}">
</head>
<body>
    <div class="container-fluid">
        <div class="row mt-2">
           <div class="col-md-12">
            {{-- <img src="{{ asset('img/fisianflag .png') }}" alt="Frissian Flag" class="logo_fsflag ms-4" srcset=""> --}}
            <h1 class="mb-5" style="color: rgb(108 0 167);">@MEDIAStores</h1>
           </div>
        </div>
        <div class="row justify-content-around align-items-center">
            <div class="col-md-5 mt-2">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ asset('img/slider/1.jpg') }}" class="d-block w-100 rounded-3" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('img/slider/2.jpg') }}" class="d-block w-100 rounded-3" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('img/slider/3.jpg') }}" class="d-block w-100 rounded-3" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            <div class="col-md-4 mt-2">
               <div class="card shadow-lg mx-3">
                    {{-- <img src="{{ asset('img/ors_kievit.png') }}" alt="Logo Kievit" class="logo-kievit d-block mx-auto pt-5"> --}}
                    <div class="card-body">
                      <div class="row mt-5">
                          <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <span class="text-center mb-2">
                                <h2>
                                    LOGIN
                                </h2>
                            </span>
                            <div class="col-6 d-block mx-auto">
                                <input type="text" class="form-control" placeholder="Username" name="email">
                            </div>
                            <div class="col-6 d-block mx-auto mt-3">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                           <div class="col-6 d-block mx-auto mt-3 pb-5">
                            <button type="submit" class="btn btn-danger" style="background-color: rgb(108 0 167);"> LOGIN</button>
                           </div>
                        </form>
                      </div>
                    </div>
               </div>
            </div>
        </div>

            <div class="row justify-content-end mt-5">
                <img src="{{ asset('img/footer.png') }}" class="footer-img">
            </div>
            <div class="row" style="background-color: rgb(108 0 167);">
                <p class="text-center text-light my-auto py-2">© Copyright 2022</p>
            </div>
    </div>
</body>
</html>