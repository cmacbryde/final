let map;

function addMarker(props){
    var marker = new google.maps.Marker({
        map: map,
        position: props.coords
    });

    if(props.content) {
        var infoWindow = new google.maps.InfoWindow({
            content: props.content
        });

        marker.addListener('click', function(){
            infoWindow.open(map, marker);
        });
    }
}

async function initMap() {
    const { Map } = await google.maps.importLibrary("maps");

    map = new Map(document.getElementById("map"), {
        center: { lat: 40.4168, lng: 3.7038 },
        zoom: 2,
    });

    //Seattle, WA
    addMarker({
        coords: {lat: 47.656347, lng: -122.312652},
        content: '<h2>Seattle, WA</h2>'
    });

    //Danville, CA
    addMarker({
        coords: {lat: 37.821593	, lng: -121.999961},
        content: '<h2>Danville, CA</h2>'
    });

    //Los Altos, CA 
    addMarker({
        coords: {lat: 37.3519579, lng: -122.08603},
        content: '<h2>Los Altos, CA</h2>'
    });

    //Kuala Lumpur, Malaysia
    addMarker({
        coords: {lat: 2.7433, lng: 101.6979},
        content: '<h2>Kuala Lumpur, Malaysia</h2>'
    });

    //Medford, MA
    addMarker({
        coords: {lat: 42.408097, lng: -71.118203},
        content: '<h2>Medford, MA</h2>'
    }); 
}

initMap();
