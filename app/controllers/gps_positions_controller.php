<?php
class GpsPositionsController extends AppController {

  var $name = 'GpsPositions';

  var $components = array('RequestHandler');

  var $paginate = array('GpsPosition' => array('limit' => 10));

  function index($gps_unit_id = null) {
    if (!$gps_unit_id) {
      $this->Session->setFlash(__(
        'You can only view GPS positions on a per unit basis.', true));
      $this->redirect(array('controller' => 'gps_units', 
        'action' => 'index'));
    }
    
    $unit_belongs_to = $this->GpsPosition->GpsUnit->field('user_id', 
      array('GpsUnit.id' => $gps_unit_id));
    if($unit_belongs_to != $this->Auth->user('id')) {
      $this->Session->setFlash(__(
        'You can only view GPS positions belonging to your own units.', true));
      $this->redirect(array('controller' => 'gps_units', 
        'action' => 'index'));
    }

    if($this->RequestHandler->ext == 'json') {
      $this->autoRender = false;
      $conditions = array('conditions' => array("GpsPosition.gps_unit_id" => $gps_unit_id),
        'order' => 'GpsPosition.created ASC',
        'recursive' => 0);
        $units = $this->GpsPosition->find('all', $conditions);
      
      return(json_encode($units));
    }

    $this->GpsPosition->recursive = 0;
    $this->set('gpsPositions', $this->paginate(
      array('GpsUnit.id' => $gps_unit_id)));
  }

  function view($id = null) {
    if (!$id) {
      $this->Session->setFlash(__('Invalid gps position', true));
      $this->redirect(array('action' => 'index'));
    }
    $this->set('gpsPosition', $this->GpsPosition->read(null, $id));
  }

  function add() {
    if (!empty($this->data)) {
      $this->GpsPosition->create();
      if ($this->GpsPosition->save($this->data)) {
        $this->Session->setFlash(__('The gps position has been saved', true));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__(
          'The gps position could not be saved. Please, try again.', true));
      }
    }
    $gpsUnits = $this->GpsPosition->GpsUnit->find('list');
    $this->set(compact('gpsUnits'));
  }

  function edit($id = null) {
    if (!$id && empty($this->data)) {
      $this->Session->setFlash(__('Invalid gps position', true));
      $this->redirect(array('action' => 'index'));
    }
    if (!empty($this->data)) {
      if ($this->GpsPosition->save($this->data)) {
        $this->Session->setFlash(__('The gps position has been saved', true));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__(
          'The gps position could not be saved. Please, try again.', true));
      }
    }
    if (empty($this->data)) {
      $this->data = $this->GpsPosition->read(null, $id);
    }
    $gpsUnits = $this->GpsPosition->GpsUnit->find('list');
    $this->set(compact('gpsUnits'));
  }

  function delete($id = null) {
    if (!$id) {
      $this->Session->setFlash(__('Invalid id for gps position', true));
      $this->redirect(array('action'=>'index'));
    }
    if ($this->GpsPosition->delete($id)) {
      $this->Session->setFlash(__('Gps position deleted', true));
      $this->redirect(array('action'=>'index'));
    }
    $this->Session->setFlash(__('Gps position was not deleted', true));
    $this->redirect(array('action' => 'index'));
  }
}
?>