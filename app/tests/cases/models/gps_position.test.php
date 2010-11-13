<?php
/* GpsPosition Test cases generated on: 2010-11-09 19:11:37 : 1289328697*/
App::import('Model', 'GpsPosition');

class GpsPositionTestCase extends CakeTestCase {
	var $fixtures = array('app.gps_position', 'app.gps_unit');

	function startTest() {
		$this->GpsPosition =& ClassRegistry::init('GpsPosition');
	}

	function endTest() {
		unset($this->GpsPosition);
		ClassRegistry::flush();
	}

}
?>