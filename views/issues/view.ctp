<div class="issues view">
<h2><?php  __('Issue');?></h2>
  <dl><?php $i = 0; $class = ' class="altrow"';?>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $Issue['Issue']['id']; ?>
      &nbsp;
    </dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $Issue['Issue']['created']; ?>
      &nbsp;
    </dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $Issue['Issue']['modified']; ?>
      &nbsp;
    </dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Project'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $this->Html->link($Issue['Project']['name'], array('controller' => 'projects', 'action' => 'view', $Issue['Project']['id'])); ?>
      &nbsp;
    </dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $this->Html->link($Issue['User']['username'], array('controller' => 'users', 'action' => 'view', $Issue['User']['id'])); ?>
      &nbsp;
    </dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $Issue['Issue']['name']; ?>
      &nbsp;
    </dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $Issue['Issue']['description']; ?>
      &nbsp;
    </dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $Issue['Issue']['url']; ?>
      &nbsp;
    </dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $Issue['Issue']['status']; ?>
      &nbsp;
    </dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Priority'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $Issue['Issue']['priority']; ?>
      &nbsp;
    </dd>
  </dl>
</div>
<div class="actions">
  <h3><?php __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('Edit Issue', true), array('action' => 'edit', $Issue['Issue']['id'])); ?> </li>
    <li><?php echo $this->Html->link(__('Delete Issue', true), array('action' => 'delete', $Issue['Issue']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $Issue['Issue']['id'])); ?> </li>
    <li><?php echo $this->Html->link(__('List Issues', true), array('action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Issue', true), array('action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Comments', true), array('controller' => 'comments', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Comment', true), array('controller' => 'comments', 'action' => 'add')); ?> </li>
  </ul>
</div>
<div class="related">
  <h3><?php __('Related Comments');?></h3>
  <?php if (!empty($Issue['Comment'])):?>
  <table cellpadding = "0" cellspacing = "0">
  <tr>
    <th><?php __('Id'); ?></th>
    <th><?php __('Created'); ?></th>
    <th><?php __('Modified'); ?></th>
    <th><?php __('Issue Id'); ?></th>
    <th><?php __('User Id'); ?></th>
    <th><?php __('Comment'); ?></th>
    <th class="actions"><?php __('Actions');?></th>
  </tr>
  <?php
    $i = 0;
    foreach ($Issue['Comment'] as $comment):
      $class = null;
      if ($i++ % 2 == 0) {
        $class = ' class="altrow"';
      }
    ?>
    <tr<?php echo $class;?>>
      <td><?php echo $comment['id'];?></td>
      <td><?php echo $comment['created'];?></td>
      <td><?php echo $comment['modified'];?></td>
      <td><?php echo $comment['Issue_id'];?></td>
      <td><?php echo $comment['user_id'];?></td>
      <td><?php echo $comment['comment'];?></td>
      <td class="actions">
        <?php echo $this->Html->link(__('View', true), array('controller' => 'comments', 'action' => 'view', $comment['id'])); ?>
        <?php echo $this->Html->link(__('Edit', true), array('controller' => 'comments', 'action' => 'edit', $comment['id'])); ?>
        <?php echo $this->Html->link(__('Delete', true), array('controller' => 'comments', 'action' => 'delete', $comment['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $comment['id'])); ?>
      </td>
    </tr>
  <?php endforeach; ?>
  </table>
<?php endif; ?>

  <div class="actions">
    <ul>
      <li><?php echo $this->Html->link(__('New Comment', true), array('controller' => 'comments', 'action' => 'add'));?> </li>
    </ul>
  </div>
</div>
