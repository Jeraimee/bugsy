<?php $this->pageTitle = 'Add Bug'?>
<div class="row">
  <div class="span4 columns">
    <h3>Adding Bug</h3>
    <p>
      Some text here about adding a bug.
    </p>
    <p>
      Fields in <span style="color: red">red</span> are required.
    </p>
  </div>
  <div class="span12 columns">

  <?php echo $this->Form->create('Bug', array('class' => 'form-stacked'));?>
  <fieldset>
  <?php
    echo $this->Form->input('project_id', array('div' => array('class' => 'clearfix')));
    echo $this->Form->input('subject', array('div' => array('class' => 'clearfix')));
    echo $this->Form->input('description', array('div' => array('class' => 'clearfix')));
    echo $this->Form->input('url', array('label' => 'URL', 'div' => array('class' => 'clearfix')));
    echo $this->Form->input('priority', array('options' => $priorities, 'div' => array('class' => 'clearfix')));
  ?>
  </fieldset>
  <div class="actions">
    <?php echo $this->Form->button(__('Add Bug', true), array('class' => 'btn primary'))?>
  </div>
  <?php echo $this->Form->end();?>
  </div>
</div>
