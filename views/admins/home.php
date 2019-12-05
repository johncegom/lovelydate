<?php $this->layout("layouts/admin", ["title" => APPNAME]) ?>

<?php $this->start("page_specific_style") ?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

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


<div class="container">
	<div class="row p-3">
		<div class="col-md-12">
			<table id="users" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Date Of Birth</th>
						<th>Hobby</th>
						<th>Biography</th>
						<th>Date Joined</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>

				<?php foreach($users as $user): ?>

					<tr>
						<td><?=$this->e($user->name) ?></td>
						<td><?=$this->e($user->email) ?></td>
						<td><?=$this->e($user->gender) ?></td>
						<td><?=$this->e(date("d-m-Y", strtotime($user->dob))) ?></td>
						<td><?=$this->e($user->hobby) ?></td>
						<td><?=$this->e($user->biography) ?></td>
						<td><?=$this->e(date("d-m-Y", strtotime($user->created_at))) ?></td>
						<td>
							<div class="btn-group btn-group-sm">	
								<a href="/admin/edit/<?=$this->e($user->id)?>" class="btn btn-warning mr-2"> 
									<i class="fas fa-edit"> Edit</i>
								</a>
								
									<button type="button" class="btn btn-danger delete-alert" name="delete-user">
									<i class="fas fa-trash-alt"> Delete</i>
									</button>
								
							</div>
						</td>
					</tr>

				<?php endforeach ?>
				</tbody>
			</table>

		</div>
	</div>
</div>

<div id="delete-confirm" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Confirmation</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
			</div>
			<div class="modal-body">Do you want to delete this user?</div>
			<div class="modal-footer">
				<form class="delete" action="/admin/delete/<?=$this->e($user->id)?>" method="POST" style="display: inline;">
					<button type="submit" class="btn btn-danger" id="delete">Delete</button>
				</form>
				<button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
			</div>
		</div>
	</div>
</div>

<?php $this->stop() ?>



<?php $this->start("page_specific_js") ?>

<!-- <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>  -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> 
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> 
<script>
  $(document).ready(function(){
    $('#users').DataTable();     
		$('.delete-alert').click(function() {
			$('#delete-confirm').modal('show');
		})
  });
</script>

<?php $this->stop() ?>