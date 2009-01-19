<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * BlogTag filter form base class.
 *
 * @package    blog
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseBlogTagFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                  => new sfWidgetFormFilterInput(),
      'blog_tag_article_list' => new sfWidgetFormPropelChoice(array('model' => 'BlogArticle', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                  => new sfValidatorPass(array('required' => false)),
      'blog_tag_article_list' => new sfValidatorPropelChoice(array('model' => 'BlogArticle', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('blog_tag_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
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

    $criteria->addJoin(BlogTagArticlePeer::TAG_ID, BlogTagPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(BlogTagArticlePeer::ARTICLE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(BlogTagArticlePeer::ARTICLE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'BlogTag';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'name'                  => 'Text',
      'blog_tag_article_list' => 'ManyKey',
    );
  }
}
