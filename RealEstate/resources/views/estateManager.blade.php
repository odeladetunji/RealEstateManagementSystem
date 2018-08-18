<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Real Estate Management System</title>
        <base href="http://127.0.0.1:8000/">

        <link href="/CSS/estatemanager.css" rel="stylesheet" type="text/css">
        <!-- JQuery -->
        <script src="/js/jquery-3.2.1.min(first).js" type='text/JavaScript'></script>
        <!-- Styles -->
        <style>
              
        </style>
    </head>
    <body>
              <div class="row">
                   <button>Home</button>
              </div>
              <div>
                  <h1>Estate Managers</h1>
                  <form class="createPlayers" method="POST" class="estatemanagers" name="createPlayers" encType="multipart/form-data" action="{{URL::to('/registerEstateManager')}}" class="createPlayers">
                       {{ csrf_field() }}
                       <label for="">Sign Up</label>
                       <input type="text" required><br>
                       <input type="password" required id="password"><br>
                       <button>submit</button>
                  </form>
              </div>
        <script>   
             $('document').ready(function(event){
              $('.estatemanagers').submit(function(event){
                    event.preventDefault();
                    function checkingIfPasswordExits(){
                        var password = document.getElementById('password').value;
                        var theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        var theData = { "message": password, "token": theToken }
                        var xhttp = new XMLHttpRequest();
                        xhttp.open("POST", "/checkIfPasswordAvailable", true);
                        xhttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                var data = JSON.parse(this.responseText).data;
                                console.log(data);
                                if(data.message == 'password is not available'){
                                     $('#warningMessage').show();
                                     return;
                                }

                                if (data.message == 'password is available') {
                                     $('.estatemanagers').submit();
                                     return;
                                }
                            }
                        };

                        xhttp.setRequestHeader('X-CSRF-TOKEN', theToken);
                        xhttp.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
                        xhttp.setRequestHeader("Content-Type", 'application/json');
                        xhttp.send(JSON.stringify(theData));
                    }

                    checkingIfPasswordExits();

              });
             
        });   
        </script>
    </body>
</html>
