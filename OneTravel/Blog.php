<?php
  include 'config.php';
  include 'function/postmanager.php';
  include 'includes/header.php';



 ?>

  <div class="container ">
      <a href="create.php" class="btn btn-primary">CREATE BLOG</a>
  </div>

   <div class="container-fluid pr-0 pl-0"> <!-- slide show -->
       <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
           <div class="carousel-item active">
             <img class="d-block w-100 vh-100" src="https://webunwto.s3.eu-west-1.amazonaws.com/2020-04/restrction.jpg" alt="First slide" >
             <div class="carousel-caption d-none d-md-block">
               <div class="container mb-5">
                 <div class="title mb-5">
                   <h2>NEVER STOP EXPLORING</h2>
                 </div>
                 <div class="title-content">
                     <h3>Remember that happiness is a way of travel, not a destination.</h3>
                 </div>
               </div>
               <button type="button" name="button" class="btn btn-outline-primary btn-lg mt-5 mb-5 w-25 text-dark">Join Now</button>
             </div>
           </div>
           <div class="carousel-item">
             <img class="d-block w-100 vh-100" src="https://www.visittheusa.com/sites/default/files/styles/hero_l_x2/public/images/hero_media_image/2020-01/55625952-6814-4167-bb9a-89f6a6cd08ca.jpeg?itok=iTIItvD0" alt="Second slide">
             <div class="carousel-caption d-none d-md-block">
               <div class="container mb-5">
                 <div class="title mb-5">
                   <h2>COVER THE EARTH BEFORE IT COVERS</h2>
                 </div>
                 <div class="title-content">
                     <h3>The world is a book and those who do not travel read only one page.</h3>
                 </div>
               </div>
               <button type="button" name="button" class="btn btn-outline-primary btn-lg mt-5 mb-5 w-25 text-dark">Join Now</button>
             </div>
           </div>
         </div>
         <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
         </a>
     </div>
   </div> <!-- end of slide show -->

  <!-- SHOW POST (MOI LAM NE) -->
  <div class="container">
    <h2>Recent Post</h2>
    <hr>
    <div class="row align-item-center">
      <?php 
        $posts = getPosts(12, $conn);
        echo outputPosts($posts);
      ?>
    </div>
  </div>


 <div class="container pb-5">
   <div class="title">
     <h3>Welcome To Our Blog</h3>
     <h4>Some TRENDING Question</h4>
   </div>
     <div id="carouselControls" class="carousel slide" data-ride="carousel">
     <div class="carousel-inner">
       <div class="carousel-item active">
         <div class="container">
           <div class="row">
             <div class="col-md-4">
               <img src="https://images.unsplash.com/photo-1503457574462-bd27054394c1?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mjd8fHxlbnwwfHx8&auto=format&fit=crop&w=600&q=60" alt="" class="img-fluid-post">
               <h5>How to plan your vacation?</h5>
             </div>
             <div class="col-md-4">
               <img src="https://images.unsplash.com/photo-1498307833015-e7b400441eb8?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8NDF8fHxlbnwwfHx8&auto=format&fit=crop&w=600&q=60" alt=""class="img-fluid-post">
               <h5>How is the traffic & comute in Europe?</h5>
             </div>
             <div class="col-md-4">
               <img src="https://images.unsplash.com/photo-1522509585149-c9cd39d1ff08?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8NDR8fHxlbnwwfHx8&auto=format&fit=crop&w=600&q=60" alt="" class="img-fluid-post">
               <h5>How to go from the airport to the city center?</h5>
             </div>
           </div>
       </div>
     </div>
       <div class="carousel-item">
         <div class="container">
           <div class="row">
             <div class="col-md-4">
               <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8NDh8fHxlbnwwfHx8&auto=format&fit=crop&w=600&q=60" alt="" class="img-fluid-post">
               <h5>Flight & Hotel booking like?</h5>
             </div>
             <div class="col-md-4">
               <img src="https://images.unsplash.com/photo-1534777367038-9404f45b869a?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8NTd8fHxlbnwwfHx8&auto=format&fit=crop&w=600&q=60" alt=""class="img-fluid-post" >
               <h5>what's the best way to get around Dubai?</h5>
             </div>
             <div class="col-md-4">
               <img src="https://images.unsplash.com/photo-1418854982207-12f710b74003?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8NjR8fHxlbnwwfHx8&auto=format&fit=crop&w=600&q=60" alt=""class="img-fluid-post">
               <h5>What is a good beach resort and hotel?</h5>
             </div>
           </div>
       </div>
       </div>
     </div>
     <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
     </a>
     <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
     </a>
   </div>
 </div>


 <div class="container">
   <div class="row">
     <div class="col-lg-8">
       <div class="container-fluid">
         <div class="title">
           <h5>All Posts</h5>
         </div>
         <div class="box">
           <img src="https://images.unsplash.com/photo-1529108469036-00d2d7d6fd51?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MTE4fHx8ZW58MHx8fA%3D%3D&auto=format&fit=crop&w=600&q=60" alt="" >
           <div class="btn1">
             <button type="button" class="btn btn-link">How to Plan Your Vacation?</button>
           </div>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
           <div class="btn2">
             <button type="button" class="btn btn-outline-danger">Read More This Post</button>
           </div>
         </div>
       </div>
     <div class="container-fluid">
       <div class="box">
         <img src="https://images.unsplash.com/photo-1498307833015-e7b400441eb8?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8NDF8fHxlbnwwfHx8&auto=format&fit=crop&w=600&q=60" alt="">
         <div class="btn1">
           <button type="button" class="btn btn-link">How is the traffic & comute in Europe?</button>
         </div>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
         <div class="btn2">
           <button type="button" class="btn btn-outline-danger">Read More This Post</button>
         </div>
       </div>
     </div>
       <div class="container-fluid">
         <div class="box">
           <img src="https://images.unsplash.com/photo-1539635278303-d4002c07eae3?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MTA5fHx8ZW58MHx8fA%3D%3D&auto=format&fit=crop&w=600&q=60" alt="">
           <div class="btn1">
             <button type="button" class="btn btn-link">What is a good beach resort and hotel?</button>
           </div>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
           <div class="btn2">
             <button type="button" class="btn btn-outline-danger">Read More This Post</button>
           </div>
         </div>
       </div>
     </div>
       <div class="col-lg-4">
         <div class="search">
           <h1>Search</h1>
           <div class="input-group mt-5">
             <input type="text" class="form-control" placeholder="Search...">
             <div class="input-group-append">
               <button type="submit" class = "input-group-text tbn">Search</button>
             </div>
           </div>
         </div>
         <div class="Categories">
           <h1>Categories</h1>
           <li class="list-group-item"><button type="button" class="btn btn-link">Group & Solo Trips</button></li>
           <li class="list-group-item"><button type="button" class="btn btn-link">New Trips</button></li>
           <li class="list-group-item"><button type="button" class="btn btn-link">Our Stories</button></li>
           <li class="list-group-item"><button type="button" class="btn btn-link">Travel Guide</button></li>
         </div>
           <div class="lastednews">
             <h1>Lasted News</h1>
             <div class="img1">
               <img src="https://images.unsplash.com/photo-1505164294036-5fad98506d20?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8ODR8fHxlbnwwfHx8&auto=format&fit=crop&w=600&q=60" alt="" width="250px">
               <button type="button" class="btn btn-link">Cafe&Restaurant Guide for European Tours</button>
             </div>
             <div class="img1">
               <img src="https://images.unsplash.com/photo-1472806679307-eab7abd1eb32?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8ODd8fHxlbnwwfHx8&auto=format&fit=crop&w=600&q=60" alt="" width="250px">
               <button type="button" class="btn btn-link">Cafe&Restaurant Guide for European Tours</button>
             </div>
           </div>
           <div class="populartaps">
             <h1>Popular Taps</h1>
             <button type="button" class="btn btn-outline-dark">Advice</button>
             <button type="button" class="btn btn-outline-dark">America</button>
             <button type="button" class="btn btn-outline-dark">audio</button>
             <button type="button" class="btn btn-outline-dark">calender</button>
             <button type="button" class="btn btn-outline-dark">date</button>
             <button type="button" class="btn btn-outline-dark">Europe</button>
             <button type="button" class="btn btn-outline-dark">gallery</button>
             <button type="button" class="btn btn-outline-dark">guide</button>
             <button type="button" class="btn btn-outline-dark">Stories</button>
           </div>
           <div class="comments pb-2 pt-2">
             <h1>Comments</h1>
             <h2>John</h2>
             <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</h3>
             <h2>Katty</h2>
             <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</h3>
           </div>
         </div>
     </div>
   </div>
   <div class="container">
     <hr>
     <hr>
   </div>

     <div class="container-fluid mt-5">
       <h3 class="outline">Review</h3>
       <div class="container">
         <div class="row">
           <div class="col-md-4 col-sm-12 review">
           </div>
           <div class="col-md-4 col-sm-12 review">
           </div>
           <div class="col-md-4 col-sm-12 review">
           </div>
         </div>
       </div>
   </div>

 <?php
 include 'includes/footer.php';
  ?>
