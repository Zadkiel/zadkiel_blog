<div class="left_element">
		<h2>AMIS <3</h2>
		<ul>
		<?php foreach($blog_link_list as $blog_link): ?>
			<li><a href="http://<?php echo $blog_link->getTarget() ?>" title="<?php echo $blog_link->getDescription()?>"><?php echo $blog_link->getName() ?></a></li>
		<?php endforeach;?>
		</ul>
</div>