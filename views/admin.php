<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Delta Piano Trio</title>
		<link rel="stylesheet" type="text/css" href="global/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="global/css/admin.css">
		<link rel="icon" type="image/png" href="global/img/logos/delta.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body class="container">
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<ul class="nav nav-tabs nav-justified" id="menu">
					<li class="dropdown<?php if( in_array( $page, array("about", "gerard", "irene", "vera") ) ): ?> active<?php endif; ?>">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span class="glyphicon glyphicon-user"></span> About <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="?_=admin&page=about"><span class="glyphicon glyphicon-home"></span> Delta Piano Trio</a></li>
							<li<?php if( "gerard" === $page ): ?> class="active"<?php endif; ?>><a href="?_=admin&page=gerard"><span class="glyphicon glyphicon-user"></span> Gerard</a></li>
							<li<?php if( "irene" === $page ): ?> class="active"<?php endif; ?>><a href="?_=admin&page=irene"><span class="glyphicon glyphicon-user"></span> Irene</a></li>
							<li<?php if( "vera" === $page ): ?> class="active"<?php endif; ?>><a href="?_=admin&page=vera"><span class="glyphicon glyphicon-user"></span> Vera</a></li>
						</ul>
					</li>
					<li<?php if( "add_concert" === $page ): ?> class="active"<?php endif; ?>><a href="?_=admin&page=add_concert"><span class="glyphicon glyphicon-music"></span> Add concert</a></li>
					<li<?php if( "concerts" === $page ): ?> class="active"<?php endif; ?>><a href="?_=admin&page=concerts"><span class="glyphicon glyphicon-calendar"></span> Concerts</a></li>
					<li<?php if( "repertoire" === $page ): ?> class="active"<?php endif; ?>><a href="?_=admin&page=repertoire"><span class="glyphicon glyphicon-play"></span> Repertoire</a></li>
					<li<?php if( "photos" === $page ): ?> class="active"<?php endif; ?>><a href="?_=admin&page=photos"><span class="glyphicon glyphicon-picture"></span> Photos</a></li>
					<li<?php if( "stats" === $page ): ?> class="active"<?php endif; ?>><a href="?_=admin&page=stats"><span class="glyphicon glyphicon-stats"></span> Stats</a></li>
				</ul>

				<div class="tab-content" id="contents">
					<div class="tab-content fade active in">
						<?php 
							include_once "admin/$page.php"; 
						?>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="global/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="global/js/ckeditor/ckeditor.js"></script>
		<?php if( "stats" === $page ): ?>
			<script type="text/javascript" src="global/js/Chart.js"></script>
			<script type="text/javascript">
				function monthInArray(needle, haystack) {
					var length = haystack.length;
					for(var i = 0; i < length; i++) {
						if(haystack[i].month === needle) 
							return i;
					}
					return false;
				}
				var monthCount = 4;

				var months = [
					"January",
					"February",
					"March",
					"April",
					"May",
					"June",
					"July",
					"August",
					"September",
					"October",
					"November",
					"December"
				];

				var lastMonths = [];
				for (var i = monthCount - 1; i >= 0; i--) {
					var m = new Date();
					m.setMonth(new Date().getMonth() - i);
					lastMonths.push(months[m.getMonth()]);
				}

				var visits;
				$.get(
					"ajax.php?page=visits&limit=" + monthCount,
					{},
					function (data) {
						var v = [];
						var index;
						for (m in lastMonths) {
							index = monthInArray(lastMonths[m], data)
							if (index !== false) {
								v.push(parseInt(data[index].visits));
							} else {
								v.push(0);
							}
						}
						var visits = {
							labels: lastMonths,
							datasets: [
								{
									fillColor : "rgba(151,187,205,0.5)",
									strokeColor : "rgba(151,187,205,1)",
									pointColor : "rgba(151,187,205,1)",
									pointStrokeColor : "#fff",
									data : v
								}
							]
						}
						var ctx = $("#visits").get(0).getContext("2d");
						new Chart(ctx).Line(visits, {
							scaleShowLabels: true, 
							scaleFontFamily: "'Helvetica'"
						});
						$("#visitorDisplay").val("curve");
					}
				);

				$.get(
					"ajax.php?page=countryPie",
					{},
					function (data) {
						var countries = [];
						var length = data.length;
						var color;
						for (var i = 0; i < length; i++) {
							if (data[i].country === "AT")
								color = "#2980b9";
							else if (data[i].country === "NL")
								color = "#e67e22";
							else if (data[i].country === "DE")
								color = "#8e44ad";
							else if (data[i].country === "CH")
								color = "#2ecc71";
							else if (data[i].country === "FR")
								color = "#34495e";
							else if (data[i].country === "USA")
								color = "#c0392b";
							else if (data[i].country === "UK")
								color = "#f1c40f";
							else
								color = "#bdc3c7";
							countries.push({
								value: parseFloat(data[i].percentage),
								color: color,
								label : data[i].country + " (" + parseFloat(parseFloat(data[i].percentage).toFixed(2)) + "%)",
							});
						}
						var ctx = $("#countries").get(0).getContext("2d");
						new Chart(ctx).Pie(countries, {
							labelFontSize : '13',
							animation: true
						});
					}
				);
			</script>
		<?php endif; ?>
	</body>
</html>