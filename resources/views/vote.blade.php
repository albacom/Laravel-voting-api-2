<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="">
    <!--{{ $options }}-->
    <div id="app">
        <host :host-data="{{ json_encode($options) }}"></host>
        <Vote />
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    
</body>
</html>

