<?php
/* GpsBounds Test cases generated on: 2010-12-01 15:12:42 : 1291212942*/
App::import('Controller', 'GpsBounds');

class TestGpsBoundsController extends GpsBoundsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class GpsBoundsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.gps_bound', 'app.gps_unit', 'app.user', 'app.group', 'app.gps_position');

	function startTest() {
		$this->GpsBounds =& new TestGpsBoundsController();
		$this->GpsBounds->constructClasses();
	}

	function endTest() {
		unset($this->GpsBounds);
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