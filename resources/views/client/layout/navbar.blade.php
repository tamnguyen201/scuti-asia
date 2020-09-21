<nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top top-nav-collapse">

    <a class="navbar-brand logo-image color" href="{{route('home')}}"><img src="{{$data_share->logo}}" alt="alternative"></a>
    <a class="navbar-brand logo-image white" href="{{route('home')}}"><img src="{{$data_share->logo}}" alt="alternative"></a> 
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-awesome fas fa-bars"></span>
        <span class="navbar-toggler-awesome fas fa-times"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link page-scroll text-uppercase" href="{{route('home')}}"> @lang('client.nav.home')<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll text-uppercase" href="#benefits">@lang('client.nav.benefits')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll text-uppercase" href="#about">@lang('client.nav.about')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll text-uppercase" href="#contact">@lang('client.nav.contact')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll text-uppercase" href="#recruitment">@lang('client.nav.recruitment')</a>
            </li>
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle page-scroll text-uppercase" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="far fa-2x fa-user-circle"></i></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-uppercase" href="{{route('client.profile')}}"><span class="item-text">@lang('client.nav.profile')</span></a>
                    <div class="dropdown-items-divide-hr"></div>
                    <a class="dropdown-item text-uppercase" href="{{route('client.profile', 'job-applied')}}"><span class="item-text">@lang('client.nav.job_applied')</span></a>
                    <div class="dropdown-items-divide-hr"></div>
                    <a class="dropdown-item text-uppercase" href="{{route('client.profile', 'cvs')}}"><span class="item-text">@lang('client.nav.cvs')</span></a>
                    <div class="dropdown-items-divide-hr"></div>
                    <a class="dropdown-item text-uppercase" href="{{route('client.logout')}}"><span class="item-text">@lang('client.nav.logout')</span></a>
                </div>
            </li>
            @endauth
            @guest
            <li class="nav-item">
                <a class="nav-link page-scroll text-uppercase" href="{{route('client.login')}}">@lang('client.nav.login')</a>
            </li>
            @endguest
        </ul>
    </div>
</nav>
