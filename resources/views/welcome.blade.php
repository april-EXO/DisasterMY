<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- leaflet css -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <!-- marker cluster -->
    <link rel="stylesheet" href="dist/MarkerCluster.css" />
    <link rel="stylesheet" href="dist/MarkerCluster.default.css" />

    <style>
        .btn-report {
            color: #FFFFFF;
            background-color: #2f4a9c
        }

        .modal {
            background-color: rgba(212, 197, 185, 0.2);
        }



        .modal-body {
            background-image: url("images/background.jpg");
        }



        .btn-submit {
            background-color: #2f4a9c
        }

        #map {
            margin: 5%;
            width: 80%;
            height: 70%;
            top: 3%
        }

        /* Change cursor when over entire map */
        .leaflet-container {
            cursor: crosshair;
        }


        #intro {
            background-image: url("images/background.jpg");
            height: 100vh;
        }

        /* Height for devices larger than 576px */
        @media (min-width: 992px) {
            #intro {
                margin-top: -58.59px;
            }
        }

        .navbar .nav-link {
            color: #fff !important;
        }
    </style>
    @include('layouts.header')

</head>

<body>
    <!-- Background image -->
    <div class="bg-image shadow-2-strong" id="intro">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <!-- MAP -->
                <div id="map">
                    <div class="leaflet-control coordinate">

                    </div>

                </div>
                <!-- MAP -->

                <!-- Button trigger modal -->
                <div class="d-grid gap-2 col-3 p-5 mx-auto">
                    <button type="button" class="btn btn-report" onclick="refresh();">
                        Report Incident
                    </button>
                    <!-- Button to rain map	 -->
                    <a href="/rainmap" class="leaflet-control btn btn-secondary">View Rain Map</a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Report Incident</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <!--form-->
                                <form action="addReport" method="POST">
                                    @csrf
                                    <div class="row mb-4">
                                        <!-- event type -->
                                        <div class="col">
                                            <div class="form-outline">
                                                <div class="form-floating">
                                                    <select class="form-select" id="type" aria-label="type"
                                                        name="type" onChange="changetextbox();">
                                                        <option value="" selected disabled>Select</option>
                                                        <option value="flood"> Flood </option>
                                                        <option value="landslide"> Landslide </option>
                                                        <option value="1"> Others </option>
                                                    </select>
                                                    <label for="type">Event Type</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- other event type -->
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="other" name="type"
                                                    disabled>
                                                <label for="floatingInput">Other:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <!-- date -->
                                        <div class="col">
                                            <div class="form-outline">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="date"
                                                        name="date">
                                                    <label for="floatingInput">Date</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- time -->
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="time" class="form-control" id="time"
                                                    name="time">
                                                <label for="floatingInput">Time</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <!-- lat long -->
                                        <div class="col">
                                            <input type="text" class="form-control" name="latitude" hidden>
                                            <input type="text" class="form-control" name="longitude" hidden>
											<div class="form-floating">
                                                <input type="text" class="form-control" name="locatedlatlng" disabled>
                                                <label for="floatingInput">Your location is near to:</label>
                                            </div>
											
                                        </div>
                                        <div class="col">
                                            <!-- alert success -->
                                            <div class="form-outline mb-4">
                                                <div class="alert alert-success d-flex align-items-center"
                                                    role="alert">

                                                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                                        <symbol id="check-circle-fill" fill="currentColor"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                        </symbol>
                                                        <symbol id="info-fill" fill="currentColor"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                                        </symbol>
                                                    </svg>
                                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24"
                                                        role="img" aria-label="Success: " id="showCircle">
														<use xlink:href="#check-circle-fill" />
                                                    </svg>
                                                    <div id="selectedLocation">
														Your location is recorded.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- location -->
                                    <div class="form-outline mb-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="location"
                                                name="location">
                                            <label for="floatingInput">Further describe the location:</label>
                                        </div>
                                    </div>
                                    <!-- remark input -->
                                    <div class="form-outline mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text">Additional information</span>
                                            <textarea class="form-control" aria-label="message" name="message"></textarea>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-report">Submit</button>
                                    </div>
                                    <input type="hidden" class="form-control" name="status" value="pending">
                                </form>
                                <!--form-->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @include('layouts.footer')
        </div>
    </div>
    <!-- Background image -->




</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
    function myFunction() {
        console.log("Welcome back!");
    }

    window.onload = function() {
        var reloading = sessionStorage.getItem("reloading");
        if (reloading) {
            if (document.querySelector('input[name="latitude"]').value !== "") {
                sessionStorage.removeItem("reloading");
                OpenBootstrapPopup();
            }
        }
    }

    function refresh() {
        sessionStorage.setItem("reloading", "true");
        document.location.reload();
    }


    function changetextbox() {
        var selectedValue = type.options[type.selectedIndex].value;
        var txtOther = document.getElementById("other");
        txtOther.disabled = selectedValue == 1 ? false : true;
        if (!txtOther.disabled) {
            txtOther.focus();
        }
    }

  

    //-------------------------------------------------------------------real time location
    if (!navigator.geolocation) {
        console.log("Your browser doesn't support GeoLoction")
    } else {
        navigator.geolocation.getCurrentPosition(getPosition, error)
    }

    function error() {
        alert('Please allow location access before proceed!');
    }

    function getPosition(position) {
        var lat = position.coords.latitude
        var long = position.coords.longitude

        var userLocationMarker = L.marker([lat, long])
        document.querySelector('input[name="latitude"]').value = lat;
        document.querySelector('input[name="longitude"]').value = long;

        var featureGroup = L.featureGroup([userLocationMarker]).bindPopup("You're here. <br>You may proceed to report an incident in this area.", {
            autoClose: false
        }).addTo(map).openPopup();

    }

    //-------------------------------------------------------------------


    function OpenBootstrapPopup() {
        $("#staticBackdrop").modal('show');
    }

    function CloseBootstrapPopup() {
        $("#staticBackdrop").modal('hide');
    }
</script>

<!-- leaflet js -->
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<!-- geojson data -->
<script src="geojson/point.js"></script>

<!-- marker cluster -->
<script src="dist/leaflet.markercluster.js"></script>
<script>
    //------------------------------------------------------------------- map initiazliation
    var map = L.map('map').setView([4.2105, 101.9758], 8);

    L.control.scale().addTo(map);

    map.zoomControl.setPosition('topright');

    //osm
    var osm = L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
    });

    osm.addTo(map);

    //dark
    var Stadia_AlidadeSmoothDark = L.tileLayer(
        'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
            maxZoom: 20,
            attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
        });

    Stadia_AlidadeSmoothDark.addTo(map);

    //google hybrid map
    var googleHybrid = L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    googleHybrid.addTo(map);


    //------------------------------------------------------------------- leaflet search
    L.Control.geocoder().addTo(map);



    const geojsonMarkerOptions = {
        radius: 8,
        fillColor: "blue",
        color: "#000",
        weight: 1,
        opacity: 1,
        fillOpacity: 0.8
    };


    // -------------------------------------------------------------------marker clustering


    const pointData = L.geoJSON(pointJson, {
        onEachFeature: function(feature, layer) {
            const popupContent = "hi"
            layer.bindPopup(popupContent)
        },
        pointToLayer: function(feature, latlng) {
            return L.circleMarker(latlng, geojsonMarkerOptions);
        }
    });
    const clusterMarker = L.markerClusterGroup().addLayer(pointData);

    map.addLayer(clusterMarker);

    // -------------------------------------------------------------------marker clustering


    var disasterIcon = L.icon({
        iconUrl: 'images/pin/disasterPin.png',
        iconSize: [50, 50],
    });

    var data = <?php echo JSON_encode($report); ?>;
    var disasterMarker = L.layerGroup([]);

    for (var i = 0; i < data.length; i++) {
        // Note how "L.marker()" runs only in the browser,
        // well outside of the <?php ?> tags. PHP doesn't know, nor 
        // it cares, about Leaflet.
        L.marker([data[i].latitude, data[i].longitude], {
            icon: disasterIcon
        }).bindPopup("Disaster: " + data[i].type + "<br>Date: " + data[i].date + "<br>Time: " + data[i].time +
            "<br><a href=\"/view/" + data[i].id + "\"class=\"btn\">View Details</a>").addTo(disasterMarker);

        // Accessing the properties of the data depends on the structure
        // of the data. You might want to do stuff like
        console.log(data);
        // while remembering to use the developer tools (F12) in your browser.

    }

    //-------------------------------------------------------------------layers control
    var baseMaps = {
        "Dark Mode": Stadia_AlidadeSmoothDark,
        "Light Mode": googleHybrid
    };


    var overlayMaps = {
        "Flood": disasterMarker,
        "Land Slide": pointData,
        "Other": clusterMarker

    };

    var layerControl = L.control.layers(baseMaps, overlayMaps, {
        collapsed: false
    }).addTo(map);
    map.removeLayer(clusterMarker);
    // map.removeLayer(disasterMarker);
</script>
