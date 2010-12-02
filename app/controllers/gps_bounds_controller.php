<?php
class GpsBoundsController extends AppController {

	var $name = 'GpsBounds';

  var $components = array('RequestHandler');

	function index($gps_unit_id = null) {
    if (!$gps_unit_id) {
      $this->Session->setFlash(__(
        'You can only view GPS bounds on a per unit basis.', true));
      $this->redirect(array('controller' => 'gps_units', 
        'action' => 'index'));
    }
    
    $unit_belongs_to = $this->GpsBound->GpsUnit->field('user_id', 
      array('GpsUnit.id' => $gps_unit_id));
    if($unit_belongs_to != $this->Auth->user('id')) {
      $this->Session->setFlash(__(
        'You can only view GPS bounds belonging to your own units.', true));
      $this->redirect(array('controller' => 'gps_units', 
        'action' => 'index'));
    }

    if($this->RequestHandler->ext == 'json') {
      $this->autoRender = false;
      $conditions = array('conditions' => array("GpsBound.gps_unit_id" => $gps_unit_id),
        'order' => 'GpsBound.created ASC',
        'recursive' => 0);
        $units = $this->GpsBound->find('all', $conditions);
      
      return(json_encode($units));
    }

    $this->GpsBound->recursive = 0;
    $this->set('gpsBounds', $this->paginate(
      array('GpsUnit.id' => $gps_unit_id)));
  }

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid gps bound', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('gpsBound', $this->GpsBound->read(null, $id));
	}

	function add($gps_unit_id = null) {
		if (!empty($this->data)) {
			$this->GpsBound->create();
			if ($this->GpsBound->save($this->data)) {
				$this->Session->setFlash(__('The gps bound has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gps bound could not be saved. Please, try again.', true));
			}
		}
		$gpsUnits = $this->GpsBound->GpsUnit->find('list');
		$this->set(compact('gpsUnits'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid gps bound', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->GpsBound->save($this->data)) {
				$this->Session->setFlash(__('The gps bound has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gps bound could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->GpsBound->read(null, $id);
		}
		$gpsUnits = $this->GpsBound->GpsUnit->find('list');
		$this->set(compact('gpsUnits'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for gps bound', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->GpsBound->delete($id)) {
			$this->Session->setFlash(__('Gps bound deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Gps bound was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>