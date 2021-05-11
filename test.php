<!DOCTYPE html>
<html>

<body>

    <p>Click the button to get your coordinates.</p>



    <script>
 

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
       var Lat = position.coords.latitude;
       var Long = position.coords.longitude;
       console.log(Lat, Long);
    }
    </script>

    <?php
        echo '<script> getLocation(); </script>';
        echo '<script>    console.log(Lat, Long); </script>';
      
    ?>

</body>

</html>