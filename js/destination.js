// get needed elements
console.log("destination.js is already!");
let selector_country = document.querySelector("form select.country");
let selector_destination = document.querySelector("form select.destination");
function changeCountry() {
    let theAction = "function/ajaxmanager.php";
    let c_id = selector_country.value;
    console.log(c_id);
    console.log(theAction);
    removeAllDestination(selector_destination);
    destinationAjax(c_id, theAction);
};

function destinationAjax(country, theAction) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", theAction, true);
    console.log(country);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if (this.status == 200) {
            console.log(this);
            let destinations = JSON.parse(this.responseText);
            outputDestination(destinations);
        }
    }
    xhr.send("country="+country);
}

function outputDestination(destinations) {
    destinations.forEach(function(item) {
        console.log(item.name);
        let option = document.createElement("option");
        option.text = item.name;
        selector_destination.add(option);
    });
}

function removeAllDestination(select) {
    var length = select.options.length;
for (i = length-1; i >= 0; i--) {
  select.options[i] = null;
}
}