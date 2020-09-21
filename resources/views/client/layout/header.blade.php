<header id="header" class="header" style='background-image: url("{{$data['section'][0]->image}}")'>
    <div class="header-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="text-container">
                        <h1 class="h1-large">{{$data['section'][0]->name}}</h1>
                        <p class="p-large">{{$data['section'][0]->description}}</p>
                        <a class="btn-outline-lg page-scroll" href="#recruitment">@lang('client.header.apply')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
