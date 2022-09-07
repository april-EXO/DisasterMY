<head>
    <title>Geosearch + marker example</title>
    <style>
        #map {
            width: 100%;
            height: 100%;
        }
    </style>
    <!-- leaflet css -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
</head>




<body>
    <div id="map"></div>

    <!-- leaflet js -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
	<script src="https://unpkg.com/leaflet-geosearch@2.2.0/dist/bundle.min.js"></script>
	
    <script>
        // Initialize map to specified coordinates
        var map = L.map('map', {
            center: [101.64992,
                3.12323
            ], // CAREFULL!!! The first position corresponds to the lat (y) and the second to the lon (x)
            zoom: 12
        });

        // Add tiles (streets, etc)
        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            subdomains: ['a', 'b', 'c']
        }).addTo(map);

        var query_addr = "Baling (Kedah) ,malaysia";
        // Get the provider, in this case the OpenStreetMap (OSM) provider. For some reason, this is the "wrong" way to instanciate it. Instead, we should be using an import "leaflet-geosearch" but I coulnd't make that work
        const provider = new window.GeoSearch.OpenStreetMapProvider()
        var query_promise = provider.search({
            query: query_addr
        });
        // It's a promise because we have to wait for the geosearch results. It may be more than one. Be careful.
        // These results have the following properties:
        // const result = {
        //   x: Number,                      // lon,
        //   y: Number,                      // lat,
        //   label: String,                  // formatted address
        //   bounds: [
        //     [Number, Number],             // s, w - lat, lon
        //     [Number, Number],             // n, e - lat, lon
        //   ],
        //   raw: {},                        // raw provider result
        // }

        query_promise.then(value => {
            for (i = 0; i < 1; i++) {
                // Success!
                var x_coor = value[i].x;
                var y_coor = value[i].y;
                var label = value[i].label;
                var marker = L.marker([y_coor, x_coor]).addTo(
                    map
                ) // CAREFULL!!! The first position corresponds to the lat (y) and the second to the lon (x)
                marker.bindPopup("<b>Found location</b><br>" + label)
                    .openPopup(); // note the "openPopup()" method. It only works on the marker
            };
        }, reason => {
            console.log(reason); // Error!
        });
    </script>
</body>
