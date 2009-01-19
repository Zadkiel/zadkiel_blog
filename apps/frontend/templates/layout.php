<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
	<?php include_title() ?>
	<?php include_stylesheets() ?>
    <!--[if IE]>
		<?php use_stylesheet('blueprint/ie.css') ?>
	<![endif]-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
	<?php include_javascripts() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body>
	<div id="first_part">
		<div class="container">
			<div id="header" class="span-24 last">
	    		<div class="prepend-1 span-13 prepend-top">
					<h1 class="title"><span>ZADKIEL ME</span></h1>
				</div>
				<div class="prepend-2 span-8 last prepend-top" id="menu">
					<ul>
						<li class="current"><a href="#">ACCUEIL</a></li>
						<li><a href="#">PROJET</a></li>
						<li><a href="#">PHOTOS</a></li>
						<li><a href="#">A PROPOS</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="wrap_fox">
		<div id="fox">
		</div>
	</div>
	<div id="transition_one">
	</div>
	<div id="seconde_part">
		<div class="container">
			<div class="span-8">
				<h2>CITATION</h2>
				<blockquote>Salut, enfin le lancement de mon site web zadkiel.me !, et voici une magnifique blocquote.</blockquote>
				<p class="author">- Alan wake</p>
			</div>
			<?php include_component('delicious', 'LastDelicious') ?>
			<div class="span-8 last">
				<h2>TWITTER</h2>
				<blockquote>Salut, enfin le lancement de mon site web zadkiel.me !, et voici une magnifique blocquote.</blockquote>
				<div class="prepend-3"><img src="img/twitterific1.png" alt="Follow me on twitter" title="Follow me on twitter"></div>
			</div>
		</div>
	</div>
	<div id="transition_two">
	</div>
	<div id="third_part">
		<div class="container">
			<div class="span-8">
					<div class="left_element">
						<h2><label>RECHERCHER</label></h2>
						<div id="search">
							<form method="POST" action="#">
							<input type="text" id="input_search"><input type="submit" id="submit_search" value="Rechercher">
							</form>
						</div>
					</div>
					<?php include_component('article', 'lastArticleTitle') ?>
					<?php include_component('category', 'list') ?>
					<?php include_component('link', 'list') ?>
				</div>
		    <?php echo $sf_content ?>
		</div>
	</div>
	</div>
		<div id="transition_three">
		</div>
		<div id="fourth_part">
		<div class="container">
			<div id="footer" class="span-24 last">
			</div>
		</div>
		<div id="garden_state"></div>
	</div>
  </body>
</html>
