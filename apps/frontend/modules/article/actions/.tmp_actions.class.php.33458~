<?php

/**
 * article actions.
 *
 * @package    blog
 * @subpackage article
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class articleActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->blog_article_list = DbFinder::from('BlogArticle')->orderBy('CreatedAt', 'desc')->find(3);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->blog_article = BlogArticlePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->blog_article);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BlogArticleForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new BlogArticleForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($blog_article = BlogArticlePeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_article does not exist (%s).', $request->getParameter('id')));
    $this->form = new BlogArticleForm($blog_article);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($blog_article = BlogArticlePeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_article does not exist (%s).', $request->getParameter('id')));
    $this->form = new BlogArticleForm($blog_article);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($blog_article = BlogArticlePeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_article does not exist (%s).', $request->getParameter('id')));
    $blog_article->delete();

    $this->redirect('article/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $blog_article = $form->save();

      $this->redirect('article/edit?id='.$blog_article->getId());
    }
  }
}
