<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @if (Route::has('index'))
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'activeheader' : ''}}" href="{{ route('index') }}">{{ trans('menu.main.home') }}</a>
                    </li>
                @endif
                @if (Route::has('services'))
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('services') ? 'activeheader' : ''}}" href="{{ route('services') }}">{{ trans('menu.main.services') }}</a>
                    </li>
                @endif
                @if (Route::has('blog'))
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('blog') ? 'activeheader' : ''}}" href="{{ route('blog') }}">{{ trans('menu.main.blog') }}</a>
                    </li>
                @endif
                @if (Route::has('portfolio'))
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('portfolio') ? 'activeheader' : ''}}" href="{{ route('portfolio') }}">{{ trans('menu.main.portfolio') }}</a>
                    </li>
                @endif
                @if (Route::has('contact'))
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('contact') ? 'activeheader' : ''}}" href="{{ route('contact') }}">{{ trans('menu.main.contact') }}</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</div>