<?php

class BlogTag extends BaseBlogTag
{
	public function __toString(){
		return $this->getName();
	}
}
