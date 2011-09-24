<?php $this->pageTitle = 'Issues'?>
<div class="row">
  <div class="span4 columns">
    <h3>Issues</h3>
    <p>
    	<?php echo $this->Paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)))?>
    </p>
    <ul>
      <li><?php echo $this->Html->link('Add Issue', array('controller' => 'issues', 'action' => 'add', 'admin' => false))?></li>
    </ul>
  </div>
  <div class="span12 columns">

    <table class="zebra-striped">
      <thead>
        <tr>
          <th>
            <?php echo $this->Paginator->sort('id')?>
          </th>
          <th>
            <?php echo $this->Paginator->sort('Project', 'Project.name')?>
          </th>
          <th>
            <?php echo $this->Paginator->sort('subject')?>
          </th>
          <th>
            <?php echo $this->Paginator->sort('status')?>
          </th>
          <th>
            <?php echo $this->Paginator->sort('priority')?>
          </th>
          <th>
            Actions
          </th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($issues as $issue):?>
        <tr>
          <td>
            <?php echo $issue['Issue']['id']?>
          </td>
          <td>
            <?php echo $issue['Project']['name']?>
          </td>
          <td>
            <?php echo $issue['Issue']['subject']?>
          </td>
          <td>
            <?php echo $issue['Issue']['status']?>
          </td>
          <td>
            <?php echo $issue['Issue']['priority']?>
          </td>
          <td>
            <button class="btn primary" onclick="window.location.href='/issues/view/<?php echo $issue['Issue']['id']?>';">View</button>
            <button class="btn primary" onclick="window.location.href='/issues/edit/<?php echo $issue['Issue']['id']?>';">Edit</button>
          </td>
        </tr>
      <?php endforeach;?>
      </tbody>
    </table>

  </div>
</div>
