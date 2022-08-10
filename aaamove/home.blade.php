@extends('layouts.header')

@section('title', 'Page Title')

@section('content')
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="https://openlayers.org/en/v4.6.5/css/ol.css" type="text/css">
  <script src="https://openlayers.org/en/v4.6.5/build/ol.js" type="text/javascript"></script>

  <style>
    .reportBtn {
      display: flex;
      justify-content: left;
      margin: 10px;
      text-align: center;
    }

    .reportButton {
      margin: auto;
    }

    .reportPopup {
      position: relative;
      text-align: left;
      width: 100%;
    }

    .formPopup {
      display: none;
      position: fixed;
      left: 45%;
      top: 5%;
      transform: translate(-50%, 5%);
      border: 3px solid #999999;
      z-index: 9;
    }

    .formContainer {
      max-width: 300px;
      padding: 20px;
      background-color: #fff;
    }

    .formContainer input[type=text],
    .formContainer input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 20px 0;
      border: none;
      background: #eee;
    }

    .formContainer input[type=text]:focus,
    .formContainer input[type=date]:focus {
      background-color: #ddd;
      outline: none;
    }

    .formContainer .btn {
      padding: 12px 20px;
      border: none;
      background-color: #8ebf42;
      color: #fff;
      cursor: pointer;
      width: 100%;
      margin-bottom: 15px;
      opacity: 0.8;
    }

    .formContainer .cancel {
      background-color: #cc0000;
    }

    .formContainer .btn:hover,
    .reportButton:hover {
      opacity: 1;
    }
  </style>
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

    function openForm() {
      document.getElementById("popupForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("popupForm").style.display = "none";
    }
  </script>
</head>

<body onload="initialize_map(); add_map_point(1.5831732, 110.3250599);add_map_point(3.0408403, 101.7940985);add_map_point(5.3600702, 100.3946396);">
  <div style="margin: 20px"> </div>
  <div id="map" style="width: 70vw; height: 70vh; margin: auto; "></div>

  <div class="reportBtn">
    <button class="reportButton" onclick="openForm()"><strong>Report Incident</strong></button>
  </div>
  <div class="reportPopup">
    <div class="formPopup" id="popupForm">
      <form action="addReport" method="POST" class="formContainer">
        @csrf
        <h2>Report Incident</h2>
        <label for="event">
          <strong>Event Type</strong>
        </label>
        <select name="event" id="event">
          <option value="flood"> Flood </option>
          <option value="landslide"> Landslide </option>
          <option value="forestfire"> Forest Fire </option>
          <option value="others"> Others </option>
        </select>
        <br>
        <br>
        <br>
        <label for="location">
          <strong>Location</strong>
        </label>
        <input type="text" id="location" name="location" required>
        <br>
        <label for="date">
          <strong>Date</strong>
        </label>
        <input type="date" id="date" name="date" required>
        <br>
        <br>
        <label for="time">
          <strong>Time</strong>
        </label>
        <input type="time" id="time" name="time" required>
        <br>
        <label for="remark">
          <strong>Remark</strong>
        </label>
        <input type="text" id="remark" name="remark" required>
        <br>
        <br>
        <button type="submit" class="btn">Submit report</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </form>
    </div>
  </div>
</body>

</html>
@stop