<?php
App::uses('AppModel', 'Model');
/**
 * QdDoiten Model
 *
 * @property Donvicu $Donvicu
 * @property Donvimoi $Donvimoi
 */
class QdDoiten extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'soqd';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'soqd' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ngay_ky' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'donvicu_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'donvimoi_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Donvicu' => array(
			'className' => 'Donvi',
			'foreignKey' => 'donvicu_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Donvimoi' => array(
			'className' => 'Donvi',
			'foreignKey' => 'donvimoi_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
