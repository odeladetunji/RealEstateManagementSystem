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
          <div class="header">
               <ul>
                  <li onclick="gotoSignUp()">signup</li>
                  <li onclick="gotoLogin()">Login</li>
                  <li onclick="returnFullPage()">home</li>
               </ul>
          </div>
          <div class="parentBody">
                <div class="banner">
                     <div style="display: flex; width: 100%; flex-direction: row;" class="forBanner">
                          <div id="searchBox">
                               <input type="" name="search" placeholder="Search Property For Lease or Sale" onkeyup="showHint(this)">
                          </div>
                          <div id="country">
                               <select name="country" id="select">
                                     <option value="Location">Location</option>
                                     <option value="Abia">Abia</option>
                                     <option value="Osun State">Osun State</option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                                     <option value=""></option>
                               </select>
                          </div>
                          <div id="submitSearch">
                              <button>submit</button>
                          </div>
                     </div>
                </div>
                <div class="mainBody">
                    <p id="pTag"></p>
                </div>
          </div>
          <div style="display: flex;">
              <div class="firstSegment">
                    <div id="firstImage"></div>
                    <div id="secondImage"></div>
                    <div id="thirdImage"></div>
                    <div id="fouthImage"></div>
              </div>
              <div class="secondSegment">
                   <p></p>
                   <p></p>
                   <p></p>
                   <p></p>
                   <p></p>
                   <p></p>
                   <p></p>
              </div>
          </div>
          <div class="footer">
               <p>Designed And Written By Olatunji Odelade</p>
          </div>
        <script>  
            var dataContainer;
            var dataBase;
            
            $(document).ready(function(event){
                  function listProperties(){
                    var theObjects;
                    var arrayObject = [];
                    var theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    var xhttp = new XMLHttpRequest();
                    xhttp.open("GET", "/listAllProperties", true);
                    xhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            data = JSON.parse(this.responseText).data; // this is an array!
                            console.log(data);
                            dataContainer = data;
                            function showProperties(){
                                var someDiv = "<div class='coverForObjects' style='display: flex;'>" + theObjects + "</div>";
                                $(someDiv).insertBefore('#pTag');
                                console.log('Finished Displaying Contents');
                            }

                            function useData(param, count){
                                var pictureSection = "<div class='imageDiv' style='background-image: url(/storage/images/" + param.firstpicture + ")' onclick='fullPropertyDiscription(this)'></div>";

                                var body = "<div>" +
                                                "<p>" + param.caption + "</p>" +
                                                "<p>" + param.location + "</p>" +
                                                "<p>" + param.discription + "</p>" +
                                                "<p>" + param.price + "</p>" +
                                                "<p>more</p>" +
                                           "</div>";

                                var totalHTML = '<div class="propertyCover">' + pictureSection + body + '</div>';
                                //arrayObject.push(totalHTML);
                                if (count == 1) { theObjects = totalHTML;}
                                theObjects = theObjects + totalHTML;
                                //$(totalHTML).insertBefore('#pTag');
                            }

                            var count = 0;
                            for(var i=0; i<=data.length; i++){
                                count++;
                                useData(data[i], count); //note data[i] is an object literial
                                if (count == data.length) {
                                    setTimeout(function(){
                                       showProperties();
                                    }, 15);
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

                  function searchAlgorithm(){
                        var theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        var xhttp = new XMLHttpRequest();
                        xhttp.open('GET', '/searchAlgorithm', true);

                        xhttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                data = JSON.parse(this.responseText).data; // this is an array!
                                dataBase = data;
                                console.log(dataBase);
                            }
                        }

                        xhttp.setRequestHeader('X-CSRF-TOKEN', theToken);
                        xhttp.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
                        xhttp.setRequestHeader("processData", 'false');
                        xhttp.setRequestHeader('cache', 'false');
                        xhttp.setRequestHeader("Content-Type", "application/json");
                        xhttp.send();
                 }

                 searchAlgorithm();

            });  

            function fullPropertyDiscription(param){
                 var theData = param.style.backgroundImage.split('/')[3].split('"')[0];
                 console.log(theData);

                 function setTheImage(parameter){
                      var firstImage = document.getElementById('firstImage');
                      firstImage.style.backgroundImage = 'url(/storage/images/' + theData + ")";
                 }

                 function setOtherImages(value, value2){
                      var thisDiv = document.getElementById(value2);
                      thisDiv.style.backgroundImage = 'url(/storage/images/' + value + ")";
                      document.getElementsByClassName('firstSegment')[0].style.display = 'block';
                      document.getElementsByClassName('secondSegment')[0].style.display = 'block';
                      document.getElementsByClassName('parentBody')[0].style.display = 'none';
                 }

                 dataContainer.map(function(data){
                     if (data.firstpicture == theData) {
                         setTheImage(data);
                         setOtherImages(data.secondpicture, "secondImage");
                         setOtherImages(data.thirdpicture, "thirdImage");
                         setOtherImages(data.fouthpicture, "fouthImage");
                     }
                 });
            }

            function returnFullPage(){
                  $('.firstSegment').hide();
                  $('.secondSegment').hide();
                  $('.parentBody').show();
            }
            
            function showHint(parameter){
                 // pronouns are excluded from the search, only key words are used!
                 var pronouns = [
                    'all', 'another', 'any', 'anybody', 'anyone', 'anything', 'as', 'both', 
                    'each', 'either', 'everybody','everyone', 'everything', 'few', 'he', 
                    'her', 'hers', 'herself', 'him', 'himself', 'his', 'I', 'it', 'its', 
                    'itself', 'many', 'me', 'mine', 'most', 'my', 'myself', 'neither', 
                    'no one', 'nobody', 'none','nothing',
                    'one', 'other', 'others', 'our', 'ours', 'ourselves', 'several', 'she', 
                    'some', 'somebody', 'someone', 'something', 'such', 'that', 'thee', 
                    'their', 'theirs', 'them', 'themselves', 'these', 'they', 'thine', 
                    'this', 'those', 'thou', 'thy', 'us', 'we','what', 'whatever', 'which', 
                    'whichever', 'who', 'whoever', 'whom', 'whomever', 'went', 'would', 
                    'whose', 'ye', 'you', 'your', 'yours', 'yourself','yourselves',
                    'in', 'of', 'you', 'i', 'off', 'on', 'by', 'come'
                    ];

                 var value = parameter.value; // use for the searching!
                 var location = document.getElementById('select').value;
                 var foundProperties = [];
                 var propertyContainer = 0;

                 function showTheFinalHint(){
                      $(propertyContainer).insertBefore('#');
                 }

                 function showFoundProperties(){
                      var count = 0;
                      foundProperties.map(function(elements){
                            count++;
                            var content = "<div class='cov' style='display: flex;'>" +
                                              "<div class='thePictures' style='background-image: url(/storage/images/" + elements.firstpicture + ")'></div>" +
                                              "<div class='theDiscription'>" +
                                                   "<p>" + elements.caption + "</p>" +
                                                   "<p>" + elements.location + "</p>" +
                                                   "<p>" + elements.phonenumber + "</p>" +
                                                   "<p>" + elements.price + "</p>" +
                                                   "<p>" + elements.availability + "</p>" +
                                              "</div>" +
                                          "</div>";

                                          propertyContainer = propertyContainer + content;
                                          if (count == 1) {
                                                setTimeout(function(){
                                                   showTheFinalHint();
                                                }, 10);
                                          }
                    });
                 }
                 
                 var marchFound;
                 function checkObject(param){
                      function loopObject(searchValue){
                          console.log('something');
                          console.log(location);
                          console.log(param);
                          console.log(searchValue);
                          for(x in param){
                              if (param[x] == searchValue && param['state'] == location) {
                                    foundProperties.push(param);
                                    console.log('it got here');
                                    marchFound = "True";
                                    //console.log(foundProperties);
                              }
                          }
                      }

                      var data = value.split(" ");
                      var counter = 0;
                      for(var i=0; i<=data.length; i++){
                         counter++;
                         if (pronouns.indexOf(data[i]) < 0) {
                             loopObject(data[i]);
                         }

                         if (pronouns.indexOf(data[i]) >= 0) {
                              continue;
                         }

                         if (data.length == counter) {
                              break;
                               
                              setTimeout(function(){ // this is to wait for other loop to finish there execution!
                                if (marchFound == "True") {
                                  showFoundProperties();
                                }
                              }, 10);
                                  
                               
                         }
                      }
                 }

                 dataBase.map(function(element){
                      checkObject(element);
                 })
            }

            function gotoSignUp(){
                window.location = '/adminpage';
            }

            function gotoLogin(){
                window.location = '';
            }

        </script>
    </body>
</html>
