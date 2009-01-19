<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * BlogArticle filter form base class.
 *
 * @package    blog
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseBlogArticleFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'                    => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'status'                     => new sfWidgetFormFilterInput(),
      'title'                      => new sfWidgetFormFilterInput(),
      'subcontent'                 => new sfWidgetFormFilterInput(),
      'content'                    => new sfWidgetFormFilterInput(),
      'published_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'created_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'blog_category_article_list' => new sfWidgetFormPropelChoice(array('model' => 'BlogCategory', 'add_empty' => true)),
      'blog_tag_article_list'      => new sfWidgetFormPropelChoice(array('model' => 'BlogTag', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'user_id'                    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'status'                     => new sfValidatorPass(array('required' => false)),
      'title'                      => new sfValidatorPass(array('required' => false)),
      'subcontent'                 => new sfValidatorPass(array('required' => false)),
      'content'                    => new sfValidatorPass(array('required' => false)),
      'published_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'blog_category_article_list' => new sfValidatorPropelChoice(array('model' => 'BlogCategory', 'required' => false)),
      'blog_tag_article_list'      => new sfValidatorPropelChoice(array('model' => 'BlogTag', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('blog_article_filters[%s]');

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

    $criteria->addJoin(BlogCategoryArticlePeer::ARTICLE_ID, BlogArticlePeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(BlogCategoryArticlePeer::CATEGORY_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(BlogCategoryArticlePeer::CATEGORY_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addBlogTagArticleListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(BlogTagArticlePeer::ARTICLE_ID, BlogArticlePeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(BlogTagArticlePeer::TAG_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(BlogTagArticlePeer::TAG_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'BlogArticle';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'user_id'                    => 'ForeignKey',
      'status'                     => 'Text',
      'title'                      => 'Text',
      'subcontent'                 => 'Text',
      'content'                    => 'Text',
      'published_at'               => 'Date',
      'created_at'                 => 'Date',
      'updated_at'                 => 'Date',
      'blog_category_article_list' => 'ManyKey',
      'blog_tag_article_list'      => 'ManyKey',
    );
  }
}
