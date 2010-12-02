<?php
/* GpsBound Test cases generated on: 2010-12-01 15:12:41 : 1291212941*/
App::import('Model', 'GpsBound');

class GpsBoundTestCase extends CakeTestCase {
	var $fixtures = array('app.gps_bound', 'app.gps_unit', 'app.user', 'app.group', 'app.gps_position');

	function startTest() {
		$this->GpsBound =& ClassRegistry::init('GpsBound');
	}

	function endTest() {
		unset($this->GpsBound);
		ClassRegistry::flush();
	}

}
?>