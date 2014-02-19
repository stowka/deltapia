function countryPie() {
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
				labelFontFamily : "'sorts-mill-goudy'",
				labelFontSize : '12',
				animation: false
			});
		}
	);
}