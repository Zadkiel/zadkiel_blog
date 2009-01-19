<?php

/**
 * tag actions.
 *
 * @package    blog
 * @subpackage tag
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class tagActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->blog_tag_list = BlogTagPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->blog_tag = BlogTagPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->blog_tag);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BlogTagForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new BlogTagForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($blog_tag = BlogTagPeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_tag does not exist (%s).', $request->getParameter('id')));
    $this->form = new BlogTagForm($blog_tag);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($blog_tag = BlogTagPeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_tag does not exist (%s).', $request->getParameter('id')));
    $this->form = new BlogTagForm($blog_tag);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($blog_tag = BlogTagPeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_tag does not exist (%s).', $request->getParameter('id')));
    $blog_tag->delete();

    $this->redirect('tag/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $blog_tag = $form->save();

      $this->redirect('tag/edit?id='.$blog_tag->getId());
    }
  }
}
