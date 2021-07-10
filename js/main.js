let x = document.getElementById("login");
let y = document.getElementById("register");
let z = document.getElementById("btn");

function register() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";
}

function login() {
    x.style.left = "50px";
    y.style.left = "480px";
    z.style.left = "0px";
}


let theform = document.querySelector("form.comment-form");
let thecomment = document.querySelector(".comment-form textarea");
let hiddeninput = document.querySelector(".comment-form input");
let commentsdiv = document.querySelector(".comments_before");
let commentcard = document.querySelectorAll(".card");

// add event listener, prevent default submission and get
//textarea value

theform.addEventListener("submit", function(event) {
  event.preventDefault();
  let comment = thecomment.value;
  let postid = hiddeninput.value.split("=");
  let theaction = "function/ajaxmanager.php";
  console.log(postid[1]);
  commentAjax(comment, postid[1], theaction)
  theform.reset();
})

commentcard.forEach((card, i) => {
  card.addEventListener("click", function(e) {
    e.preventDefault();
    console.log("click");
    if(e.target.classList.contains("delete-comment")){
      console.log("delete");
      let comment_id = e.target.parentNode.getAttribute("data-comment-number");
      let post_id = e.target.parentNode.getAttribute("data-post-id");
      let par = e.target.parentNode.parentNode.parentNode;
      console.log(par);
          
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "function/ajaxmanager.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onload = function() {
        console.log("??");
        if (this.status == 200) {
          console.log("1");
            console.log("hello");
            par.classList.add("shrinkStart");
            setTimeout(function(){
              par.classList.add("shrinkFinish");
              par.remove();
            },300);
        
        }
      }
      xhr.send("delete-comment=true&comment_id="+comment_id)+"&post_id="+post_id;
    }
    console.log(e);
  })

});


// ajax request

function commentAjax(comment, postid, theaction) {

  let xhr = new XMLHttpRequest();
  xhr.open("POST", theaction, true);
  // to use the post method we must set the request headers
  // depending on the form data being sent
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    if(this.status == 200) {
        console.log(this);
        let new_comment = JSON.parse(this.responseText);
        console.log(new_comment[0]);
        outputNewComment(new_comment[0]);
        commentcard = document.querySelectorAll(".card");
        commentcard.forEach((card, i) => {
          card.addEventListener("click", function(e) {
            e.preventDefault();
            console.log("click");
            if(e.target.classList.contains("delete-comment")){
              console.log("delete");
              let comment_id = e.target.parentNode.getAttribute("data-comment-number");
              let post_id = e.target.parentNode.getAttribute("data-post-id");
              let par = e.target.parentNode.parentNode.parentNode;
              console.log(par);
                  
              let xhr = new XMLHttpRequest();
              xhr.open("POST", "function/ajaxmanager.php", true);
              xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhr.onload = function() {
                console.log("??");
                if (this.status == 200) {
                  console.log("1");
                    console.log("hello");
                    par.classList.add("shrinkStart");
                    setTimeout(function(){
                      par.classList.add("shrinkFinish");
                      par.remove();
                    },300);
                
                }
              }
              xhr.send("delete-comment=true&comment_id="+comment_id)+"&post_id="+post_id;
            }
            console.log(e);
          })
        
        });
    }
  }

  xhr.send("comment="+comment+"&post_id="+postid);
}

// General function
function outputNewComment(output) {
  
  let theoutput = `
  <div class="col-md-6 offset-md-3 mt-5 mb-4" style='height: auto;'>
    <div class="card">
      <div class="card-header">
      ${output.username} | ${output.date_created}  
      <a href='#' data-comment-number='${[output.id]}' data-post-id='${[output.post_id]}'><button class='delete-comment float-right btn btn-outline-danger btn-sm'>X</button></a>                           
      </div>
      <div class="card-body">
        <p class="card-text">${output.comment_content}</p>
      </div>
    </div>
  </div>`;
  console.log("theoutput:");
  console.log(theoutput);
  commentsdiv.insertAdjacentHTML("afterbegin", theoutput);

}

// var firebaseConfig = {
//     apiKey: "AIzaSyA55mIlkOxKiuZGSDp-UFWVJYCQmXW-o8E",
//     authDomain: "eter-travel.firebaseapp.com",
//     databaseURL: "https://eter-travel-default-rtdb.firebaseio.com",
//     projectId: "eter-travel",
//     storageBucket: "eter-travel.appspot.com",
//     messagingSenderId: "695118776445",
//     appId: "1:695118776445:web:53a322886b47c0daa80914",
//     measurementId: "G-6FSWMJH3TV"
//   };
//   // Initialize Firebase
// firebase.initializeApp(firebaseConfig);
// firebase.database();
// firebase.analytics();
//
// //  FUNCTION FOR SIGN UP BUTTON.
// document.querySelector("#sign-up").addEventListener("click", function (e) {
//     e.preventDefault();
//     if (!isEmptyUsername()) {
//       return false;
//     }
//     if (!isSameAsPassword()) {
//       return false;
//     }
//     let auth = firebase.auth();
//     let promise = auth.createUserWithEmailAndPassword(getId("email-field"),getId("password-field"));
//     promise
//     .catch(e => alertUser("info", e.message));
//     firebase.auth().onAuthStateChanged(function(user) {
//       if (user) {
//         user.updateProfile({
//           displayName: getId("username-field")
//         })
//         .then(alertUser("info", "Congratulation!!! You Do It successfully."))
//         .catch(function(error) {
//           console.log(error + "dslakfjasdklfjdasklfjd");
//         })
//       } else {
//         console.log("nothing");
//       }
//     });
// });
//
//   //  FUNCTION FOR SIGN IN BUTTON
// document.querySelector("#sign-in").addEventListener("click", function(e) {
//     e.preventDefault();
//     firebase.auth().signInWithEmailAndPassword(getId("email-sign-in"), getId("password-sign-in"))
//     .then((userCredential) => {
//         let user = userCredential.user;
//         alertUser("info", "Login succesfully.");
//     })
//     .catch((error) => {
//         let errorCode = error.code;
//         let errorMessage = error.message;
//         alertUser("info", errorMessage);
//     })
// });

  //  GET VALUE OF INPUT
// function getId(id) {
//     return document.getElementById(id).value;
// };
//
//
//   // CHECK EMPTY IN FORM
// function isEmptyUsername() {
//     if (getId("username-field") == "") {
//       alertUser("info", "The Username is badly formatted");
//       return false;
//     }
//     return true;
// }
//
// function isSameAsPassword() {
//     if (getId("password-field") != getId("confirm-password-field")) {
//       alertUser("info", "The confirm password is badly formatted");
//       return false;
//     }
//     return true;
// }
//
//   // Helper functions
// function alertUser(theclass, msg) {
//     let thealert = document.querySelector(".alert");
//     let form = document.querySelectorAll(".input-group");
//     form[0].style.top = "175px";
//     form[1].style.top = "175px";
//     thealert.classList = "alert info alert-" + theclass;
//     thealert.innerText = msg;
//     thealert.style.display = "block";
//     setTimeout(()=> {
//         thealert.style.display = "none";
//         form[0].style.top = "135px";
//         form[1].style.top = "135px";
//     }, 2000);
// };
//
// function fadeIn(el) {
//     el.style.display = "initial";
//     setTimeout(function() {
//       el.style.opacity = "1";
//     }, 10);
// };
//
// function fadeOut(el,remove = false) {
//     el.style.opacity = "0";
//     setTimeout(function() {
//       if(remove = true) {
//         el.remove();
//       } else {
//         el.style.display = "none";
//       }
//     }, 300);
// };
