
<head>
	<link rel="stylesheet" href="https://openlayers.org/en/v4.6.5/css/ol.css" type="text/css">
	<script src="https://openlayers.org/en/v4.6.5/build/ol.js" type="text/javascript"></script>


	<script>
		/* OSM & OL example code provided by https://mediarealm.com.au/ */
		var map;
		var mapLat = 3.1495;
		var mapLng = 101.6956;
		var mapDefaultZoom = 5;

		function initialize_map() {
			map = new ol.Map({
				target: "map",
				layers: [
					new ol.layer.Tile({
						source: new ol.source.OSM({
							url: "https://a.tile.openstreetmap.org/{z}/{x}/{y}.png"
						})
					})
				],
				view: new ol.View({
					center: ol.proj.fromLonLat([mapLng, mapLat]),
					zoom: mapDefaultZoom
				})
			});
		}

		function add_map_point(lat, lng) {
			var vectorLayer = new ol.layer.Vector({
				source: new ol.source.Vector({
					features: [new ol.Feature({
						geometry: new ol.geom.Point(ol.proj.transform([parseFloat(lng), parseFloat(lat)], 'EPSG:4326', 'EPSG:3857')),
					})]
				}),
				style: new ol.style.Style({
					image: new ol.style.Icon({
						anchor: [0.5, 0.5],
						anchorXUnits: "fraction",
						anchorYUnits: "fraction",
						src: "https://upload.wikimedia.org/wikipedia/commons/e/ec/RedDot.svg"
					})
				})
			});

			map.addLayer(vectorLayer);
		}
	</script>

</head>

<body onload="initialize_map(); add_map_point(1.5831732, 110.3250599);add_map_point(3.0408403, 101.7940985);add_map_point(5.3600702, 100.3946396);">
	<div style="margin: 20px"> </div>
	<div id="map" style="width: 70vw; height: 70vh; margin: auto; ">
	</div>

</body>

