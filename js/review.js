
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
document.addEventListener("DOMContentLoaded", () => {
    let review = document.querySelectorAll(".review");
    var i = 0;

    getData(0);
    getData(1);
    getData(2);

    let repeating = setInterval(() => {
        getData(i);
        i++;
        if (i == 3) {
            i = 0;
        }
    },5000);

    function getData(i) {
        let xhr = new XMLHttpRequest();
        xhr.open (
            "GET",
            "https://randomuser.me/api",
            true
        );
        xhr.onload = function()  {
            if(this.status === 200) {
                let info = JSON.parse(this.responseText);
                fetchUser(info, i);
            }
        }
        xhr.send();
    };

    function fetchUser(info, i) {
        let request = fetch("https://jsonplaceholder.typicode.com/posts/1/comments")
            .then(function(result) {
                // console.log(result.status);
                return result.json();
            })
                .then(function (data) {
                    console.log(info);
                    console.log(data);
                    generateHTML(info, data, i)
                });
    }

    function generateHTML (info, comment, i) {
        let user = info.results[0];
        let output = `
            <img src="${user.picture.large}" class="rounded-circle ${user.gender}">
            <h3> ${user.name.first} ${user.name.last} </h3>
            <h4 class="font-weight-light"> ${user.location.city}, ${user.location.country} </h4>
            <p><em> ${user.email}</em></p>
            <p>${comment[i].body}</p>
        `;
        review[i].innerHTML = output;
    }

});
