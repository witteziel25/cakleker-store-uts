<header>
    <div class="nav-header">
        <img src="{{ asset('Images/CAKLEKER-STORE.png') }}" alt="Cakleker Store" class="logo-img">
        <nav>
            @if(session('nama_pengguna'))
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('pengelolaan') }}">Manajemen</a>
                <a href="{{ route('profil') }}">Profil</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout-nav">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endif
        </nav>
    </div>
</header>
