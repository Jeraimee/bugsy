<div class="issues index">
  <h2><?php __('Issues');?></h2>
  <table cellpadding="0" cellspacing="0">
  <tr>
      <th><?php echo $this->Paginator->sort('id');?></th>
      <th><?php echo $this->Paginator->sort('created');?></th>
      <th><?php echo $this->Paginator->sort('modified');?></th>
      <th><?php echo $this->Paginator->sort('project_id');?></th>
      <th><?php echo $this->Paginator->sort('user_id');?></th>
      <th><?php echo $this->Paginator->sort('name');?></th>
      <th><?php echo $this->Paginator->sort('description');?></th>
      <th><?php echo $this->Paginator->sort('url');?></th>
      <th><?php echo $this->Paginator->sort('status');?></th>
      <th><?php echo $this->Paginator->sort('priority');?></th>
      <th class="actions"><?php __('Actions');?></th>
  </tr>
  <?php
  $i = 0;
  foreach ($Issues as $Issue):
    $class = null;
    if ($i++ % 2 == 0) {
      $class = ' class="altrow"';
    }
  ?>
  <tr<?php echo $class;?>>
    <td><?php echo $Issue['Issue']['id']; ?>&nbsp;</td>
    <td><?php echo $Issue['Issue']['created']; ?>&nbsp;</td>
    <td><?php echo $Issue['Issue']['modified']; ?>&nbsp;</td>
    <td>
      <?php echo $this->Html->link($Issue['Project']['name'], array('controller' => 'projects', 'action' => 'view', $Issue['Project']['id'])); ?>
    </td>
    <td>
      <?php echo $this->Html->link($Issue['User']['username'], array('controller' => 'users', 'action' => 'view', $Issue['User']['id'])); ?>
    </td>
    <td><?php echo $Issue['Issue']['name']; ?>&nbsp;</td>
    <td><?php echo $Issue['Issue']['description']; ?>&nbsp;</td>
    <td><?php echo $Issue['Issue']['url']; ?>&nbsp;</td>
    <td><?php echo $Issue['Issue']['status']; ?>&nbsp;</td>
    <td><?php echo $Issue['Issue']['priority']; ?>&nbsp;</td>
    <td class="actions">
      <?php echo $this->Html->link(__('View', true), array('action' => 'view', $Issue['Issue']['id'])); ?>
      <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $Issue['Issue']['id'])); ?>
      <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $Issue['Issue']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $Issue['Issue']['id'])); ?>
    </td>
  </tr>
<?php endforeach; ?>
  </table>
  <p>
  <?php
  echo $this->Paginator->counter(array(
  'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
  ));
  ?>  </p>

  <div class="paging">
    <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
   |  <?php echo $this->Paginator->numbers();?>
 |
    <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
  </div>
</div>
<div class="actions">
  <h3><?php __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('New Issue', true), array('action' => 'add')); ?></li>
    <li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Comments', true), array('controller' => 'comments', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Comment', true), array('controller' => 'comments', 'action' => 'add')); ?> </li>
  </ul>
</div>