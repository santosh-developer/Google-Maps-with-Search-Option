<!DOCTYPE html>
<html>
    <head>
        <title>Geo Maps</title>
        <meta charset="UTF-8">
        <style type="text/css" media="screen">
            body {
                color: #333;
            }

            body, input, button {
                line-height: 1.4;
                font: 13px Helvetica,arial,freesans,clean,sans-serif;
            }


            a {
                color: #4183C4;
                text-decoration: none;
            }

            #examples a {
                text-decoration: underline;
            }

            #geocomplete { width: 200px}

            .map_canvas { 
                width: 1200px; 
                height: 500px; 
                margin: 10px 20px 10px 0;
            }

            #multiple li { 
                cursor: pointer; 
                text-decoration: underline; 
            }
            form { width: 1000px; float: left; margin-left: 20px}

            fieldset { width: 1100px; margin-top: 20px}
            fieldset strong { display: block; margin: 0.5em 0 0em; }
            fieldset input { width: 95%; }

            ul span { color: #999; }
        </style>
    </head>
    <body>
	<div align="center" style="width:1200px">
                <input id="geocomplete" type="text" style="width:400px" placeholder="Type in an address" value="61,Panjagutta,Telangana,Hyderabad" />
                <input id="find" type="button" value="FIND" />
        </div>
	<div class="map_canvas"></div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="jquery.geocomplete.js"></script>
        <script>
            $(function () {
                $("#geocomplete").geocomplete({
                    map: ".map_canvas",
                    details: "form ",
                    markerOptions: {
                        draggable: true
                    }
                });
                $("#geocomplete").bind("geocode:dragged", function (event, latLng) {
                    $("input[name=lat]").val(latLng.lat());
                    $("input[name=lng]").val(latLng.lng());
                });
                $("#reset").click(function () {
                    $("#geocomplete").geocomplete("resetMarker");
                    $("#reset").hide();
                    return false;
                });
                $("#find").click(function () {
                    $("#geocomplete").trigger("geocode");
                }).click();
            });
        </script>
        <?php // Please Use your Google Maps Key in place of YOURKEY at the bottom ?>
        <script src="http://maps.googleapis.com/maps/api/js?key=YOURKEY&sensor=false&amp;libraries=places"></script>

    </body>
</html>

