<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>ArcGIS API for JavaScript Tutorials: Reverse geocode</title>
    <style>
        html,
        body,
        #viewDiv {
            padding: 0;
            margin: 0;
            height: 100%;
            width: 100%;
        }
    </style>
    <link rel="stylesheet" href="https://js.arcgis.com/4.24/esri/themes/light/main.css">
    <script src="https://js.arcgis.com/4.24/"></script>
    <script>
        require([
            "esri/config",
            "esri/Map",
            "esri/views/MapView",

            "esri/rest/locator"

        ], function(esriConfig, Map, MapView, locator) {

            esriConfig.apiKey =
                "AAPKc52f94cbaeb3455fa6ce9b69cf8ac4489NVLOczzyreLNMNr3yyDvIQ_zQDk02tv41NzGAaF8FC3yBCfrYRrR6kETY0kOJ88";

            const map = new Map({
                basemap: "arcgis-navigation"
            });

            const view = new MapView({
                container: "viewDiv",
                map: map,
                center: [101.64992, 3.12323],
                zoom: 8
            });

            const serviceUrl = "http://geocode-api.arcgis.com/arcgis/rest/services/World/GeocodeServer";

            view.on("click", function(evt) {
                const params = {
                    location: evt.mapPoint
                };

                locator.locationToAddress(serviceUrl, params)
                    .then(function(response) { // Show the address found
                        const address = response.address;
                        showAddress(address, evt.mapPoint);
                    }, function(err) { // Show no address found
                        showAddress("No address found.", evt.mapPoint);
                    });

            });

            function showAddress(address, pt) {
                view.popup.open({
                    title: +Math.round(pt.longitude * 100000) / 100000 + ", " + Math.round(pt.latitude *
                        100000) / 100000,
                    content: address,
                    location: pt
                });
            }

        });
    </script>
</head>

<body>
    <div id="viewDiv"></div>
</body>

</html>
