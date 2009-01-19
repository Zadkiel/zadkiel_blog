<?php

class BlogArticle extends BaseBlogArticle
{
	public function __toString(){
		return $this->getTitle();
	}

}
