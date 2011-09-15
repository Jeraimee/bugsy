<?php $this->pageTitle = $project['Project']['name']?>
<div class="row">
  <div class="span4 columns">
    <h3>Project Actions</h3>
    <?php if (empty($user)):?>
    <p class="alert-message block-message info">
      You are not logged in. You may only add issues to projects that allow public issue adding.
    </p>
    <?php endif;?>
    <ul>
      <?php if (!empty($user)):?>
      <li><?php echo $this->Html->link('Edit Project', array('action' => 'edit', $project['Project']['id']))?></li>
      <?php endif;?>
      <?php if (!empty($user) or ($project['Project']['public_add'] == 1)):?>
      <li><?php echo $this->Html->link('Add Issue', array('controller' => 'issues', 'action' => 'add', $project['Project']['id'], 'admin' => false))?></li>
      <?php endif;?>
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
            <?php if (!empty($user)):?>
            <button class="btn primary" onclick="window.location.href='/issues/edit/<?php echo $issue['id']?>';">Edit</button>
            <?php endif;?>
            <button class="btn primary" onclick="window.location.href='/issues/view/<?php echo $issue['id']?>';">View</button>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>

  </div>
</div>
