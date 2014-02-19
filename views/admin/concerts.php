<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h3 class="text-center">
				Concerts
			</h3>
			<?php
				if( $concert_deleted ):
			?>
				<div class="row">
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Deleted!</strong>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
			<?php
				endif;
			?>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			
		</div>

		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Date</th>
						<th>Time</th>
						<th>Title</th>
						<th>Place</th>
						<th class="text-danger text-center">Action</th>
					</tr>
				</thead>

				<tbody>
					<?php
						foreach( $concerts as $concert ):
					?>
							<tr class="<?php print $concert->getDatetime() < time() ? 'active' : ''; ?>">
								<th>
									<?php print date( "F jS, Y (l)", $concert->getDatetime() ); ?>
								</th>

								<th>
									<?php print strftime( "%Hh%M", $concert->getDatetime() ); ?>
								</th>

								<th>
									<?php print $concert->getTitle(); ?>
								</th>

								<th>
									<?php print $concert->getVenue(); ?>
									(<?php print $concert->getVenue()->getCity(); ?>, <?php print $concert->getVenue()->getCity()->getCountry()->getShortName(); ?>)
								</th>

								<th class="text-center">
									<form method="post" onsubmit="javascript:return confirm('Are you sure?');">
										<input type="hidden" name="delete">
										<input type="hidden" value="<?php print $concert->getId(); ?>" name="id">
										<button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
									</form>
								</th>
							</tr>
					<?php
						endforeach;
					?>
				</tbody>
			</table>
		</div>

		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			
		</div>
	</div>
</div>