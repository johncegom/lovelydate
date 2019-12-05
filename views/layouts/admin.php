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
  <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <a class="navbar-brand ml-5" href="/admin">
      Admin Panel
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
    

      <?php if (isset($_SESSION['user_name'])): ?>
    
      <div class="ml-auto dropdown mr-5">
        <a class="btn cursor" data-toggle="dropdown" role="button" aria-haspopup="true">
        <?php echo $_SESSION['user_name'] ?>
        </a>

        <div class="dropdown-menu">
          <a href="/" class="dropdown-item">Home</a>
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

  <footer class="footer d-flex bg-secondary">
    <div class="ml-5">
      <a href="/">
        <img class="mt-3" src="/img/logo.png" width="125" height="60" alt="">
      </a>
    </div>
    <div class="ml-auto my-auto mr-2">
      <p class="mt-2">Copyright &copy; Dating.com 2019. All right reserved</p>
      <p>Made by Duong Nguyen Hoang Minh and Tran Ngoc Minh</p>
    </div>
    
  </footer>   
  
  
  
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  <?=$this->section("page_specific_js") ?>
</body>
</html>