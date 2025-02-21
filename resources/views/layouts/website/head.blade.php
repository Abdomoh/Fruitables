<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>
        @if (App::getLocale() == 'ar')
            {{ $setting->name_project_ar ?? '' }} @else{{ $setting->name_project ?? '' }}
        @endif
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">


    <!-- Icon Font Stylesheet -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ URL::asset('website/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('website/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    @if (App::getLocale() == 'ar')
        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ URL::asset('website/css/ar/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ URL::asset('website/css/ar/style.css') }}" rel="stylesheet">
    @else
        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ URL::asset('website/css/en/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ URL::asset('website/css/en/style.css') }}" rel="stylesheet">
    @endif

</head>
