<?php $this->layout("layouts/admin", ["title" => APPNAME]) ?>


<?php $this->start("page_specific_style") ?>


<?php $this->stop() ?>


<?php $this->start("page_content") ?>
<div class="d-flex justify-content-center">
  <div class="w-75 my-5 p-4 rounded border bg-white">
		<h1 class="text-center">Editing</h1>
		<form action="/admin/update/<?=$this->e($user['id']) ?>" method="POST" enctype="multipart/form-data">
			<div class="form-group">   
					<label>Email</label>   
					<input class="form-control" type="email" required name="email" value="<?=$this->e($user['email']) ?>">
      </div>
      
      
			<div class="form-group">  
				<label>Full name</label>    
				<input class="form-control" type="text" required name="name" value="<?=$this->e($user['name']) ?>">
				<span class="highlight"></span>
				<span class="bar"></span>
      </div>
      
			<div class="form-group">      
				<label>Gender</label>    
				<input class="form-control" type="text" required name="gender" value="<?=$this->e($user['gender']) ?>">
				<span class="highlight"></span>
				<span class="bar"></span>
			</div>

			<div class="form-group">  
				<label>Date of birth</label>    
				<input class="form-control" type="date" name="dob" required value="<?=$this->e($user['dob']) ?>">
				<span class="highlight"></span>
				<span class="bar"></span>
			</div>
      
			<div class="form-group">   
				<label>Your hobby</label>   
				<input class="form-control" type="text" required name="hobby" value="<?=$this->e($user['hobby']) ?>">
				<span class="highlight"></span>
				<span class="bar"></span>
				
			</div>
			<div class="form-group">   
				<label>Your biography</label>   
				<input class="form-control" type="text" required name="biography" value="<?=$this->e($user['biography']) ?>">
				<span class="highlight"></span>
				<span class="bar"></span>
				
			</div>

      <div class="d-flex justify-content-center">
        <button class="btn btn-primary" type="submit">Update</button>
			  <a class="btn btn-primary ml-2" href="/admin">Back to admin panel</a>
			</div>
		</form>
  </div>
</div>

<?php $this->stop() ?>


<?php $this->start("page_specific_js") ?>

<?php $this->stop() ?>
