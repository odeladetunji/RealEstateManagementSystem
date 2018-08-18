<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Real Estate</title>
        <base href="http://127.0.0.1:8000/">

        <link href="/CSS/firstadmin.css" rel="stylesheet" type="text/css">
        <!-- JQuery -->
        <script src="/js/jquery-3.2.1.min(first).js" type='text/JavaScript'></script>
        <!-- Styles -->
        <style>
              
        </style>
    </head>
    <body>
        
              <div class="header">
                   <button onclick="gotoHomePage()">home</button>
              </div>
              <div class="linkDiv">
                  <h2>Please Select Your Category</h2><br>
              </div>
              <div>
                  <button id="firstbutton"><a href="/landlords">LandLords</a></button>
              </div>
              <div>
                <button id="secondbutton"><a href="/estateManagers" id="secondlink">Estate Managers</a></button>
              </div>
        <script>    
                function gotoHomePage(){
                     redirect();
                }
        </script>
    </body>
</html>
