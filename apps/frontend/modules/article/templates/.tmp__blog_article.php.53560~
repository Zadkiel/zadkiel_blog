<div class="span-16 last article">
	<div class="span-3 info_article">
		<div class="date"><?php echo $blog_article->getCreatedAt("m l Y") ?></div>
		<div class="categorie">
		<?php 
		$i = 0; 
		$list_category = $blog_article->getBlogCategoryArticlesJoinBlogCategory();
		?>
		<?php foreach($list_category as $blog_category_article):?>
			<?php $i++?>
			<a href="#"><?php echo $blog_category_article->getBlogCategory()->getName() ?></a>
			<?php if($i < count($list_category)):?>
			 | 
			 <?php endif;?>
		<?php endforeach;?>
		</div>
		<div class="tag">
		<?php 
		$i = 0; 
		$list_tag = $blog_article->getBlogTagArticlesJoinBlogTag();
		?>
		<?php foreach($list_tag as $blog_tag_article):?>
			<?php $i++?>
			<a href="#"><?php echo $blog_tag_article->getBlogTag()->getName() ?></a>
			<?php if($i < count($list_tag)):?>
			 | 
			 <?php endif;?>
		<?php endforeach;?>
		</div>
		<div class="comment"><a href="#"><?php echo $blog_article->countBlogComments() ?> commentaires</a></div>
		</div>
	<div class="span-13 last">
		<h3><a href="<?php echo url_for('article/show?id='.$blog_article->getId()) ?>"><?php echo $blog_article->getTitle() ?></a></h3>
		<div class="time">Poste a <?php $blog_article->getCreatedAt("h:i") ?></div>
		<div class="content">
			<p>
				<?php echo $blog_article->getContent() ?>
			</p>
		</div>
		<div class="more"><p><a href="<?php echo url_for('article/show?id='.$blog_article->getId()) ?>">Lire la suite</a></p></div>
	</div>
</div>