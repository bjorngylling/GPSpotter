<?php
/* GpsBound Fixture generated on: 2010-12-01 15:12:41 : 1291212941 */
class GpsBoundFixture extends CakeTestFixture {
	var $name = 'GpsBound';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'gps_unit_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'latitude' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '12,7'),
		'longitude' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '12,7'),
		'radius' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_bin', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'gps_unit_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'latitude' => 1,
			'longitude' => 1,
			'radius' => 1,
			'created' => '2010-12-01 15:15:41',
			'modified' => '2010-12-01 15:15:41'
		),
	);
}
?>