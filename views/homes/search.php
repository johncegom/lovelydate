<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page_specific_style") ?>

<style>

  .custom {
  background: #ffc9f4;
  border-bottom: 1px solid transparent;
  border-radius: 15px;
  border-top: 1px solid transparent;
  margin: 10px 0;
  }

  .img_border {
    border: 1px inset rgba(0, 0, 0, .1);
    display: block;
    border-radius: 50%;
  }


  a:hover {
  cursor: pointer;
}
</style>

<?php $this->stop() ?>


<?php $this->start("page_content") ?>

<div class="container mt-3">

<?php
  $count = 0;
  foreach($users as $user):
    // foreach($images as $image):
    //   if ($image->user_id === $user->id):
    $images = $user->images()->get();
    foreach($images as $image):
?>

  
    <div class="row custom p-2">
      <div class="col-md-4 d-flex justify-content-center">
        <a>
          <img class="img_border" src="<?=$this->e($image->img_url) ?>" alt="" width="150" height="150">
        </a>
      </div>
      <div class="col-md-8">
        <a href="#"><h3><?php echo $this->e($user->name) ?></h3></a>
        <h4><?php echo $this->e($user->biography) ?></h4>
        <h5><?php echo $this->e(date("d-m-Y", strtotime($user->dob))) ?></h5>
      </div>
    </div>

  <?php
    //   endif;
     endforeach;
  endforeach; 
  ?>

  </div>





<?php $this->stop() ?>



<?php $this->start("page_specific_js") ?>


<?php $this->stop() ?>