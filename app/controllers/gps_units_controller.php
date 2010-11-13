<?php
class GpsUnitsController extends AppController {

  var $name = 'GpsUnits';

  var $components = array('RequestHandler');
  
  var $paginate = array('GpsUnit' => array('limit' => 10));

  function index() {
    if($this->RequestHandler->ext == 'json') {
      $this->autoRender = false;
      $units = $this->GpsUnit->findAllByUser_id($this->Auth->user('id'));
      return(json_encode($units));
    }
    $this->GpsUnit->recursive = 0;
    $this->set('gpsUnits', $this->paginate(array('User.id' => $this->Auth->user('id'))));
  }

  function view($id = null) {
    if(!$id) {
      $this->Session->setFlash(__('Invalid gps unit', true));
      $this->redirect(array('action' => 'index'));
    }
    $conditions = array("GpsUnit.id = ? AND GpsUnit.user_id = ?" => array($id, $this->Auth->user('id')));

    $gpsUnit = $this->GpsUnit->find('first', array('conditions' => $conditions));

    if(empty($gpsUnit)) {
      $this->Session->setFlash(__('You tried to view a GPS unit that does not belong to you.', true));
      $this->redirect(array('action' => 'index'));
    }
    $firstLat = $gpsUnit['GpsPosition'][0]['latitude'];
    $lastLat = $gpsUnit['GpsPosition'][sizeof($gpsUnit['GpsPosition']) - 1]['latitude'];
    $startLat = ($firstLat - $lastLat) / 2 + $lastLat;

    $firstLng = $gpsUnit['GpsPosition'][0]['longitude'];
    $lastLng = $gpsUnit['GpsPosition'][sizeof($gpsUnit['GpsPosition']) - 1]['longitude'];
    $startLng = ($firstLng - $lastLng) / 2 + $lastLng;

    $this->set(compact('gpsUnit', 'startLat', 'startLng'));
  }

  function add() {
    if(!empty($this->data)) {
      $this->GpsUnit->create();
      $this->data['GpsUnit']['user_id'] = $this->Auth->user('id');
      if($this->GpsUnit->save($this->data)) {
        $this->Session->setFlash(__('The gps unit has been saved', true));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The gps unit could not be saved. Please, try again.', true));
      }
    }
    $users = $this->GpsUnit->User->find('list');
    $this->set(compact('users'));
  }

  function edit($id = null) {
    if(!$id && empty($this->data)) {
      $this->Session->setFlash(__('Invalid gps unit', true));
      $this->redirect(array('action' => 'index'));
    }
    if(!empty($this->data)) {
      // Make sure user isn't trying to edit someone elses unit
      $edited_unit = $this->GpsUnit->findById($this->data['GpsUnit']['id']);
      if($edited_unit['GpsUnit']['user_id'] != $this->Auth->user('id')) {
        $this->Session->setFlash(__('You tried to edit a GPS unit that does not belong to you. Changes has not been saved.', true));
        $this->redirect(array('action' => 'index'));
      }
      if($this->GpsUnit->save($this->data)) {
        $this->Session->setFlash(__('The gps unit has been saved', true));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The gps unit could not be saved. Please, try again.', true));
      }
    }
    if(empty($this->data)) {
      // Don't allow the user to load a unit that does not belong to him
      $edited_unit = $this->GpsUnit->findById($id);
      if($edited_unit['GpsUnit']['user_id'] != $this->Auth->user('id')) {
        $this->Session->setFlash(__('You tried to edit a GPS unit that does not belong to you.', true));
        $this->redirect(array('action' => 'index'));
      }
      $this->data = $this->GpsUnit->read(null, $id);
    }
    $users = $this->GpsUnit->User->find('list');
    $this->set(compact('users'));
  }

  function delete($id = null) {
    if(!$id) {
      $this->Session->setFlash(__('Invalid id for gps unit', true));
      $this->redirect(array('action'=>'index'));
    }
    $edited_unit = $this->GpsUnit->findById($id);
    if($edited_unit['GpsUnit']['user_id'] != $this->Auth->user('id')) {
      $this->Session->setFlash(__('You tried to delete a GPS unit that does not belong to you.', true));
      $this->redirect(array('action' => 'index'));
    }
    if($this->GpsUnit->delete($id)) {
      $this->Session->setFlash(__('Gps unit deleted', true));
      $this->redirect(array('action'=>'index'));
    }
    $this->Session->setFlash(__('Gps unit was not deleted', true));
    $this->redirect(array('action' => 'index'));
  }
}
?>