<?php $this->pageTitle = 'Projects'?>
<div class="row">
  <div class="span4 columns">
    <h3>Projects</h3>
    <?php if (empty($user)):?>
      <p class="alert-message block-message info">
        You are not logged in. You may only view publicly accessible projects.
      </p>
      <?php else:?>
      <p>
        <ul>
          <li><?php echo $this->Html->link('Add Project', array('controller' => 'projects', 'action' => 'add'))?></li>
        </ul>
      </p>
      <?php endif;?>
  </div>
  <div class="span12 columns">

    <table class="zebra-striped">
      <thead>
        <tr>
          <th>
            Project Name
          </th>
          <th>
            Description
          </th>
          <th>
            Issue Count
          </th>
          <th>
            Actions
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($projects as $project):?>
        <tr>
          <td>
            <?php echo $project['Project']['name']?>
          </td>
          <td>
            <?php echo $this->Text->truncate($project['Project']['description'], 50)?>
          </td>
          <td>
            <?php echo number_format($project['Project']['issue_count'])?>
          </td>
          <td>
            <?php if (!empty($user)):?>
            <button class="btn primary" onclick="window.location.href='/projects/edit/<?php echo $project['Project']['id']?>';">Edit</button>
            <?php endif;?>
            <button class="btn primary" onclick="window.location.href='/projects/view/<?php echo $project['Project']['id']?>';">View</button>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>

  </div>
</div>
