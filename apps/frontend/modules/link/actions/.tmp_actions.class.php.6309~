<?php

/**
 * link actions.
 *
 * @package    blog
 * @subpackage link
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class linkActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->blog_link_list = BlogLinkPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->blog_link = BlogLinkPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->blog_link);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BlogLinkForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new BlogLinkForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($blog_link = BlogLinkPeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_link does not exist (%s).', $request->getParameter('id')));
    $this->form = new BlogLinkForm($blog_link);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($blog_link = BlogLinkPeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_link does not exist (%s).', $request->getParameter('id')));
    $this->form = new BlogLinkForm($blog_link);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($blog_link = BlogLinkPeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_link does not exist (%s).', $request->getParameter('id')));
    $blog_link->delete();

    $this->redirect('link/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $blog_link = $form->save();

      $this->redirect('link/edit?id='.$blog_link->getId());
    }
  }
}
