<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">My app</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Trang chủ<span class="sr-only">(current)</span></a>
            </li>
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">Đăng xuất</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Đăng nhập</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('getRegister')}}">Đăng kí</a>
            </li>
            @endauth


        </ul>
        <form class="form-inline my-2 my-lg-0">
            @auth
                <img src="../../public/uploads/{{auth()->user()->image}}" class="rounded-circle" style="width: 150px;"
                alt="Avatar" />
            @endauth
        </form>
    </div>
</nav>