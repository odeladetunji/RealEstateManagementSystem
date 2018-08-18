<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Real Estate Management System</title>
        <base href="http://127.0.0.1:8000/">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="/CSS/landLordPage.css" rel="stylesheet" type="text/css">
        <!-- JQuery -->
        <script src="/js/jquery-3.2.1.min(first).js" type='text/JavaScript'></script>
        <!-- Styles -->
        <style>
              
        </style>
    </head>
    <body>
          <div class="row mainDiv">
               <div class="col-sm-3">
                   <ul>
                       <li>home</li>
                       <li onclick="displayForm()">list Property</li>
                       <li>View listed properties</li>
                   </ul>
               </div>
               <div class="col-sm-9">  
                    <p id="subHeading">Welcome <span id="subHeadingSpan"></span></p>
                    <ul class="tabs">
                        <li>
                            <p>0</p>
                            <p>Listed Properties</p>
                        </li>
                        <li>
                            <p>0</p>
                            <p onclick="displayForm()">List Properties</p>
                        </li>
                        <li>
                            <p>0</p>
                            <p>Total Properties</p>
                        </li>
                    </ul> 

                    <ul class="secondTab">
                        <li>
                            <p>00</p>
                            <p>Available Properties</p>
                        </li>
                    </ul>
                    
                    <p id="successMessage">Property Has Been Listed Successfully!</p>
                    <h4 id="thisH4">Please fill the form below to list your property on the platform</h4>
                    <form action="" method="POST" enctype="multipart/form-data" class="listProperties">
                        {{ csrf_field() }}
                        <label>Discription of Property</label>
                        <input type="text" name="discription" placeholder="Discription of Property"><br>
                        <label>Owners Name</label>
                        <input type="text" name="owner" placeholder="Owners Name"><br>
                        <label>Address of Property</label>
                        <input type="text" name="location" placeholder="Address of Property"><br>
                        <label>State of property location</label>
                        <input type="text" name="state" placeholder="State of property location"><br>
                        <label>Local Government of property Location</label>
                        <input type="text" name="localgovernment" placeholder="Local Government of property Location"><br>
                        <label>State the Condition of the Property</label>
                        <input type="text" name="condition" placeholder="State the Condition of the Property"><br>
                        <label>Select Availability Status</label>
                        <select name="availability">
                            <option value="Available">Available</option>
                            <option value="Not Available">Not Available</option>
                        </select><br>
                        <label>Select Type of Listing</label>
                        <select name="type">
                            <option value="Lease">Lease</option>
                            <option value="Sale">Sale</option>
                        </select><br>
                        <label>Telephone</label>
                        <input type="text" name="telephone" placeholder="Telephone"><br>
                        <label>Price of Property</label>
                        <input type="text" name="price" placeholder="Price of Property"><br>
                        <label>First Picture</label>
                        <input type="file" name="firstpicture" placeholder="Picture of property"><br>
                        <label>Second Picture</label>
                        <input type="file" name="secondpicture" placeholder="Picture of Property"><br>
                        <label>Third Picture</label>
                        <input type="file" name="thirdpicure" placeholder="Picture of Property"><br>
                        <label>Fouth Picture</label>
                        <input type="file" name="fouthpicture" placeholder="Picture of Property"><br>
                        <button>submit</button>
                    </form><br>
               </div>
          </div>
          <p id="thisIdentity">{{ $identity }}</p>
    <script>  
        $('document').ready(function(event){
              $('.listProperties').submit(function(event){
                    event.preventDefault();
                    var property = document.querySelector('form');
                    function checkingIfPasswordExits(){
                        //var propertyForm = document.getElementsByClassName('listProperties')[0];
                        var property = document.querySelector('form');
                        var formData = new FormData(property);
                        formData.append('user', 'username');
                        //console.log(formData.get('location')); // you wo
                        //return;
                        var theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        var theData = { "formData": formData, "token": theToken }
                        console.log(formData.get('location'));
                        console.log(theData.formData);
                      
                        var xhttp = new XMLHttpRequest();
                        xhttp.open("POST", "/listPropertyLandLord", true);
                        xhttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                data = this.responseText;
                                console.log(this.responseText);
                                $('#successMessage').show();
                                setTimeout(function(event){
                                  $('#successMessage').hide();
                                }, 5000);
                                var inputs = document.getElementsByTagName('input'); // an Array!
                               /* for(var i=0; i < inputs.length; i++){
                                    if (inputs[i].value != null || inputs[i].value != "" || inputs[i].value == typeof(String) || inputs[i].value == typeof(Number)) {
                                      inputs[i].value = null;
                                    }
                                }*/
                            }
                        };

                        xhttp.setRequestHeader('X-CSRF-TOKEN', theToken);
                        xhttp.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
                        xhttp.setRequestHeader("processData", 'false');
                        xhttp.setRequestHeader('cache', 'false');
                        //xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded charset=utf-8; boundary=" + Math.random().toString().substr(2));
                        xhttp.setRequestHeader("ContentType", "false");
                        xhttp.send(formData);
                    }

                    checkingIfPasswordExits();

                 
    var data = new FormData(property);
    $.ajax({
        url: 'http://127.0.0.1:8000/listPropertyLandLord',
        type: 'POST',
        data: data,
        cache: false,
        processData: false,
        contentType : false,
        success: function (data) {
            console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
        }
    })

             
              }) 
        });  
        
        $('.listProperties').hide();
        $('#successMessage').hide();
        $('#thisH4').hide();

        function displayForm(){
            console.log('this ran');
            $('.listProperties').show();
            $('#successMessage').show();
            $('#thisH4').show();
        }

        function listProperties(){
            var theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var message = document.getElementById('thisIdentity').innerHTML;
            var theData = { "message": message, "token": theToken }
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "/listAllProperties", true);
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    data = this.responseText;
                    console.log(this.responseText);
                }
            };

            xhttp.setRequestHeader('X-CSRF-TOKEN', theToken);
            xhttp.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
            xhttp.setRequestHeader("processData", 'false');
            xhttp.setRequestHeader('cache', 'false');
            xhttp.setRequestHeader("ContentType", "false");
            xhttp.send(theData);
        }

        listProperties();

        function deleteProperty(gottenValue){
            var theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var theData = { "message": gottenValue, "token": theToken }
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "/deleteProperty", true);
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    data = this.responseText;
                    console.log(this.responseText);
                }
            };

            xhttp.setRequestHeader('X-CSRF-TOKEN', theToken);
            xhttp.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
            xhttp.setRequestHeader("processData", 'false');
            xhttp.setRequestHeader('cache', 'false');
            xhttp.setRequestHeader("ContentType", "false");
            xhttp.send(theData);

        }
    </script>
    </body>
</html>
