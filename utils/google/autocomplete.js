/******************GOOGLE PLACE AUTOCOMPLETE*****************/
var placeSearch, autocomplete;
         function AddressInitialize(bounds) {
             // Create the autocomplete object, restricting the search
             // to geographical location types.
             autocomplete = new google.maps.places.Autocomplete(
             /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
               { types: ['geocode'] });
               if(bounds!==''){
                autocomplete.setBounds(bounds);   
               }
         }
         // Bias the autocomplete object to the user's geographical location,
         // as supplied by the browser's 'navigator.geolocation' object.
         function geolocate() {
             if (navigator.geolocation) {
                 navigator.geolocation.getCurrentPosition(function (position) {
                     var geolocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                     var circle = new google.maps.Circle({
                         center: geolocation,
                         radius: position.coords.accuracy
                     });
                     var bounds = circle.getBounds();
                     return bounds;
                 });
             }
         }
         AddressInitialize(geolocate());
/********************************************************************************************************/
