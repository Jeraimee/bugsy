<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bugsy | <?php echo (!empty($this->pageTitle) ? $this->pageTitle :$title_for_layout)?></title>
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php echo $this->Html->css(array('bootstrap-1.2.0.min.css', 'bugsy.css'));
    echo $scripts_for_layout;
    echo $this->Html->meta('icon')?>
  </head>

  <body style="padding-top: 40px;">

    <div class="topbar">
      <div class="topbar-inner">
        <div class="container">

          <h3><?php echo $this->Html->link('Bugsy', '/', array('title' => 'Simple Bug Tracking'))?></h3>
          <ul class="nav">
            <li><?php echo $this->Html->link('Add Bug', array('controller' => 'bugs', 'action' => 'add'))?></li>
            <li><a href="#about">About</a></li>
            <li><a href="#grid-system">Grid</a></li>
            <li><a href="#layouts">Layouts</a></li>
            <li><a href="#typography">Typography</a></li>
          </ul>

          <form action="">
            <input type="text" placeholder="Search..." />
          </form>

          <ul class="nav secondary-nav">
            <?php if (empty($user)):?>
            <li><?php echo $this->Html->link('Create Account', array('controller' => 'users', 'action' => 'add'))?></li>
            <li><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'))?></li>
            <?php else:?>
            <li><?php echo $this->Html->link('Manage Account', array('controller' => 'users', 'action' => 'my'))?></li>
            <li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'))?></li>
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
