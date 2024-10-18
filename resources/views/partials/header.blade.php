<header>
    <div>
        <nav>
            <a href="{{ route('home') }}">
                <h1 class="m-0 text-primary">
                    E-commerce
                </h1>
            </a>
            <div>
                <div>
                    <a href="{{ route('catalogo') }}">Catalogo</a>
                    <a href="{{ route('carrito.ver') }}">Carrito</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>
