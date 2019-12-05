<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> <?=$this->e($title)?> </title>
  <link rel="icon" href="/img/icon1.ico">

  <!-- Style -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/78f047f4c8.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/layout.css">

  <?=$this->section("page_specific_style") ?>
</head>
<body>

  <!-- Main navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand ml-5" href="/">
      <img class="" src="/img/logo.png" alt="soundbox logo" srcset="" width="100" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
      
      <!-- Tricky life -->
      <div class="mr-auto"></div>

      <div class="" style="width: 500px">
        <form action="/search" method="POST" class=" my-2 my-lg-0 input-group" style="width: 440px">
          <input class="form-control" type="search" placeholder="Type in name or hobby or gender to search..." aria-label="Search" name="search">
          <div class="input-group-append">
          <button type="submit"class="btn btn-light" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </form>
        
        </div>
      </div>

      <?php if (!isset($_SESSION['user_name'])): ?>
      
      <div class="ml-auto">
        <a class="text-light btn" href="/login">Login</a>
        <span class="text-light">/ </span>
        <a class="text-light btn" href="/register">Register</a>
      </div>
      
      <?php endif; ?>

      <?php if (isset($_SESSION['user_name'])): ?>
    
      <div class="ml-auto dropdown mr-5">
        <a class="text-light btn cursor" data-toggle="dropdown" role="button" aria-haspopup="true">
          <?php echo $_SESSION['user_name'] ?>
        </a>
        <div class="dropdown-menu">
        
          <?php if (isset($_SESSION['admin'])): ?>
          <a href="/admin" class="dropdown-item">Admin panel</a>
          <?php endif; ?>

          <a href="/" class="dropdown-item">Personal page</a>
          <a href="/logout" class="dropdown-item">Logout</a>
        </div>

      </div>

      <?php endif; ?>

    </div>
  </nav>

  <div class="extra">
  <!-- Page content -->
  <?=$this->section("page_content") ?>

  </div>
  <!-- Footer -->

  <footer class="bg-dark d-flex">
    <div class="ml-5">
      <a href="/">
        <img class="mt-3" src="/img/logo.png" width="125" height="60" alt="">
      </a>
    </div>
    <div class="ml-auto my-auto mr-2">
      <p class="text-light mt-2">Copyright &copy; Dating.com 2019. All right reserved</p>
      <p class=" text-light">Made by Duong Nguyen Hoang Minh and Tran Ngoc Minh</p>
    </div>
    
  </footer>   
  
  
  
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  <?=$this->section("page_specific_js") ?>
</body>
</html>