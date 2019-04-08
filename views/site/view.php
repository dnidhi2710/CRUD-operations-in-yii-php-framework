<?php
    use yii\helpers\html;
    use yii\widgets\ActiveForm;
    /* @var $this yii\web\View */
    $this->title = 'CRUD Application';
    ?>
<div class="site-index">
	<div class="row">
		<div class="col-lg-6">

			<h2 class="display-3">Hello,
				<?php echo $person->firstname; ?>!</h2>
		</div>
		<div class="col-lg-6">

		</div>
	</div>

	<table class="table table-hover">
		<tbody>
			<tr class="table-active">
				<td>Picture</td>
				<td>
					<img src=<?php echo $person->image; ?> name="image" width="150px" height="150px"
					>
					</img>
				</td>
			</tr>
			<tr class="table-active">

				<td>First Name</td>
				<td>
					<?php echo $person->firstname; ?>
				</td>
			</tr>
			<tr class="table-active">

				<td>Last Name</td>
				<td>
					<?php echo $person->lastname; ?>
				</td>
			</tr>
			<tr class="table-active">

				<td> Email</td>
				<td>
					<?php echo $person->email; ?>
				</td>
			</tr>
			<tr class="table-active">

				<td>Marks</td>
				<td>
					<?php echo $person->marks; ?>
				</td>
			</tr>
			<tr class="table-active">

				<td>Status</td>
				<td>
					<?php echo $person->status; ?>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="row">
		<a href=<?php echo yii::$app->homeUrl;?> class="btn btn-primary" >Go to Home</a>
	</div>
</div>