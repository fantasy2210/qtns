<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<div class="<?php echo $pluralVar; ?> form">

    <div class="row">		
        <div class="col-md-12">		
            <div class="panel panel-default">
                <div class="panel-heading"><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></div>
                <div class="panel-body">
                    <?php echo "\t\t\t<?php echo \$this->Form->create('{$modelClass}', array('role' => 'form','formStyle' => 'horizontal2')); ?>\n\n"; ?>
                    <?php
                    foreach ($fields as $field) {
                        if (strpos($action, 'add') !== false && $field == $primaryKey) {
                            continue;
                        } elseif (!in_array($field, array('created', 'modified', 'updated'))) {
                            echo "\t\t\t\t\t<?php echo \$this->Form->input('{$field}', array('class' => 'form-control'));?>\n";
                        }
                    }
                    if (!empty($associations['hasAndBelongsToMany'])) {
                        foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                            echo "\t\t\t\t\t<?php echo \$this->Form->input('{$assocName}', array('class' => 'form-control'));?>\n";
                        }
                    }
                    ?>
                </div>
                <div class="clearfix"></div>
                
                <div class="form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-primary"><?php echo __('Submit'); ?></button>&nbsp;

                        <a href="/<?php echo $$modelClass . 's' ?>"><button type="button" class="btn btn-green"><?php echo __('Cancel'); ?></button></a>
                    </div>
                </div>
            </div>
            </form>
        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>

<?php
echo "<?php
\$this->Html->script('form-components', array('block' => 'scriptBottom','inline' => false));
\$this->Html->script('ui-dropdown-select', array('block' => 'scriptBottom','inline' => false));
?>
";
?>