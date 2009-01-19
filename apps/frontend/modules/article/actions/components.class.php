<?php

class articleComponents extends sfComponents
{
  public function executeLastArticleTitle(sfWebRequest $request)
  {
    $this->blog_article_list = DbFinder::from('BlogArticle')->orderBy('CreatedAt', 'desc')->find();
  }
}

?>