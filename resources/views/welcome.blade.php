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

 <title>DisasterMY</title>

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
                                                <input type="text" class="form-control" name="locatedlatlng" hidden>
                                                <input type="text" class="form-control" name="located" disabled>
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
                                                name="location" nullable>
                                            <label for="floatingInput">Further describe the location:</label>
                                        </div>
                                    </div>
                                    <!-- remark input -->
                                    <div class="form-outline mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text">Additional information</span>
                                            <textarea class="form-control" aria-label="message" name="message" nullable></textarea>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-report"
                                            onclick="success();">Submit</button>
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
    function success() {
        alert("Report submitted! Thank you!");
    }

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

        axios.get(
                'https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/reverseGeocode?f=pjson&featureTypes=&location=' +
                long + ',' + lat)
            .then(function(response) {
                console.log(response);
                var json = response.data.address.City;
                var featureGroup = L.featureGroup([userLocationMarker]).bindPopup(
                    "You are here! <br>You may proceed to report an incident in this area.", {
                        autoClose: false
                    }).addTo(map).openPopup();
                document.querySelector('input[name="locatedlatlng"]').value = json;
                document.querySelector('input[name="located"]').value = json;

            })
            .catch(function(error) {
                console.log(error);
            });




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

{{-- ... --}}
<script src="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.umd.js"></script>


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

    var floodIcon = L.icon({
        iconUrl: 'images/pin/floodPin.png',
        iconSize: [50, 50],
    });

    var landslideIcon = L.icon({
        iconUrl: 'images/pin/landslidePin.png',
        iconSize: [50, 50],
    });

    var otherIcon = L.icon({
        iconUrl: 'images/pin/disasterPin.png',
        iconSize: [50, 50],
    });


    // -------------------------------------------------------------------marker clustering

    var data = <?php echo JSON_encode($report); ?>;

    var disasterMarker = L.layerGroup([]);
    var floodMarker = L.layerGroup([]);
    var landslideMarker = L.layerGroup([]);

    function titleCase(string) {
        return string[0].toUpperCase() + string.slice(1).toLowerCase();
    }

    for (var i = 0; i < data.length; i++) {
        if (data[i].type === 'flood') {
            L.marker([data[i].latitude, data[i].longitude], {
                icon: floodIcon
            }).bindPopup("Disaster: Flood" +
                "<br>Date: " + data[i].date + "<br>Time: " + data[i].time +
                "<br>Source: Public Report").addTo(floodMarker);
        } else if (data[i].type === 'landslide') {
            L.marker([data[i].latitude, data[i].longitude], {
                icon: landslideIcon
            }).bindPopup("Disaster: Landslide" +
                "<br>Date: " + data[i].date + "<br>Time: " + data[i].time +
                "<br>Source: Public Report").addTo(landslideMarker);
        } else {
            L.marker([data[i].latitude, data[i].longitude], {
                icon: otherIcon
            }).bindPopup("Disaster: " + titleCase(data[i].type) +
                "<br>Date: " + data[i].date + "<br>Time: " + data[i].time +
                "<br>Source: Public Report").addTo(disasterMarker);
        }

    }

    var data2 = <?php echo JSON_encode($rw); ?>;

    for (var i = 0; i < data2.length; i++) {
        if (data2[i].event_type === 'Flood') {
            L.marker([data2[i].latitude, data2[i].longitude], {
                icon: floodIcon
            }).bindPopup("Disaster: Flood" +
                "<br>Date: " + data2[i].event_date + "<br>Location: " + data2[i].event_location +
                "<br><a href=\"" + data2[i].post_url + "\"class=\"btn\">View Details</a>").addTo(floodMarker);
        } else if (data2[i].event_type === 'Landslide') {
            L.marker([data2[i].latitude, data2[i].longitude], {
                icon: landslideIcon
            }).bindPopup("Disaster: Landslide" +
                "<br>Date: " + data2[i].event_date + "<br>Location: " + data2[i].event_location +
                "<br><a href=\"" + data2[i].post_url + "\"class=\"btn\">View Details</a>").addTo(landslideMarker);
        } else {
            L.marker([data2[i].latitude, data2[i].longitude], {
                icon: otherIcon
            }).bindPopup("Disaster: " + titleCase(data2[i].event_type) +
                "<br>Date: " + data2[i].event_date + "<br>Location: " + data2[i].event_location +
                "<br><a href=\"" + data2[i].post_url + "\"class=\"btn\">View Details</a>").addTo(disasterMarker);
        }

    }


    const clusterMarker = L.markerClusterGroup().addLayer(disasterMarker).addLayer(floodMarker).addLayer(
        landslideMarker);


    map.addLayer(clusterMarker);


    //-------------------------------------------------------------------location latlng


    // var dataRW = <?php echo JSON_encode($rw); ?>;
    // const provider = new window.GeoSearch.OpenStreetMapProvider()
    // for (var j = 0; j < dataRW.length; j++) {
    //     var query_addr = dataRW[j].event_location + 'malaysia';
    //     // Get the provider, in this case the OpenStreetMap (OSM) provider. For some reason, this is the "wrong" way to instanciate it. Instead, we should be using an import "leaflet-geosearch" but I coulnd't make that work

    //     var query_promise = provider.search({
    //         query: query_addr
    //     });

    //     query_promise.then(value => {
    //         for (k = 0; k < 1; k++) {
    //             // Success!
    //             var x_coor = value[k].x;
    //             var y_coor = value[k].y;
    //             var label = value[k].label;
    //             L.marker([y_coor, x_coor]).bindPopup("<b>" + dataRW[j].event_location +
    //                 "</b><br>" + label).addTo(disasterMarker);
    //         };
    //     }, reason => {
    //         console.log(reason); // Error!
    //     });
    // }

    //-------------------------------------------------------------------layers control
    var baseMaps = {
        "Dark Mode": Stadia_AlidadeSmoothDark,
        "Light Mode": googleHybrid
    };


    var overlayMaps = {
        "Flood": floodMarker,
        "Landslide": landslideMarker,
        "Other": disasterMarker,
        "Show all": clusterMarker
    };

    var layerControl = L.control.layers(baseMaps, overlayMaps, {
        collapsed: false
    }).addTo(map);
</script>
