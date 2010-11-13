<?php
/* GpsPosition Fixture generated on: 2010-11-09 19:11:37 : 1289328697 */
class GpsPositionFixture extends CakeTestFixture {
	var $name = 'GpsPosition';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'gps_unit_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'latitude' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '15,11'),
		'longitude' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '15,11'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_bin', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'gps_unit_id' => 1,
			'latitude' => 1,
			'longitude' => 1,
			'created' => '2010-11-09 19:51:37',
			'modified' => '2010-11-09 19:51:37'
		),
	);
}
?>