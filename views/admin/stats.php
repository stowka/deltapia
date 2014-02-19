<?php
	$stmt = $dbh->prepare( "select count(*) from visit;" );
	$stmt->execute();
	$nbVisits = current( $stmt->fetch( PDO::FETCH_NUM ) );
	$stmt->closeCursor();
	$stmt = $dbh->prepare( "select datetime from visit order by datetime asc limit 0, 1;" );
	$stmt->execute();
	$firstVisit = current( $stmt->fetch( PDO::FETCH_NUM ) );
	$stmt->closeCursor();
?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h3 class="text-center">
				Stats
			</h3>	
		</div>
	</div>
	
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<h4 class="text-left">
				Visitors <small>(<?php print $nbVisits; ?> since <?php print date( 'Y F, dS', strtotime( $firstVisit )); ?>)</small>
			</h4>

			<canvas id="visits" width="500" height="500"></canvas>
		</div>	

		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<h4 class="text-left">
				Countries
			</h4>

			<canvas id="countries" width="500" height="500"></canvas>
		</div>	
	</div>
</div>