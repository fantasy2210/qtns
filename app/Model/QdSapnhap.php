<?php

App::uses('AppModel', 'Model');

/**
 * QdSapnhap Model
 *
 * @property Donvi1 $Donvi1
 * @property Donvi2 $Donvi2
 * @property DonviMoi $DonviMoi
 */
class QdSapnhap extends AppModel {

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
        'donvi1_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'donvi2_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'donvi_moi_id' => array(
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
        'Donvi1' => array(
            'className' => 'Donvi',
            'foreignKey' => 'donvi1_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Donvi2' => array(
            'className' => 'Donvi',
            'foreignKey' => 'donvi2_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'DonviMoi' => array(
            'className' => 'Donvi',
            'foreignKey' => 'donvi_moi_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
