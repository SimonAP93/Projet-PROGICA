/*

 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';
import Places from 'places.js';

//Autocomplete for addresses
let inputAddress = document.querySelector('#gite_address');

if(inputAddress !== null){

    let place = Places({
        container: inputAddress
    })

    place.on('change', function(e){
        document.querySelector('#gite_city').value = e.suggestion.city
        document.querySelector('#gite_postalCode').value = e.suggestion.postcode
        document.querySelector('#gite_lat').value = e.suggestion.latlng.lat
        document.querySelector('#gite_lng').value = e.suggestion.latlng.lng
    })
};


//timeout for alert messages
var flash = document.querySelector('.flash');

if(flash){
    setTimeout(function(){
        flash.style.display = 'none';
    }, 2000)
};


