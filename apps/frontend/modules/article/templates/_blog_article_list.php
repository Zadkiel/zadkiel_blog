<div class="list_article">
<?php foreach ($blog_article_list as $blog_article): ?>
	<?php include_partial('blog_article', array('blog_article' => $blog_article)) ?>
<?php endforeach; ?>
</div>