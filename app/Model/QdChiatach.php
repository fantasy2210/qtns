<?php
App::uses('AppModel', 'Model');
/**
 * QdChiatach Model
 *
 * @property DonviMoi1 $DonviMoi1
 * @property DonviMoi2 $DonviMoi2
 * @property DonviCu $DonviCu
 */
class QdChiatach extends AppModel {

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
		'donvi_moi_1_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'donvi_moi_2_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'donvi_cu_id' => array(
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
		'DonviMoi1' => array(
			'className' => 'Donvi',
			'foreignKey' => 'donvi_moi_1_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DonviMoi2' => array(
			'className' => 'Donvi',
			'foreignKey' => 'donvi_moi_2_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DonviCu' => array(
			'className' => 'Donvi',
			'foreignKey' => 'donvi_cu_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
