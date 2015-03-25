<?php

App::uses('AppModel', 'Model');

/**
 * Attachfile Model
 *
 * @property Vanbanden $Vanbanden
 * @property Vanbandi $Vanbandi
 */
class Attachfile extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';

    public function updateForeignKey($foreignkey, $attactfileids = array()) {
        $this->updateAll(array('Attachfile.foreign_key' => $foreignkey), array('Attachfile.id' => $attactfileids));
    }

}
