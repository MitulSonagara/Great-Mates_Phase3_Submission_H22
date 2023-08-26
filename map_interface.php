<!DOCTYPE html>
<html>
<head>
    <title>Map Interface</title>
    <style>
        /* Set the size of the map container */
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h2>Map Interface</h2>
    
    <!-- Map container -->
    <div id="map"></div>

    <!-- Include the Google Maps JavaScript API with your API key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

    <script>
        // Initialize the map
        function initMap() {
            // Create a map object and specify the DOM element for display
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 0, lng: 0}, // Initial map center (latitude and longitude)
                zoom: 8 // Initial zoom level
            });

            // Example marker
            var marker = new google.maps.Marker({
                position: {lat: 0, lng: 0}, // Marker position (latitude and longitude)
                map: map, // Specify the map to which this marker should be added
                title: 'Marker Title' // Marker title (displayed when clicked)
            });

            // You can add more markers, polygons, or other map elements as needed
        }
    </script>
</body>
</html>
