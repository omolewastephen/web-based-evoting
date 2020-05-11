<?php include dirname(__DIR__).'/theme/header.php'; ?>

<div class="content mt-5">
	<div class="container">
		<div class="col-md-8 col-xl-8 offset-2">
			<div class="card border-success">
			  <h5 class="card-header">Create Election</h5>
			  <div class="card-body">
			   <form method="post">
			   	<div class="form-group">
			   		<label>Election Title</label>
			   		<input type="text" name="title" class="form-control" required>
			   	</div>

			   	<div class="form-group">
			   		<label>Election Code</label>
			   		<input type="text" name="code" class="form-control" required>
			   	</div>

			   	<div class="form-group">
			   		<label>Number of Available Post</label>
			   		<input type="number" name="post" class="form-control" required>
			   	</div>

			   	<button type="submit" name="submit" class="btn btn-md btn-success">Submit</button>
			   	<button type="reset" class="btn btn-md btn-danger">Reset</button>

			   </form>
			  </div>
			</div>
		</div>
	</div>
</div>

<?php include dirname(__DIR__).'/theme/footer.php'; ?>