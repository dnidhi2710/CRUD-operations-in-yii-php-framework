<?php
    use yii\helpers\html;
    use yii\widgets\ActiveForm;
    /* @var $this yii\web\View */
    $this->title = 'CRUD Application';
    ?>
<div class="site-index">

	<h1 class="primary">Update Record!</h1>
	<div class="body-content">
		<?php $form = ActiveForm::begin() ?>
		<div class="row">
			<div class="form-group">
				<div class="col-lg-6">
					<?= $form->field($person,'firstname') ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<div class="col-lg-6">
					<?= $form->field($person,'lastname') ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<div class="col-lg-6">
					<?= $form->field($person,'email')?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<div class="col-lg-6">
					<?= $form->field($person,'image')->fileInput()?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<div class="col-lg-6">
					<?= $form->field($person,'marks') ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<div class="col-lg-6">
					<?= $form->field($person,'status') ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<div class="col-lg-6">
					<div class="col-lg-3">
						<?= Html::submitButton('update',['class'=> 'btn btn-primary']) ?>
					</div>
					<div class="col-lg-2">
						<a href=<?php echo yii::$app->homeUrl;?> class="btn btn-primary" >Home</a>
					</div>
				</div>
			</div>
		</div>
		<?php ActiveForm::end() ?>
	</div>
</div>