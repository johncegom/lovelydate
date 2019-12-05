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
  <div class="w-75 my-5 p-4 rounded border bg-white">
		<h1 class="text-center">Register</h1>
		<form action="/register" method="POST" enctype="multipart/form-data">
			<div class="form-group">   
					<label>Email</label>   
					<input class="form-control" type="email" required name="email">
      </div>
      
			<div class="form-group">   
				<label>Password</label>   
				<input class="form-control" type="password" required name="password">
      </div>
      
			<div class="form-group">  
			<label>Confirm password</label>    
				<input class="form-control" type="password" required name="password_confirmation">
      </div>
      
			<div class="form-group">  
				<label>Full name</label>    
				<input class="form-control" type="text" required name="name">
				<span class="highlight"></span>
				<span class="bar"></span>
      </div>
      
			<div class="form-group">      
				<input type="radio" name="gender" value="male"> 
				<label>Male</label> 
				<input type="radio" name="gender" value="female"> 
				<label>Female</label>
			</div>

			<div class="form-group">  
				<label>Date of birth</label>    
				<input class="form-control" type="date" name="dob" required>
				<span class="highlight"></span>
				<span class="bar"></span>
			</div>
      
			<div class="form-group">   
				<label>Your hobby</label>   
				<input class="form-control" type="text" required name="hobby">
				<span class="highlight"></span>
				<span class="bar"></span>
				
			</div>
			<div class="form-group">   
				<label>Your biography</label>   
				<input class="form-control" type="text" required name="biography">
				<span class="highlight"></span>
				<span class="bar"></span>
				
			</div>
			<div class="form-group">   
				<label>Your image</label>   
				<input type="file" name="img" accept="image/*">
				<span class="highlight"></span>
				<span class="bar"></span>
				
      </div>
      <div class="d-flex justify-content-center">
        <button class="btn btn-primary" type="submit">Register</button>
			  <a class="btn btn-primary ml-2" href="/login">Back to login</a>
			</div>
		</form>
  </div>
</div>

<?php $this->stop() ?>


<?php $this->start("page_specific_js") ?>

<?php $this->stop() ?>
