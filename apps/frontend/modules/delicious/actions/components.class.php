<?php

class deliciousComponents extends sfComponents
{
  public function executeLastDelicious(sfWebRequest $request)
  {
  	//TODO: Find an another solution to use external lib
	require_once(dirname(__FILE__).'/../../../../../lib/vendor/delicious/library/php-delicious.inc.php');
	$oPhpDelicious = new PhpDelicious('zadkiel87', 'leobanjo1');
	$this->recentPosts = $oPhpDelicious->GetRecentPosts();
	var_dump($this->recentPosts);
	echo $oPhpDelicious->LastErrorString();
  }
}

?>