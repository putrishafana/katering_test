<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Website Catering</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/merchant-order">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profil">Profil Saya</a>
                </li>
            </ul>
            <div class="col-1">
                <div class="">
                    <div class="font-medium text-base text-gray-800 light:text-gray-200">
                        {{ Auth::user()->name }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</nav>
