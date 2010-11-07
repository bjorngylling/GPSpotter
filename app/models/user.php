<?php
class User extends AppModel {
	var $name = 'User';
	var $validate = array(
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Please enter a valid email!'
			)
		)
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	var $actsAs = array('Acl' => array('type' => 'requester'));

	function parentNode() {
		if(!$this->id && empty($this->data)) {
			return null;
		}
		if(isset($this->data['User']['group_id'])) {
			$groupId = $this->data['User']['group_id'];
		}
		else {
			$groupId = $this->field('group_id');
		}
		if(!$groupId) {
			return null;
		}
		else {
			return array('Group' => array('id' => $groupId));
		}
	}

}
?>