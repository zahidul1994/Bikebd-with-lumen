<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- <meta name="csrf-token" content="{{csrf_token()}}"> --}}
  <title></title> <!-- vue title-->
   {{-- for server http request --}}
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">  

   <link rel="shortcut icon" href=" {{@asset('images/Fontimage/bike-logo.jpg')}}" type="image/x-icon">
  <!-- Font Awesome Icons -->
   {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}
   <link rel="stylesheet" href="{{@asset('css/app.css')}}" />
  <!-- IonIcons -->
  
  <!-- Google Font: Source Sans Pro -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">
      <!-- /.card -->
      <superadmin-main></superadmin-main>
            </div>
            <!-- /.card -->
      <script src="{{@asset('js/app.js')}}"></script>
 
</body>
</html>