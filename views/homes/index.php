<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page_specific_style") ?>

<link rel="stylesheet" href="/css/style1.css">

<?php $this->stop() ?>


<?php $this->start("page_content") ?>



<div class="section1 height">
  <div class="row">

  <?php
  $count = 0;
  foreach($users as $user):
    if (isset($_SESSION['gender']) and $_SESSION['gender'] === "male" and $user->gender === "male") {
      continue;
    }
    if (isset($_SESSION['gender']) and $_SESSION['gender'] === "female" and $user->gender === "female") {
      continue;
    }
    $images = $user->images()->get();
    foreach($images as $image):
      if ($count == 4) {
        break;
      }
  ?>

    <div class="col-sm-3 p-2 mt-5">
      <div class="card text-center" style="width:100%">
        <img class="card-img-top" src="<?=$this->e($image->img_url) ?>" alt="Card image" height="250px" width="150px">
        
      <div class="card-body">
          <h4 class="card-title">

            <?php if ($user->gender === 'male'): ?>
                <img src="/img/home/male.png" alt="male" height="25px" width="25px">
            <?php else: ?>
                <img src="/img/home/female.png" alt="female" height="25px" width="25px">
            <?php endif ?>
            
            <?=$this->e($user->name) ?>
          </h4>
          
          <p class="card-text">
             <b>My biography:</b> <br> 
            <?=$this->e($user->biography) ?>
          </p>
          <p class="card-text">
            <b>My hobbies:</b> <br>
            <?=$this->e($user->hobby) ?>
            <?php 
              $count = $count + 1;
            ?>
          </p>
            <a href="/" class=" btn btn-primary">See more</a>
        </div>



      </div>
    </div>

  <?php 
    endforeach;
  endforeach;

    ?>
  </div>
</div>

<div class="section2">
    <div class="row">
      <div class="sm col-sm-4">
        <img class="logo" src="/img/home/logo1.png"/>
        <div class="smtit"> Global</div>
        <div class="des">You never know where you'll find love.</div>
      </div>

      <div class="sm col-sm-4">
        <img class="logo" src="/img/home/logo2.png"/>
        <div class="smtit"> Exciting</div>
        <div class="des">A world of possibility is waiting for you.</div>
      </div>

      <div class="sm col-sm-4">
        <img class="logo" src="/img/home/logo3.png"/>
        <div class="smtit"> Modern</div>
        <div class="des">The most modern way of finding romance online.</div>
      </div>

    </div>

    <div class="ava">
      <img class="dot" src="/img/home/ava1.png" onclick="currentSlide(1)">
      <img class="dot" src="/img/home/ava2.png" onclick="currentSlide(2)">
      <img class="dot" src="/img/home/ava3.png" onclick="currentSlide(3)"> 
    </div>
    
    <br>
      
    <div class="slideshow-container">

      <div class="mySlides fade">

        <blockquote class="w3-panel">
          <p class="w3-large"><i>"It is really cool to meet different people who come from different backgrounds than your own but have similar interests and values."</i></p>
          <p>Tom</p>
        </blockquote> 
              
      </div>

      <div class="mySlides fade">
            
        <blockquote class="w3-panel">
          <p class="w3-large"><i>"Dating.com brings out the sense of adventure in me! The website is so easy to use and the possibility of meeting someone from another culture that relates to me is simply thrilling."</i></p>
          <p>Michelle</p>
        </blockquote> 
            
      </div>

      <div class="mySlides fade">
              
        <blockquote class="w3-panel">
          <p class="w3-large"><i>"My dating prospects in Tennessee were getting pretty poor, so I decided to try dating globally… I met Olivier from France on Dating.com and we can’t stop messaging each other!"</i></p>
          <p>Whitney</p>
        </blockquote> 

      </div>

    </div>

    <div class="bg1">
            <div class="textinside">Dating isn’t about data. It isn’t about algorithms. It isn’t about how many friends you have in common, or whether you want a boy or a girl or no kids at all, it isn’t about how tall someone is or the color or their hair, and it isn’t about finding "the one". Dating is a chance — a chance to meet someone new, a chance for them to introduce you to people, places and things that you never knew that you’d love. It’s the chance that you won’t like them and that they won’t like you. And it’s the chance that they will and that you will too. It’s the chance to spend time together — maybe a lifetime but maybe just an hour. It’s the chance to meet anyone, anywhere in the world. It’s the chance that there might be more out there, something you’ve never even imagined.
            </div>
            <a href="/register" class="btn1"><b>Are you ready to take a chance?</b></a>
    </div>

  </div>
</div>

<a href="#" id="myBtn" onclick="topFunction()" >^</a>

<?php $this->stop() ?>


<?php $this->start("page_specific_js") ?>

<script>

var span = document.getElementsByClassName("close1")[0];

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
//back to top button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}




//carousel
var slideIndex = 1;
showSlides(slideIndex);


function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

<?php $this->stop() ?>