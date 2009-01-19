<?php

class BlogCategory extends BaseBlogCategory
{
	public function __toString(){
		return $this->getName();
	}
}
