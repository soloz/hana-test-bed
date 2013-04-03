<html>
    <head><title>Address</title>
    
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyDpnzQMCS_DvYXhzOZuYK921Ou7_vu8z3U&sensor=false"
            type="text/javascript"></script>
    <script type="text/javascript">

    function initialize() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map_canvas"));
        map.setCenter(new GLatLng(<?php echo $address['LATITUDE']; ?>, <?php echo $address['LONGITUDE']; ?>), 10);
        map.setMapType(G_NORMAL_MAP);
        map.setUIToDefault();
      }
    }

    </script>
    
    </head>
    <body onload="initialize()" onunload="GUnload()">

        <?php
        if (isset($address['BUILDING_NAME_ONE'])) {
            echo $address['BUILDING_NAME_ONE'];
            echo "<br>";
        }

        if (isset($address['BUILDING_NAME_TWO'])) {
            echo $address['BUILDING_NAME_TWO'];
            echo "<br>";
        }
        if (isset($address['BUILDING_NO'])) {
            echo $address['BUILDING_NO'];
            echo ",";
        }
        if (isset($address['STREET_NAME_ONE'])) {
            echo $address['STREET_NAME_ONE'];
            echo ",";
        }
        if (isset($address['STREET_NAME_TWO'])) {
            echo $address['STREET_NAME_TWO'];
            echo "<br>";
        }

        if (isset($address['AREA'])) {
            echo $address['AREA'];
            echo ",";
        }
        if (isset($address['LOCAL_GOVT_AREA'])) {
            echo $address['LOCAL_GOVT_AREA'];
        }

        if (isset($address['STATE'])) {
            echo $address['STATE'];
            echo "<br>";
        }

        if (isset($address['COUNTRY'])) {
            echo $address['COUNTRY'];
        }
        ?>
        <hr>

        <div id="map_canvas" style="width: 500px; height: 300px"></div>


    </body>
</html>