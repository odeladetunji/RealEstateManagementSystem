<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Real Estate Management System</title>
        <base href="http://127.0.0.1:8000/">

        <link href="/CSS/interface.css" rel="stylesheet" type="text/css">
        <!-- JQuery -->
        <script src="/js/jquery-3.2.1.min(first).js" type='text/JavaScript'></script>
        <!-- Styles -->
        <style>
              
        </style>
    </head>
    <body>
          <div class="nav">
               <button>Home</button>
          </div>
          <div>
              <div class="continueButton">
                <button>Continue</button>
              </div>
              <p>{{$theRandomNumber}}</p>
          </div>
    <script type="text/JavaScript">  
         console.log('tunji');
    </script>
    </body>
</html>
