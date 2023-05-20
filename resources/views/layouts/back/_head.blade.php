<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>{{ isset($title)?$title:config('app.name') }}</title>

<!-- Bootstrap Core CSS -->
<link href="{{ asset('backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="{{ asset('backend/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

<!-- Multiselect CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

<link rel="stylesheet" href="{{ asset('css/style.css') }}" />

@stack('library-css')
<!-- Custom CSS -->
<link href="{{ asset('backend/dist/css/sb-admin-2.css') }}" rel="stylesheet">

<!-- Custom Fonts -->
<link href="{{ asset('backend/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

@stack('custom-css')
