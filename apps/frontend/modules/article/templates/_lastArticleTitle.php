<div class="left_element">
	<h2><label>DERNIER POST</label></h2>
	<div id="last_article">
		<ul>
		<?php foreach($blog_article_list as $blog_article):?>
			<li><a href="<?php echo url_for('article/show?id='.$blog_article->getId()) ?>"><?php echo $blog_article->getTitle() ?></a></li>
		<?php endforeach;?>
		</ul>							
	</div>
</div>