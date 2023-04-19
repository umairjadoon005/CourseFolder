<!DOCTYPE html>
<html lang="en">
<head>
@include('layout.partials.head')
</head>
@if(Route::is(['login','register']))
<body class="account-page">
@endif
@if(Route::is(['error-404','error-500']))
<body class="error-page">
@endif
@if(Route::is(['index']))
<body>
@endif
@if(Route::is(['activities']))
<body id="skin-color whilet-theme" class="inter">
@endif
@if(!Route::is(['activities']))
<body id="skin-color" class="inter">
@endif
@if(!Route::is(['login','register','error-404','error-500']))
@include('layout.partials.header')
@include('layout.partials.nav')
@endif
@yield('content')
@include('layout.partials.footer-scripts')
  </body>
</html>