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
          <div class="" style="display: flex;">
               <div class="leftNav">
                   <ul>
                       <li onclick="gotoHomepage()">home</li>
                       <li onclick="displayForm()">list Property</li>
                       <li>View listed properties</li>
                   </ul>
               </div>
               <div class="theBody">  
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

                    <div class="genProperties">
                        <p id="pTag"></p>
                    </div>
                    
                    <p id="successMessage">Property Has Been Listed Successfully!</p>
                    <h4 id="thisH4">Please fill the form below to list your property on the platform</h4>
                    <form action="" method="POST" enctype="multipart/form-data" class="listProperties">
                        {{ csrf_field() }}
                        <label>Discription of Property</label>
                        <input type="text" name="discription" placeholder="Discription of Property"><br>
                        <label>Caption</label>
                        <input type="text" name="caption" placeholder="E.g two bedroom apartment"><br>
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
                        <input type="file" name="thirdpicture" placeholder="Picture of Property"><br>
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
                        var thisPerson = document.getElementById('thisIdentity').innerHTML;
                        var property = document.querySelector('form');
                        var formData = new FormData(property);
                        formData.append('identity', thisPerson);
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
                                var inputs = document.getElementsByTagName('input');
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

        function deleteDisProperty(param){
            var theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var theData = { "message": param, "token": theToken }
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "/deleteProperty", true);
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    return;
                    data = JSON.parse(this.responseText).data;
                    console.log(this.responseText);
                }
            };

            xhttp.setRequestHeader('X-CSRF-TOKEN', theToken);
            xhttp.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
            xhttp.setRequestHeader("processData", 'false');
            xhttp.setRequestHeader('cache', 'false');
            xhttp.setRequestHeader("Content-Type", "application/json");
            xhttp.send(JSON.stringify(theData));
        }

        function hideOrDisplayProperty(param){
           var someValue = param.getAttribute('class');

           // this function is for toggling between hide or display of properties
           var thisProperty = document.getElementById(someValue);
           var value = thisProperty.style.display;
    
           if (value == 'none') {
               thisProperty.style.display = 'block';
           }else{
               thisProperty.style.display = 'none';
           }
        }

        function listProperties(){
            var theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var message = document.getElementById('thisIdentity').innerHTML;
            var theData = { "message": message, "token": theToken }
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "/listAllProperties", true);
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    data = JSON.parse(this.responseText).data; // this is an array!
                    if (data.length == 0) {
                        return;
                    }

                    console.log(data);
                    function useData(param, count){
                        console.log(count);
                        var theHeading = "<div class='headerDis'>" +
                                                "<ul>" +
                                                    "<li class='" + param.identity + "' onclick='hideOrDisplayProperty(this)'>" + count + "</li>" +
                                                    "<li class='" + param.identity + "' onclick='hideOrDisplayProperty(this)'>" + param.discription + "</li>" +
                                                    "<li><button onclick='deleteDisProperty(this.class)' class='" + param.identity + "'>delete</button><li>" +
                                                "</ul>" +
                                         "</div>";

                        var someHtml = "<div class='propertyContent' id='" + param.identity + "'>" +
                                            "<p class='pHead'>Property Discription</p>" +
                                            "<p class='subDiv'>"  + param.discription + "</p>" +
                                            "<p class='pHead'>Caption</p>" +
                                            "<p class='subDiv'>"  + param.caption + "</p>" +
                                            "<p class='pHead'>Owners Name</p>" +
                                            "<p class='subDiv'>"  + param.owner +  "</p>" +
                                            "<p class='pHead'>State of Property location</p>" +
                                            "<p class='subDiv'>" + param.state + "</p>" +
                                            "<p class='pHead'>Local Government of Property Location</p>" +
                                            "<p class='subDiv'>" + param.localgovernment + "</p>" +
                                            "<p class='pHead'>Condition of Property</p>" +
                                            "<p class='subDiv'>" + param.thecondition + "</p>" +
                                            "<p class='pHead'>Availability Status</p>" +
                                            "<p class='subDiv'>" + param.availability + "</p>" +
                                            "<p class='pHead'>Type of Listing</p>" +
                                            "<p class='subDiv'>" + param.type + "</p>" +
                                            "<p class='pHead'>Telephone</p>" +
                                            "<p class='subDiv'>" + param.phonenumber + "</p>" +
                                            "<p class='pHead'>Type of Property</p>" +
                                            "<p class='subDiv'>" + param.type + "</p>" +
                                            "<p class='pHead'>Price</p>" +
                                            "<p class='subDiv'>" + param.price + "</p>" +
                                       "</div>";

                         var finalHTML = "<div class='theProps'>" + theHeading + someHtml + "</div>";

                         $(finalHTML).insertBefore('#pTag');
                    }
                    
                    var count = 0;
                    for(var i=0; i<=data.length; i++){
                        count++;
                        useData(data[i], count); //note data[i] is an object literial
                        if (count == data.length) {
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
            xhttp.send(JSON.stringify(theData));
        }

        listProperties();
        
        function gotoHomepage(){
            window.location = '/landingpage';
        }
    </script>
    </body>
</html>
