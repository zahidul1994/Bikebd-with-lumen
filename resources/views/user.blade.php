<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- <meta name="csrf-token" content="{{csrf_token()}}"> --}}
   {{-- for server http request --}}
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">  
   
    <link rel="shortcut icon" href=" {{@asset('storage/favicon.png')}}" type="image/x-icon">
    <link href="{{ @asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{@asset('FontStyle/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{@asset('FontStyle/css/slick.css')}}" />
    <link rel="stylesheet" href="{{@asset('FontStyle/css/com_ui_1.12.1_themes_base_jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{@asset('FontStyle/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{@asset('FontStyle/css/style.css')}}" />
 
  
  <!-- Google Font: Source Sans Pro -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">
      <!-- /.card -->
      <user-main></user-main>
            </div>
            <!-- /.card -->
          
            <script src="{{@asset('js/app.js')}}"></script> 
            <script src="{{@asset('FontStyle/js/bootstrap.min.js')}}"></script>
         
           <script src="{{@asset('FontStyle/js/slick.min.js')}}"></script>
           <script src="{{@asset('FontStyle/js/com_ui_1.12.1_jquery-ui.js')}}"></script>
           <script src="{{@asset('FontStyle/js/popper.min.js')}}"></script>
          
           <script src="{{@asset('FontStyle/js/custom.js')}}"></script>
         
 
</body>
</html>