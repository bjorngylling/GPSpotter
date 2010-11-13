<?php
/* GpsPositions Test cases generated on: 2010-11-09 19:11:41 : 1289328701*/
App::import('Controller', 'GpsPositions');

class TestGpsPositionsController extends GpsPositionsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class GpsPositionsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.gps_position', 'app.gps_unit');

	function startTest() {
		$this->GpsPositions =& new TestGpsPositionsController();
		$this->GpsPositions->constructClasses();
	}

	function endTest() {
		unset($this->GpsPositions);
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