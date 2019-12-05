<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page_specific_style") ?>

<style>
  .extra {
    background: #FF1493;
  }
</style>

<?php $this->stop() ?>


<?php $this->start("page_content") ?>


<?php if(isset($_SESSION['message'])): ?>

<div class="<?=$_SESSION['msg_type']?>">
	<?php
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	?>
</div>

<?php endif ?>


<div class="d-flex justify-content-center">
  <div class="w-50 rounded border my-5 bg-white p-4">
		<h1 class="text-center">Login</h1>
			<form action="/login" method="POST">
				<div class="form-group">  
					<label>Email</label>    
					<input class="form-control" type="email" required name="email">
					<span class="highlight"></span>
					<span class="bar"></span>
        </div>
        
				<div class="form-group">  
					<label>Password</label>    
					<input class="form-control" type="password" required name="password">
					<span class="highlight"></span>
					<span class="bar"></span>	
        </div>
        
				<button class="btn btn-primary" type="submit">Login</button>
				<a href="/register">Don't have account? Click here to register!</a>
			</form>
		
  </div>
</div>



<?php $this->stop() ?>


<?php $this->start("page_specific_js") ?>

<?php $this->stop() ?>