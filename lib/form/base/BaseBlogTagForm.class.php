<?php

/**
 * BlogTag form base class.
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseBlogTagForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'name'                  => new sfWidgetFormInput(),
      'blog_tag_article_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'BlogArticle')),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'BlogTag', 'column' => 'id', 'required' => false)),
      'name'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'blog_tag_article_list' => new sfValidatorPropelChoiceMany(array('model' => 'BlogArticle', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('blog_tag[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BlogTag';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['blog_tag_article_list']))
    {
      $values = array();
      foreach ($this->object->getBlogTagArticles() as $obj)
      {
        $values[] = $obj->getArticleId();
      }

      $this->setDefault('blog_tag_article_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveBlogTagArticleList($con);
  }

  public function saveBlogTagArticleList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['blog_tag_article_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(BlogTagArticlePeer::TAG_ID, $this->object->getPrimaryKey());
    BlogTagArticlePeer::doDelete($c, $con);

    $values = $this->getValue('blog_tag_article_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new BlogTagArticle();
        $obj->setTagId($this->object->getPrimaryKey());
        $obj->setArticleId($value);
        $obj->save();
      }
    }
  }

}
