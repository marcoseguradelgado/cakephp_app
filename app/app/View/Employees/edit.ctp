<div class="users form">
    <?php echo $this->Form->create('Employee'); ?>
    <fieldset>
        <legend><?php echo __('Agregar empleado'); ?></legend>
        <?php echo $this->Form->input('IdEmployee', array('label' => 'Cedula'));
        echo $this->Form->input('nameEmployee', array('label' => 'Nombre completo'));
        echo $this->Form->input('uuid', array('label' => 'UUID del telefono'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>