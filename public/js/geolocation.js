function post(path, params, method) { // generuje formularz
    method = method || "post"; 

    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit(); // wyslanie
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolokalizacja nie jest wspierana przez tą przeglądarkę.");
    }
}

function showPosition(position) { //formularz z pozycja 
    /* alert(""Szerokość: " + position.coords.latitude + 
        "<br>Długość: " + position.coords.longitude"); */
    
    post("/location/", {longitude: position.coords.longitude, latitude: position.coords.latitude}, "get");
}
