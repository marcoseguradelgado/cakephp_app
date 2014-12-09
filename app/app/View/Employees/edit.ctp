<div class="users form">
    <?php echo $this->Form->create('Employee'); ?>
    <fieldset>
        <legend><?php echo __('Editar empleado'); ?></legend>
       <?php echo $this->Form->input('nameEmployee', array('label' => 'Nombre completo'));
       echo $this->Form->input('IdEmployee', array('type' => 'hidden'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>