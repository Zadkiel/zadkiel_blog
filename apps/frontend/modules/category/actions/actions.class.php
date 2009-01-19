<?php

/**
 * category actions.
 *
 * @package    blog
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class categoryActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->blog_category_list = BlogCategoryPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->blog_category = BlogCategoryPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->blog_category);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BlogCategoryForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new BlogCategoryForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($blog_category = BlogCategoryPeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_category does not exist (%s).', $request->getParameter('id')));
    $this->form = new BlogCategoryForm($blog_category);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($blog_category = BlogCategoryPeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_category does not exist (%s).', $request->getParameter('id')));
    $this->form = new BlogCategoryForm($blog_category);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($blog_category = BlogCategoryPeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_category does not exist (%s).', $request->getParameter('id')));
    $blog_category->delete();

    $this->redirect('category/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $blog_category = $form->save();

      $this->redirect('category/edit?id='.$blog_category->getId());
    }
  }
}
