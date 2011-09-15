<div class="projects form">
<?php echo $this->Form->create('Project');?>
	<fieldset>
		<legend><?php __('Admin Add Project'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('public_view');
		echo $this->Form->input('public_add');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Projects', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Bugs', true), array('controller' => 'bugs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bug', true), array('controller' => 'bugs', 'action' => 'add')); ?> </li>
	</ul>
</div>