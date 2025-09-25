{{-- resources/views/partials/favicon.blade.php --}}
{{-- 
    This partial sets your favicon and app icons.
    Place your logo in /public/images/mylogo.png or change the path below.
--}}

<!-- Standard Favicon -->
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo.png') }}">

<!-- High Resolution for Apple Devices -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/logo.png') }}">

<!-- Shortcut Icon (fallback for older browsers) -->
<link rel="shortcut icon" href="{{ asset('images/logo.png') }}">

<!-- Optional: theme color for mobile browsers -->
<meta name="theme-color" content="#ffffff">
