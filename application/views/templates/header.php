<!DOCTYPE html>
<html dir="{dir}">
    <head>
        <meta charset="{charset}">
        <title>{title}</title>
        <!-- CSS Files -->
        <link href="{base_url}css/website.css" rel="stylesheet" type="text/css">
        <link href="{base_url}css/rrssb.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="keywords" content="{keywords}">
        <meta name="description" content="{description}">
        <link rel="shortcut icon" type="image/x-icon" href="{base_url}images/favicon.ico" />
        
        <!-- Style for direction according to language -->
        <style>
        .footerMenu nav ul li{
            float: {direction};
        }
        
        @media (min-width: 992px){
            .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9{
                float: {direction} !important;
            }
        }
        </style>
    </head>

    <body style="background: url({base_url}images/bg.jpg) top center no-repeat;">
        <!-- Logo -->
        <header class="logo container">
            <a href="{base_url_segment}"><img src="{base_url}images/logo{end}.png" alt=""></a>
        </header>

        <!-- Main Content Container -->
        <main class="container main">
        <!-- Start Of Main Content -->