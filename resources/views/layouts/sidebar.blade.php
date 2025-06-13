<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

        <div class="sidebar col-auto col-md-3 col-xl-2 px-sm-2 px-0  position-fixed h-100">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-black text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">E caffe</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{route('stos.index')}}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Pregled stolova</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('statistika.index') }}" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Statistika</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{ route('racuns.index') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Racuni</span> </a>
                            </li>
                            @if (Auth::user()->tip_korisnika_id == 1)
                                <li>
                                    <a href="{{route('users.index')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Upravljanje korisnicima</span> </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <div class="d-flex align-items-center text-black text-decoration-none gap-2"  data-bs-toggle="dropdown" aria-expanded="false">
                            <p class="mt-3 "><strong>{{Auth::user()->username }}</strong></p>
                            <button class="btn btn-danger">Logout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</body>
</html>

<style>

</style>