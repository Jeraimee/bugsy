<?php $this->pageTitle = 'Add Bug'?>
<div class="row">
  <div class="span4 columns">
    <h3>Adding Bug</h3>
    <?php if (empty($user)):?>
    <p class="alert-message block-message info">
      You are not logged in. You may only add issues to publicly accessible projects.
    </p>
    <?php endif;?>
    <p>
      Please be as descriptive as possible in your description &amp; provide an example URL if possible.
    </p>
    <p>
      <strong>Priorities:</strong>
      <dl>
        <dt>P1</dt>
        <dd>Issues stopping all work or money from being generated by the product.</dd>
        <dt>P2</dt>
        <dd>Issues stopping specific tasks from being completed but not stopping the entire project.</dd>
        <dt>P3</dt>
        <dd>Any issue not meeting P1 or P2 status.</dd>
      </dl>
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
