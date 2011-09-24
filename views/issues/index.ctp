<?php $this->pageTitle = 'Issues'?>
<div class="row">
  <div class="span4 columns">
    <h3>Issues</h3>
    <?php if (empty($user)):?>
      <p class="alert-message block-message info">
        You are not logged in. You may only view issues in publicly accessible projects.
      </p>
      <?php endif;?>
      <p>
        <?php echo $this->Paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)))?>
      </p>
  </div>
  <div class="span12 columns">

    <table class="zebra-striped">
      <thead>
        <tr>
          <th>
            ID
          </th>
          <th>
            Project
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
        <?php foreach ($issues as $issue):?>
        <tr>
          <td>
            <?php echo $issue['Issue']['id']?>
          </td>
          <td>
            <?php echo $issue['Project']['name']?>
          </td>
          <td>
            <?php echo $this->Text->truncate($issue['Issue']['subject'], 50)?>
          </td>
          <td>
            <?php echo $issue['Issue']['status']?>
          </td>
          <td>
            <?php echo $issue['Issue']['priority']?>
          </td>
          <td>
            <?php if (!empty($user)):?>
            <button class="btn primary" onclick="window.location.href='/issues/edit/<?php echo $issue['Issue']['id']?>';">Edit</button>
            <?php endif;?>
            <button class="btn primary" onclick="window.location.href='/issues/view/<?php echo $issue['Issue']['id']?>';">View</button>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>

  </div>
</div>
