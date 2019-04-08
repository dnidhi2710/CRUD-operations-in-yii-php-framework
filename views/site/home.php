<?php
    use yii\helpers\html;
    /* @var $this yii\web\View */
    $this->title = 'CRUD Application';
    ?>
<div class="site-index">
	<?php if(yii::$app->session->hasFlash('message')):?>
	<div class="alert alert-dismissible alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?php echo yii::$app->session->getFlash('message'); ?>
	</div>
	<?php endif; ?>
	<div class="row center-align">
		<h1 class="primary">Student Records</h1>
	</div>
	<div class="row">
		<span><?= Html::a('Create',['/site/create'],['class' => 'btn btn-primary'])?> </span>
	</div>
	<div class="body-content">
		<div class="row">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">First Name</th>
						<th scope="col">Last Name</th>
						<th scope="col">Email</th>
						<th scope="col">Marks</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($person) > 0): ?>
					<?php foreach($person as $chi): ?>
					<tr class="table-active">
						<td>
							<?php echo $chi->firstname; ?>
						</td>
						<td>
							<?php echo $chi->lastname; ?>
						</td>
						<td>
							<?php echo $chi->email; ?>
						</td>
						<td>
							<?php echo $chi->marks; ?>
						</td>
						<td>
							<?php echo $chi->status; ?>
						</td>
						<td>
							<span><?= Html::a('View',['view','id'=>$chi->id],['class'=>'label label-primary'])?></span>
							<span><?= Html::a('Update',['update','id'=>$chi->id],['class'=>'label label-default'])?></span>
							<span><?= Html::a('Delete',['delete','id'=>$chi->id],['class'=>'label label-danger'])?></span>
						</td>
					</tr>
					<? endforeach; ?>
					<?php else: ?>
					<tr>
						<td>No Records found !</td>
					</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>

	</div>
</div>