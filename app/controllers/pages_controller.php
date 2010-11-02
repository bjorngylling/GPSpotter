<?php
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
  var $name = 'Pages';

/**
 * Default helper
 *
 * @var array
 * @access public
 */
  var $helpers = array('Html');

/**
 * This controller does not use a model
 *
 * @var array
 * @access public
 */
  var $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @access public
 */
  function display() {
    $path = func_get_args();

    $count = count($path);
    if (!$count) {
      $this->redirect('/');
    }
    $page = $subpage = $title_for_layout = null;

    if (!empty($path[0])) {
      $page = $path[0];
    }
    if (!empty($path[1])) {
      $subpage = $path[1];
    }
    if (!empty($path[$count - 1])) {
      $title_for_layout = Inflector::humanize($path[$count - 1]);
    }

    $this->set(compact('page', 'subpage', 'title_for_layout'));
    $this->set('gps_coordinates', array(
      array('lat' => 58.406957, 
        'lng' => 15.579379,
        'time' => '14:30:31'), 
      array('lat' => 58.405714, 
        'lng' => 15.572262,
        'time' => '14:31:01'), 
      array('lat' => 58.405489, 
        'lng' => 15.566597,
        'time' => '14:31:31'),
      array('lat' => 58.409067, 
        'lng' => 15.563868,
        'time' => '14:32:01'),
      array('lat' => 58.40803, 
        'lng' => 15.56355,
        'time' => '14:56:01')));

    $this->render(implode('/', $path));
  }
}