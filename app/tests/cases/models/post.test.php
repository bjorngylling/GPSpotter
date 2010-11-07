<?php
/* Post Test cases generated on: 2010-11-05 12:11:35 : 1288957535*/
App::import('Model', 'Post');

class PostTestCase extends CakeTestCase {
	var $fixtures = array('app.post', 'app.user');

	function startTest() {
		$this->Post =& ClassRegistry::init('Post');
	}

	function endTest() {
		unset($this->Post);
		ClassRegistry::flush();
	}

}
?>