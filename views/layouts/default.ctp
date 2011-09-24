<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bugsy | <?php echo (!empty($this->pageTitle) ? $this->pageTitle :$title_for_layout)?></title>
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php echo $this->Html->css(array('bootstrap-1.2.0.min.css', 'bugsy.css'));
    echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js');
    echo $this->Html->script(array('bootstrap-dropdown', 'bootstrap-alerts'));
    echo $scripts_for_layout;
    echo $this->Html->meta('icon')?>
  </head>

  <body style="padding-top: 40px;">

    <div class="topbar">
      <div class="topbar-inner">
        <div class="container">

          <h3><?php echo $this->Html->link('Bugsy', '/', array('title' => 'Simple Issue Tracking'))?></h3>
          <ul class="nav">
            <li><?php echo $this->Html->link('Add Issue', array('controller' => 'issues', 'action' => 'add'))?></li>
            <li><?php echo $this->Html->link('Projects', array('controller' => 'projects', 'action' => 'index'))?></li>
            <li><?php echo $this->Html->link('Issues', array('controller' => 'issues', 'action' => 'index'))?></li>
          </ul>

          <form action="<?php echo $this->base?>/search" method="get" style="padding-left: 10em;">
            <input type="text" id="q" name="q" placeholder="Search..." />
          </form>

          <ul class="nav secondary-nav">
            <?php if (empty($user)):?>
            <li><?php echo $this->Html->link('Create Account', array('controller' => 'users', 'action' => 'add'))?></li>
            <li><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login', 'admin' => false))?></li>
            <?php else:?>
              <?php if ($user['User']['id'] == 1):?>
              <li class="dropdown" data-dropdown="dropdown">
                <?php echo $this->Html->link('Admin', '#', array('class' => 'dropdown-toggle'))?>
                <ul class="dropdown-menu">
                  <li><?php echo $this->Html->link('Issues', array('controller' => 'issues', 'action' => 'index', 'admin' => true))?></li>
                  <li><?php echo $this->Html->link('Projects', array('controller' => 'projects', 'action' => 'index', 'admin' => true))?></li>
                  <li><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index', 'admin' => true))?></li>
                </ul>
              </li>
              <?php endif;?>
            <li><?php echo $this->Html->link('Manage Account', array('controller' => 'users', 'action' => 'my', 'admin' => false))?></li>
            <li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => false))?></li>
            <?php endif;?>
          </ul>

        </div>
      </div>
    </div>

    <div class="container">

      <?php echo $this->Session->flash(); echo $this->Session->flash('auth');?>
      <?php echo $content_for_layout;?>

      <footer>
         <p>
           <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/3.0/80x15.png" /></a> Bugsy is &copy; Jeraimee Hughes
         </p>
      </footer>

    </div>
  </body>
</html>
