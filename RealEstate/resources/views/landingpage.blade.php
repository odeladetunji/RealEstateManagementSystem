<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Real Estate</title>
        <base href="http://127.0.0.1:8000/">

        <link href="/CSS/landingpage.css" rel="stylesheet" type="text/css">
        <!-- JQuery -->
        <script src="/js/jquery-3.2.1.min(first).js" type='text/JavaScript'></script>
        <!-- Styles -->
        <style>
              
        </style>
    </head>
    <body>
         <div>
              <div class="header">
                   <ul>
                      <li>signup</li>
                      <li>Login</li>
                   </ul>
              </div>
              <div class="body">
                    <div class="banner">
                         <div style="display: flex;">
                              <div>
                                   <input type="" name="search" placeholder="Search Property For Lease or Sale">
                              </div>
                              <div>
                                  <button>submit</button>
                              </div>
                         </div>
                    </div>
                    <div class="mainBody">
                        
                    </div>
              </div>
              <div class="footer">
                   <p>Designed And Written By Olatunji Odelade</p>
              </div>
         </div>
              
        <script>  
            $(document).ready(function(event){
                  function listProperties(){
                    var theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    
                    var xhttp = new XMLHttpRequest();
                    xhttp.open("GET", "/listAllProperties", true);
                    xhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            data = JSON.parse(this.responseText).data; // this is an array!
                            console.log(data);

                            function showProperties(){

                            }

                            function useData(param, count){

                            }
                            var count = 0;
                            for(var i=0; i<=data.length; i++){
                                count++;
                                useData(data[i], count); //note data[i] is an object literial
                                if (count == data.length) {
                                    setTimeout(function(){
                                       showProperties();
                                    }, 50);
                                    break;
                                }
                            }
                        }
                    };

                    xhttp.setRequestHeader('X-CSRF-TOKEN', theToken);
                    xhttp.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
                    xhttp.setRequestHeader("processData", 'false');
                    xhttp.setRequestHeader('cache', 'false');
                    xhttp.setRequestHeader("Content-Type", "application/json");
                    xhttp.send();
                  }

                  listProperties();
            });  
        </script>
    </body>
</html>
