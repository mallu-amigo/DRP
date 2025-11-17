document.getElementById('location_btn').addEventListener('click', function () {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function (position) {
                let latitude = position.coords.latitude;
                let longitude = position.coords.longitude;
                let locationField = document.getElementById('location');

                // Store only lat, long
                locationField.value = `${latitude}, ${longitude}`;
                locationField.setAttribute('data-auto', 'true'); // Mark as auto-filled
                document.getElementById('location_btn').disabled = true;

                // ❌ No Google Maps opening!
                console.log("Fetched Location:", latitude, longitude);
            },
            function (error) {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        alert("Permission denied. Please allow location access.");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        alert("Location information is unavailable.");
                        break;
                    case error.TIMEOUT:
                        alert("Location request timed out. Try again.");
                        break;
                    default:
                        alert("An unknown error occurred.");
                }
            },
            { enableHighAccuracy: true }
        );
    } else {
        alert("Geolocation is not supported by your browser.");
    }
});


// Disable "Select Current Location" button if user manually types a place name
document.getElementById('location').addEventListener('input', function () {
    let locationBtn = document.getElementById('location_btn');
    let locationField = document.getElementById('location');

    // If the user types manually (place name), disable the button
    if (locationField.value.trim() !== "" && !locationField.hasAttribute('data-auto')) {
        locationBtn.disabled = true;
    } else {
        locationBtn.disabled = false;
    }
});
