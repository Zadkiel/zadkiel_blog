<?php

/**
 * BlogTagArticle form base class.
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseBlogTagArticleForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tag_id'     => new sfWidgetFormInputHidden(),
      'article_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'tag_id'     => new sfValidatorPropelChoice(array('model' => 'BlogTag', 'column' => 'id', 'required' => false)),
      'article_id' => new sfValidatorPropelChoice(array('model' => 'BlogArticle', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('blog_tag_article[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BlogTagArticle';
  }


}
