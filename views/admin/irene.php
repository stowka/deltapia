<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h3 class="text-center">
				Irene's CV
			</h3>	
			<?php
				if( $saved ):
			?>
				<div class="row">
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Saved!</strong>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
			<?php
				endif;
			?>
		</div>
	</div>
	<form method="post">
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-center">
					<img src="global/img/flags/en.png">
					<textarea class="form-control ckeditor" name="irene-en" placeholder="CV EN" rows="15"><?php print nl2br( $ireneEN['cv'] ); ?></textarea>
				</p>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-center">
					<img src="global/img/flags/nl.png">
					<textarea class="form-control ckeditor" name="irene-nl" placeholder="CV NL" rows="15"><?php print nl2br( $ireneNL['cv'] ); ?></textarea>
				</p>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-center">
					<img src="global/img/flags/de.png">
					<textarea class="form-control ckeditor" name="irene-de" placeholder="CV DE" rows="15"><?php print nl2br( $ireneDE['cv'] ); ?></textarea>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="text-center">
					<button type="submit" class="btn btn-lg btn-success">Save</button>
				</p>
			</div>
		</div>
	</form>
</div>