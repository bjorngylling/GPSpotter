<?php
/* GpsUnit Test cases generated on: 2010-11-09 19:11:50 : 1289328710*/
App::import('Model', 'GpsUnit');

class GpsUnitTestCase extends CakeTestCase {
	var $fixtures = array('app.gps_unit', 'app.user', 'app.group', 'app.post', 'app.gps_position');

	function startTest() {
		$this->GpsUnit =& ClassRegistry::init('GpsUnit');
	}

	function endTest() {
		unset($this->GpsUnit);
		ClassRegistry::flush();
	}

}
?>