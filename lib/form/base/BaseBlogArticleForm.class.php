<?php

/**
 * BlogArticle form base class.
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseBlogArticleForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'user_id'                    => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'status'                     => new sfWidgetFormInput(),
      'title'                      => new sfWidgetFormInput(),
      'subcontent'                 => new sfWidgetFormTextarea(),
      'content'                    => new sfWidgetFormTextarea(),
      'published_at'               => new sfWidgetFormDateTime(),
      'created_at'                 => new sfWidgetFormDateTime(),
      'updated_at'                 => new sfWidgetFormDateTime(),
      'blog_category_article_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'BlogCategory')),
      'blog_tag_article_list'      => new sfWidgetFormPropelChoiceMany(array('model' => 'BlogTag')),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorPropelChoice(array('model' => 'BlogArticle', 'column' => 'id', 'required' => false)),
      'user_id'                    => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'status'                     => new sfValidatorString(array('max_length' => 255)),
      'title'                      => new sfValidatorString(array('max_length' => 255)),
      'subcontent'                 => new sfValidatorString(),
      'content'                    => new sfValidatorString(),
      'published_at'               => new sfValidatorDateTime(array('required' => false)),
      'created_at'                 => new sfValidatorDateTime(array('required' => false)),
      'updated_at'                 => new sfValidatorDateTime(array('required' => false)),
      'blog_category_article_list' => new sfValidatorPropelChoiceMany(array('model' => 'BlogCategory', 'required' => false)),
      'blog_tag_article_list'      => new sfValidatorPropelChoiceMany(array('model' => 'BlogTag', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('blog_article[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BlogArticle';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['blog_category_article_list']))
    {
      $values = array();
      foreach ($this->object->getBlogCategoryArticles() as $obj)
      {
        $values[] = $obj->getCategoryId();
      }

      $this->setDefault('blog_category_article_list', $values);
    }

    if (isset($this->widgetSchema['blog_tag_article_list']))
    {
      $values = array();
      foreach ($this->object->getBlogTagArticles() as $obj)
      {
        $values[] = $obj->getTagId();
      }

      $this->setDefault('blog_tag_article_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveBlogCategoryArticleList($con);
    $this->saveBlogTagArticleList($con);
  }

  public function saveBlogCategoryArticleList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['blog_category_article_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(BlogCategoryArticlePeer::ARTICLE_ID, $this->object->getPrimaryKey());
    BlogCategoryArticlePeer::doDelete($c, $con);

    $values = $this->getValue('blog_category_article_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new BlogCategoryArticle();
        $obj->setArticleId($this->object->getPrimaryKey());
        $obj->setCategoryId($value);
        $obj->save();
      }
    }
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
    $c->add(BlogTagArticlePeer::ARTICLE_ID, $this->object->getPrimaryKey());
    BlogTagArticlePeer::doDelete($c, $con);

    $values = $this->getValue('blog_tag_article_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new BlogTagArticle();
        $obj->setArticleId($this->object->getPrimaryKey());
        $obj->setTagId($value);
        $obj->save();
      }
    }
  }

}
