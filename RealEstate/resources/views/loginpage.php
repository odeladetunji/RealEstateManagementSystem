<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Real Estate</title>
        <base href="http://127.0.0.1:8000/">

        <link href="/CSS/landlords.css" rel="stylesheet" type="text/css">
        <!-- JQuery -->
        <script src="/js/jquery-3.2.1.min(first).js" type='text/JavaScript'></script>
        <!-- Styles -->
        <style>
              
        </style>
    </head>
    <body>
          <div class="nav">
               <button onclick="gotoHomepage()">Home</button>
          </div>
          <div>
              
              <p id="warningMessage">Password or Username not correct!</p>
              <p id="logn">Login</p>
              <form class="landLords">
                   <input type="text" required id="username" placeholder="Enter username"><br>
                   <input type="password" required id="password" placeholder="Enter password"><br>
                   <button>submit</button>
              </form>

              <form method="post" class="landLords1" style="display: none;" name="registerForm" encType="multipart/form-data" action="/myaccount" >
                   {{ csrf_field() }}
                   <label for="">Login</label><br>
                   <input type="text" required id="username1" name="username"><br>
                   <input type="password" required id="password1" name="password"><br>
                   <button>submit</button>
              </form>
          </div>
    <script>  
        $('document').ready(function(event){
              $('.landLords').submit(function(event){
                    event.preventDefault();
                    function checkingIfPasswordExits(){
                        var password = document.getElementById('password').value;
                        var username = document.getElementById('username').value;
                        document.getElementById('password1').value = password;
                        document.getElementById('username1').value = username;
    
                        var theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        var theData = { "username": username, "password": password, "token": theToken }
                        var xhttp = new XMLHttpRequest();
                        //console.log('ppppppppp');
                        xhttp.open("post", "/loginuser", true);
                        xhttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                data = this.responseText;
                                console.log(this.responseText);
                                
                                if(data == 'user does not exits'){
                                     $('#warningMessage').show();
                                     setTimeout(function(){
                                        document.getElementById('warningMessage').style.display = 'none';
                                     }, 3000);
                                     return;
                                }

                                if (data == 'user exits') {
                                     console.log('this condition returned true');
                                     $('.landLords1').submit();
                                     return;
                                }
                            }
                        };

                        
                        xhttp.setRequestHeader('X-CSRF-TOKEN', theToken);
                        xhttp.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
                        xhttp.setRequestHeader("processData", 'false');
                        xhttp.setRequestHeader('cache', 'false');
                        xhttp.setRequestHeader("Content-Type", "application/json");
                        xhttp.send(JSON.stringify(theData));
                    }

                    checkingIfPasswordExits(); 

              });
             
        });  

        function gotoHomepage(){
              window.location = "/landingpage";
        }

    </script>
    </body>
</html>
