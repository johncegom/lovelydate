<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page_specific_style") ?>


<?php $this->stop() ?>


<?php $this->start("page_content") ?>

<h3><?=$this->e($user->name) ?></h3>

<?php $this->stop() ?>



<?php $this->start("page_specific_js") ?>


<?php $this->stop() ?>