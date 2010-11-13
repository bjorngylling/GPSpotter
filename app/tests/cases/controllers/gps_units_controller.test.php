<?php
/* GpsUnits Test cases generated on: 2010-11-10 16:11:35 : 1289404175*/
App::import('Controller', 'GpsUnits');

class TestGpsUnitsController extends GpsUnitsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class GpsUnitsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.gps_unit', 'app.user', 'app.group', 'app.post', 'app.gps_position');

	function startTest() {
		$this->GpsUnits =& new TestGpsUnitsController();
		$this->GpsUnits->constructClasses();
	}

	function endTest() {
		unset($this->GpsUnits);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>