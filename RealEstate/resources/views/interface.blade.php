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
               <button><a href="/landingPage"></a></button>
          </div>
          <div>
              <div class="continueButton">
                   <form action="{{URL::to('/landlordsPage')}}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                         <input type="text" style="display: none;" id="input" name="identity">
                         <button>Continue!</button>
                   </form>
              </div><br>
              <p id="identity">{{ $identity }}</p>
          </div>
    <script type="text/JavaScript">  
            $('document').ready(function(event){
                  document.getElementById('input').value = document.getElementById('identity').innerHTML;
            });
    </script>
    </body>
</html>
