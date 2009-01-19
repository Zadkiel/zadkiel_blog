<?php

class categoryComponents extends sfComponents
{
  public function executeList(sfWebRequest $request)
  {
    $this->blog_category_list = DbFinder::from('BlogCategory')->orderBy('Name', 'asc')->find();
  }
}

?>