<?php

App::uses('AppModel', 'Model');

/**
 * QdThanhlap Model
 *
 * @property Donvi $Donvi
 */
class QdThanhlap extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'soqd' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Trường này bắt buộc',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'ngay_ky' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Trường này bắt buộc',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        )
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Donvi' => array(
            'className' => 'Donvi',
            'foreignKey' => 'donvi_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $hasMany = array(
        'Attachfile' => array(
            'className' => 'Attachfile',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachfile.model' => 'QdThanhlap'),
            'fields' => array('id', 'path', 'ext', 'realpath'),
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
