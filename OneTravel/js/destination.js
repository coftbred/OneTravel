// get needed elements
console.log("destination.js is already!");
let selector_country = document.querySelector("form select.country");
let selector_destination = document.querySelector("form select.destination");
function changeCountry() {
    let theAction = "function/ajaxmanager.php";
    let country = selector_country.value;
    console.log(country);
    console.log(theAction);
    destinationAjax(country, theAction);
};

function destinationAjax(country, theAction) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", theAction, true);

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
    destinations.forEach(element => {
        console.log("A:"+element);
        let option = document.createElement("option");
        option.text = element;
        selector_destination.add(option);
    });
}