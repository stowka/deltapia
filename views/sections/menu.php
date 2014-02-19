<nav class="menu navbar" role="navigation">
	<div class="navbar-header">
		<?php include_once "views/sections/flags.php"; ?>
		<button type="button" class="navbar-toggle" class="btn-menu" data-toggle="collapse" data-target="#menu-collapse">
			<span class="sr-only">Toggle navigation</span>
			<!--<span class="glyphicon glyphicon-th" style="color:#fff;font-size:1.8em;"></span>-->
			<img src="global/img/logos/delta-logo.png" alt="Toggle navigation" width="24px">
		</button>
	</div>
	<div class="collapse navbar-collapse" id="menu-collapse">
		<ul class="nav navbar-nav">
			<li>
				<a href="./"><?php print $menu['home']; ?></a>
			</li>
			<li>
				<a href="./?_=about"><?php print $menu['about']; ?></a>
			</li>
			<li>
				<a href="./?_=concerts"><?php print $menu['concerts']; ?></a>
			</li>
			<li>
				<a href="./?_=repertoire"><?php print $menu['repertoire']; ?></a>
			</li>
			<li>
				<a href="./?_=photos"><?php print $menu['photos']; ?></a>
			</li>
			<li>
				<a href="./?_=recordings"><?php print $menu['recordings']; ?></a>
			</li>
			<li>
				<a href="./?_=contact"><?php print $menu['contact']; ?></a>
			</li>
		</ul>
	</div>
</nav>