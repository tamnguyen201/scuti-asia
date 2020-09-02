<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- SEO Meta Tags -->
    <meta name="description" content="Juno business HTML landing page template helps you easily create efficient compact websites for businesses and present your services to the online audience.">
    <meta name="author" content="Inovatik">
	<!-- Favicon  -->
    <link rel="icon" href="https://www.scuti.asia/uploads/6/1/9/4/61941893/1447994901.png">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Scuti - @yield('title')</title>
    <base href="{{asset('')}}">
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="common/css/bs4.5.2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>    
    <link href="clientAsset/css/swiper.css" rel="stylesheet">
	<link href="clientAsset/css/magnific-popup.css" rel="stylesheet">
    <link href="clientAsset/css/styles.css" rel="stylesheet">
    
    @yield('css')
	
</head>
<body data-spy="scroll" data-target=".fixed-top">
    @include('client.layout.navbar')

    @yield('content')

    @include('sweetalert::alert')
    
    @include('client.layout.footer')

    <script src="common/js/jq3.5.1.min.js"></script>
    <script src="common/js/popper.min.js"></script>
    <script src="common/js/bs4.5.2.min.js"></script>
    <script src="common/js/jquery.easing.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })
        @if(Session('login_success'))
            swal({
                title: "<?php echo trans('custom.alert_messages.login_success.title') ?>",
                text: "<?php echo trans('custom.alert_messages.login_success.text') ?>",
                type: 'success',
                icon: 'success'
            })
        @endif
    </script>

    @yield('script')

</body> 
</html>
