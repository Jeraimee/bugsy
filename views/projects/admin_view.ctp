<?php $this->pageTitle = $project['Project']['name']?>
<div class="row">
  <div class="span4 columns">
    <h3>Projects Admin</h3>
    <ul>
      <li><?php echo $this->Html->link('Edit Project', array('action' => 'edit', $project['Project']['id']))?></li>
      <li><?php echo $this->Html->link('Add Issue', array('controller' => 'issues', 'action' => 'add', $project['Project']['id'], 'admin' => false))?></li>
    </ul>
  </div>
  <div class="span12 columns">
    <p>
      <dl>
        <dt>Project Name</dt>
        <dd><?php echo $project['Project']['name']?></dd>

        <dt>Project Description</dt>
        <dd><?php echo $project['Project']['description']?></dd>

        <dt>Project Created</dt>
        <dd><?php echo $this->Time->nice($project['Project']['created'])?></dd>

        <dt>Project Last Modified</dt>
        <dd><?php echo $this->Time->nice($project['Project']['modified'])?></dd>

        <dt>Publicly Viewable?</dt>
        <dd><?php echo ($project['Project']['public_view']) ? 'Yes' : 'No';?></dd>

        <dt>Public Issue Adding?</dt>
        <dd><?php echo ($project['Project']['public_add']) ? 'Yes' : 'No';?></dd>
      </dl>
    </p>

    <h3>Issues</h3>

    <table class="zebra-striped">
      <thead>
        <tr>
          <th>
            ID
          </th>
          <th>
            Subject
          </th>
          <th>
            Status
          </th>
          <th>
            Priority
          </th>
          <th>
            Actions
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($project['Issue'] as $issue):?>
        <tr>
          <td>
            <?php echo $issue['id']?>
          </td>
          <td>
            <?php echo $this->Text->truncate($issue['subject'], 50)?>
          </td>
          <td>
            <?php echo $issue['status']?>
          </td>
          <td>
            <?php echo $issue['priority']?>
          </td>
          <td>
            <button class="btn primary" onclick="window.location.href='/admin/issues/edit/<?php echo $issue['id']?>';">Edit</button>
            <button class="btn primary" onclick="window.location.href='/issues/view/<?php echo $issue['id']?>';">View</button>
            <button class="btn danger" onclick="goOnConfirm('/admin/issues/delete/<?php echo $issue['id']?>', 'Are you sure you want to delete issue <?php echo $issue['id']?>?');">Delete</button>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>

  </div>
</div>
