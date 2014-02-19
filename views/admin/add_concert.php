<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h3 class="text-center">
				Add concert
			</h3>
			<?php
				if( $concert_added ):
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
		<input type="hidden" name="add_concert">
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<h4 class="text-center">
					Informations
				</h4>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p class="text-left">
							<label for="title">
								Title:
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<input class="form-control" placeholder="Title" type="text" name="title" id="title" required>	
								</div>
							</div>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<p class="text-left">
							<label for="date">
								Date:
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<input class="form-control" placeholder="Date" type="date" name="date" id="date" required>
								</div>
							</div>
						</p>	
					</div>

					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<p class="text-left">
							<label for="hour">
								Time:
							</label><br>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<select class="form-control" name="hour" id="hour">
										<optgroup label="Hour">
											<?php
												for ( $h = 0; $h < 24; ++$h ) :
													if ( $h == date('H', time() + 300) )
														print '<option value="'.$h.'" selected>';
													else
														print '<option value="'.$h.'">';
													printf( '%02d', $h );
													print ' h</option>'.chr(10);
												endfor;
											?>
										</optgroup>
									</select>	
								</div>

								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<select class="form-control" name="minute" id="minute">
										<optgroup label="Minute">
											<?php
												for ( $m = 0; $m < 60; $m+=15 ) :
													if ( date('i', time() + 300) >= $m && date('i', time() + 300) < ($m + 15) )
														print '<option value="'.$m.'" selected>';
													else
														print '<option value="'.$m.'">';
													printf( '%02d', $m );
													print '</option>'.chr(10);
												endfor;
											?>
										</optgroup>
									</select>
								</div>
							</div>
						</p>
					</div>
				</div>
			</div>

			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 left-bordered">
				<h4 class="text-center">
					Location
				</h4>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<p class="text-left">
								<label id="label-country" for="country">
									<button type="button" data-toggle="modal" data-target="#modal-country" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span></button>
									Country:
								</label>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<select class="form-control" id="country" name="country" required></select>	
									</div>
								</div>
							</p>
						</div>

						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<p class="text-left">
								<label id="label-city" for="city">
									<button type="button" data-toggle="modal" data-target="#modal-city" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span></button>
									City:
								</label>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<select class="form-control" id="city" name="city" required></select>	
									</div>
								</div>
							</p>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<p class="text-left">
								<label id="label-venue" for="venue">
									<button type="button" data-toggle="modal" data-target="#modal-venue" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span></button>
									Venue:
								</label>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<select class="form-control" id="venue" name="venue" required></select>	
									</div>
								</div>
							</p>
						</div>
					</div>
				</p>
			</div>
		</div>
		<hr>
		<div class="row">
			<h4 class="text-center">
				Description
			</h4>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-center">
					<img src="global/img/flags/en.png">
					<textarea class="form-control ckeditor" name="concert-en" placeholder="Description" rows="8"></textarea>
				</p>
			</div>

			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-center">
					<img src="global/img/flags/nl.png">
					<textarea class="form-control ckeditor" name="concert-nl" placeholder="Description" rows="8"></textarea>
				</p>
			</div>

			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-center">
					<img src="global/img/flags/de.png">
					<textarea class="form-control ckeditor" name="concert-de" placeholder="Description" rows="8"></textarea>
				</p>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="text-center">
					<button class="btn btn-success btn-lg">Add</button>
				</p>
			</div>
		</div>
	</form>
</div>

<!--
	Modals
-->

<div class="modal fade" id="modal-country">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">
					Add country
				</h4>
			</div>
			<div class="modal-body">
				<p class="text-left">
					<img src="global/img/flags/en.png">
					<input type="text" id="country-name-en" placeholder="Country name" class="form-control"><br>
					<img src="global/img/flags/nl.png">
					<input type="text" id="country-name-nl" placeholder="Country name" class="form-control"><br>
					<img src="global/img/flags/de.png">
					<input type="text" id="country-name-de" placeholder="Country name" class="form-control">
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" id="country-dismiss" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" id="country-submit" class="btn btn-primary" data-dismiss="modal">Add</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-city">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">
					Add city
				</h4>
			</div>
			<div class="modal-body">
				<h5 id="country-city" class="text-center"></h5>
				<p class="text-left">
					<img src="global/img/flags/en.png">
					<input type="text" id="city-name-en" placeholder="City name" class="form-control"><br>
					<img src="global/img/flags/nl.png">
					<input type="text" id="city-name-nl" placeholder="City name" class="form-control"><br>
					<img src="global/img/flags/de.png">
					<input type="text" id="city-name-de" placeholder="City name" class="form-control">
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" id="city-dismiss" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" id="city-submit" class="btn btn-primary" data-dismiss="modal">Add</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-venue">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">
					Add venue
				</h4>
			</div>
			<div class="modal-body">
				<h5 id="country-city" class="text-center"></h5>
				<p>
					<input type="text" id="venue-name" placeholder="Venue name" class="form-control"><br>
					<textarea class="form-control" id="venue-address" placeholder="Address"></textarea>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" id="venue-dismiss" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" id="venue-submit" class="btn btn-primary" data-dismiss="modal">Add</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function controlForm() {
		if ( $("#title").val().length !== 0
		&& $("#date").val().length !== 0
		&& $("#country option:selected").val() !== "--"
		&& $("#city option:selected").val() !== "--"
		&& $("#venue option:selected").val() !== "--" ) {
			return false;
		}
	}

	(function($) {
		$.fn.invisible = function() {
			return this.each(function() {
				$(this).css("visibility", "hidden");
			});
		};
		$.fn.visible = function() {
			return this.each(function() {
				$(this).css("visibility", "visible");
			});
		};
	}(jQuery));

	function init() {
		$("#city").invisible();
		$("#label-city").invisible();
		$("#venue").invisible();
		$("#label-venue").invisible();
		$.get(
			"ajax.php",
			{
				page: "countries"
			},
			function (data) {
				$("#country").empty();
				$("#country").append('<option selected disabled>--</option>');
				for(var i = 0; i < data.countries.length; i+=1) {
					$("#country").append('<option value="'+data.countries[i].id+'">'+data.countries[i].name+'</option>');
				}
			}
		);
	}

	$( document ).ready(function() {
		init();
	});

	$("#country-dismiss").click(function() {
		$("#country-name-en").val("");
		$("#country-name-nl").val("");
		$("#country-name-de").val("");
	});

	$("#city-dismiss").click(function() {
		$("#city-name-en").val("");
		$("#city-name-nl").val("");
		$("#city-name-de").val("");
	});

	$("#venue-dismiss").click(function() {
		$("#venue-name").val("");
		$("#venue-texte").val("");
	});

	$("#country-submit").click(function() {
		console.log("adding country");
		var name_en = $("#country-name-en").val();
		var name_nl = $("#country-name-nl").val();
		var name_de = $("#country-name-de").val();

		$.post(
			"ajax.php?page=add_country",
			{
				en: name_en,
				nl: name_nl,
				de: name_de
			},
			function (data) {
				init();
				console.log(data);
			}
		);

	});

	$("#city-submit").click(function() {
		var name_en = $("#city-name-en").val();
		var name_nl = $("#city-name-nl").val();
		var name_de = $("#city-name-de").val();
		var country = $( "#country option:selected" ).val();

		$.post(
			"ajax.php?page=add_city",
			{
				country: country,
				en: name_en,
				nl: name_nl,
				de: name_de
			},
			function (data) {
				$("#country").trigger("change");
			}
		);
	});

	$("#venue-submit").click(function() {
		var name = $("#venue-name").val();
		var address = $("#venue-address").val();
		var city = $( "#city option:selected" ).val();

		$.post(
			"ajax.php?page=add_venue",
			{
				city: city,
				name: name,
				address: address
			},
			function (data) {
				$("#city").trigger("change");
			}
		);
	});

	$("#country").change(function() {
		var country = $( "#country option:selected" ).val();
		$("#country-city").html($( "#country option:selected" ).html());
		$.get(
			"ajax.php",
			{
				page: "cities",
				country: country
			},
			function (data) {
				$("#city").empty();
				$("#city").append('<option selected disabled>--</option>');
				$("#venue").empty();
				$("#venue").append('<option selected disabled>--</option>');
				for(var i = 0; i < data.cities.length; i+=1) {
					$("#city").append('<option value="'+data.cities[i].id+'">'+data.cities[i].name+'</option>');
				}
				$("#label-city").visible();
				$("#city").visible();
			}
		);
	});

	$("#city").change(function() {
		var city = $( "#city option:selected" ).val();
		$.get(
			"ajax.php",
			{
				page: "venues",
				city: city
			},
			function (data) {
				$("#venue").empty();
				$("#venue").append('<option selected disabled>--</option>');
				for(var i = 0; i < data.venues.length; i+=1) {
					$("#venue").append('<option value="'+data.venues[i].id+'">'+data.venues[i].name+'</option>');
				}
				$("#label-venue").visible();
				$("#venue").visible();

				/*if (controlForm())
					$("#submit").removeProp("disabled");
				else
					$("#submit").addProp("disabled");*/
			}
		);
	});
</script>