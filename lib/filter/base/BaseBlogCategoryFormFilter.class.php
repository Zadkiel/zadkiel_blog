<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * BlogCategory filter form base class.
 *
 * @package    blog
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseBlogCategoryFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                       => new sfWidgetFormFilterInput(),
      'blog_category_article_list' => new sfWidgetFormPropelChoice(array('model' => 'BlogArticle', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                       => new sfValidatorPass(array('required' => false)),
      'blog_category_article_list' => new sfValidatorPropelChoice(array('model' => 'BlogArticle', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('blog_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addBlogCategoryArticleListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(BlogCategoryArticlePeer::CATEGORY_ID, BlogCategoryPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(BlogCategoryArticlePeer::ARTICLE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(BlogCategoryArticlePeer::ARTICLE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'BlogCategory';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'name'                       => 'Text',
      'blog_category_article_list' => 'ManyKey',
    );
  }
}
