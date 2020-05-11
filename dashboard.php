<?php
include 'theme/header.php';
?>
<div class="content mt-5">
	<div class="container">
		<div class="layer mb-3">
			<h3 class="h5">System Statistics</h3>
			<div class="row">
				<div class="col">
					Current Election: 2019/2020 SU ELECTION
				</div>
				<div class="col">
					Election Code: SU188833
				</div>
				<div class="col">
					Election Posts: 10
				</div>
				<div class="col">
					Election Candidate: 30
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col layer mb-3 ">
				<h3 class="h5">Votes Statistics</h3>

				<div class="chart-1">
					<canvas id="myChart"></canvas>
				</div>
			</div>

			<div class="col layer mb-3 ">
				<h3 class="h5">Election Data Analytics</h3>

				<div class="chart-2">
					<canvas id="myChart-2"></canvas>
				</div>
			</div>
		</div>
		
	</div>
</div>
<?php include 'theme/footer.php'; ?>