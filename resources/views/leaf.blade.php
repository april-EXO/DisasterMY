<html>

<head>
	<!-- leaflet css -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
	<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
	<!-- marker cluster -->
	<link rel="stylesheet" href="dist/MarkerCluster.css" />
	<link rel="stylesheet" href="dist/MarkerCluster.default.css" />

	<style>
		#map {
			margin: auto;
			width: 80%;
			height: 70%;
			top: 3%
		}
	</style>


</head>

<body>
	<div id="map">
		<div class="leaflet-control coordinate">

		</div>

	</div>
</body>

</html>
<!-- leaflet js -->
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
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
	var Stadia_AlidadeSmoothDark = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
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


	// marker - flood
	var myIcon = L.icon({
		iconUrl: 'images/pin/floodPin.png',
		iconSize: [30, 30],
	});

	var floodMarker = L.marker([4.2105, 101.9758], {
		icon: myIcon
	});

	var popup = floodMarker.bindPopup('hiiiiii' + floodMarker.getLatLng()).openPopup();

	popup.addTo(map);

	console.log(floodMarker.toGeoJSON());

	// -------------------------------------------------------------------geo json
	// var pointData = L.geoJSON(pointJson).addTo(map)
	// function onEachFeature(feature, layer) {
	// 	layer.bindPopup(feature.geometry.coordinates[1]);
	// }

	// var pointData = L.geoJSON(pointJson, {
	// 	pointToLayer: function(feature, latlng) {
	// 		return L.marker(latlng, {
	// 			icon: myIcon
	// 		});
	// 	},
	// 	// onEachFeature: onEachFeature
	// }).addTo(map);

	const geojsonMarkerOptions = {
		radius: 8,
		fillColor: "blue",
		color: "#000",
		weight: 1,
		opacity: 1,
		fillOpacity: 0.8
	};

	// var pointData = L.geoJSON(pointJson, {
	// 	pointToLayer: function(feature, latlng) {
	// 		return clusterMarker.addLayer(circleMarker(latlng, geojsonMarkerOptions));
	// 	},
	// 	// onEachFeature: onEachFeature
	// }).addTo(map);

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


	//-------------------------------------------------------------------layers control
	var baseMaps = {
		"Dark Mode": Stadia_AlidadeSmoothDark,
		"Light Mode": googleHybrid
	};


	var overlayMaps = {
		"Flood": floodMarker,
		"pointData": pointData

	};

	var layerControl = L.control.layers(baseMaps, overlayMaps, {
		collapsed: false
	}).addTo(map);

	map.removeLayer(floodMarker);



	//-------------------------------------------------------------------real time location
	if (!navigator.geolocation) {
		console.log("Your browser doesn't support GeoLoction")
	} else {
		navigator.geolocation.getCurrentPosition(getPosition)
	}

	function getPosition(position) {
		// console.log(position)
		var lat = position.coords.latitude
		var long = position.coords.longitude
		var accuracy = position.coords.accuracy

		var userLocationMarker = L.marker([lat, long])

		var featureGroup = L.featureGroup([userLocationMarker]).addTo(map)
	}

	
</script>