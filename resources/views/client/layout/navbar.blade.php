<nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top top-nav-collapse">

    <a class="navbar-brand logo-image color" href="/"><img src="https://scontent.fhan3-1.fna.fbcdn.net/v/t31.0-0/p370x247/12622243_1526863174310176_5792404773815484011_o.png?_nc_cat=110&_nc_sid=85a577&_nc_ohc=Ytta26wUm-MAX95QAPU&_nc_ht=scontent.fhan3-1.fna&oh=514584ef7414730723e84bb9b802005f&oe=5F6947F6" alt="alternative"></a>
    <a class="navbar-brand logo-image white" href="/"><img src="https://www.scuti.asia/uploads/6/1/9/4/61941893/1447994901.png" alt="alternative"></a> 
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-awesome fas fa-bars"></span>
        <span class="navbar-toggler-awesome fas fa-times"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#header"> @lang('client.nav.home')<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#about">@lang('client.nav.about')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#recruitment">@lang('client.nav.recruitment')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#benefits">@lang('client.nav.benefits')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#contact">@lang('client.nav.contact')</a>
            </li>
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle page-scroll text-uppercase" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href=""><span class="item-text">@lang('client.nav.profile')</span></a>
                    <div class="dropdown-items-divide-hr"></div>
                    <a class="dropdown-item" href=""><span class="item-text">@lang('client.nav.logout')</span></a>
                </div>
            </li>
            @endauth
            @guest
            <li class="nav-item">
                <a class="nav-link page-scroll" href="{{route('login')}}">@lang('client.nav.login')</a>
            </li>
            @endguest
        </ul>
    </div>
</nav>
