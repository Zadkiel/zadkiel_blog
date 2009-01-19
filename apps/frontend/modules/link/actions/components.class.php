<?php

class linkComponents extends sfComponents
{
  public function executeList(sfWebRequest $request)
  {
    $this->blog_link_list = DbFinder::from('BlogLink')->orderBy('Name', 'asc')->find();
  }
}

?>