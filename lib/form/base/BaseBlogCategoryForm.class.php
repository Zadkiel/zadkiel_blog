<?php

/**
 * BlogCategory form base class.
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseBlogCategoryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'name'                       => new sfWidgetFormInput(),
      'blog_category_article_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'BlogArticle')),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorPropelChoice(array('model' => 'BlogCategory', 'column' => 'id', 'required' => false)),
      'name'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'blog_category_article_list' => new sfValidatorPropelChoiceMany(array('model' => 'BlogArticle', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('blog_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BlogCategory';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['blog_category_article_list']))
    {
      $values = array();
      foreach ($this->object->getBlogCategoryArticles() as $obj)
      {
        $values[] = $obj->getArticleId();
      }

      $this->setDefault('blog_category_article_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveBlogCategoryArticleList($con);
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
    $c->add(BlogCategoryArticlePeer::CATEGORY_ID, $this->object->getPrimaryKey());
    BlogCategoryArticlePeer::doDelete($c, $con);

    $values = $this->getValue('blog_category_article_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new BlogCategoryArticle();
        $obj->setCategoryId($this->object->getPrimaryKey());
        $obj->setArticleId($value);
        $obj->save();
      }
    }
  }

}
