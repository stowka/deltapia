<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h3 class="text-center">
				Repertoire
			</h3>	
		</div>
	</div>
	<form method="post">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h4 class="text-center">
					Introduction
				</h4>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-center">
					<img src="global/img/flags/en.png">
				</p>

				<p class="text-center">
					<textarea class="form-control ckeditor" name="introduction-en" placeholder="introduction EN" rows="15"><?php print nl2br( $repertoireEN['introduction'] ); ?></textarea>
				</p>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-center">
					<img src="global/img/flags/nl.png">
				</p>

				<p class="text-center">
					<textarea class="form-control ckeditor" name="introduction-nl" placeholder="introduction NL" rows="15"><?php print nl2br( $repertoireNL['introduction'] ); ?></textarea>
				</p>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-center">
					<img src="global/img/flags/de.png">
				</p>

				<p class="text-center">
					<textarea class="form-control ckeditor" name="introduction-de" placeholder="introduction DE" rows="15"><?php print nl2br( $repertoireDE['introduction'] ); ?></textarea>
				</p>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h4 class="text-center">
					Repertoire
				</h4>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-center">
					<img src="global/img/flags/en.png">
				</p>

				<p class="text-center">
					<textarea class="form-control ckeditor" name="repertoire-en" placeholder="repertoire EN" rows="15"><?php print nl2br( $repertoireEN['repertoire'] ); ?></textarea>
				</p>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-center">
					<img src="global/img/flags/nl.png">
				</p>

				<p class="text-center">
					<textarea class="form-control ckeditor" name="repertoire-nl" placeholder="repertoire NL" rows="15"><?php print nl2br( $repertoireNL['repertoire'] ); ?></textarea>
				</p>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-center">
					<img src="global/img/flags/de.png">
				</p>

				<p class="text-center">
					<textarea class="form-control ckeditor" name="repertoire-de" placeholder="repertoire DE" rows="15"><?php print nl2br( $repertoireDE['repertoire'] ); ?></textarea>
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