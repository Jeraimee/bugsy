<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
  var $name = 'Pages';

/**
 * Default helper
 *
 * @var array
 * @access public
 */
  var $helpers = array('Html');

/**
 * This controller does not use a model
 *
 * @var array
 * @access public
 */
  var $uses = array();

  public function beforeFilter()
  {
    parent::beforeFilter();
    $this->Auth->allow(array('display'));
  }

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @access public
 */
  function display() {
    $path = func_get_args();

    $count = count($path);
    if (!$count) {
      $this->redirect('/');
    }
    $page = $subpage = $title_for_layout = null;

    if (!empty($path[0])) {
      $page = $path[0];
    }
    if (!empty($path[1])) {
      $subpage = $path[1];
    }
    if (!empty($path[$count - 1])) {
      $title_for_layout = Inflector::humanize($path[$count - 1]);
    }

    if ($page == 'home') {

      $this->Project = ClassRegistry::init('Project');
      $params = array('order' => array('Project.modified DESC'));
      if (empty($this->user)) {
        $params['conditions'] = array('Project.public_view' => true);
      }
      $this->Project->contain();
      $projects = $this->Project->find('all', $params);

      $params = array('order' => array('Issue.modified DESC'));
      if (empty($this->user)) {
        $params['conditions'] = array('Project.public_view' => true);
      }
      $this->Project->Issue->contain(array('Project'));
      $issues = $this->Project->Issue->find('all', $params);

      $params = array('order' => array('Comment.created DESC'));
      if (empty($this->user)) {
        $params['conditions'] = array('Issue.project_id' => array());
        foreach ($projects as $project) {
          $params['conditions']['Issue.project_id'][] = $project['Project']['id'];
        }
      }
      $this->Project->Issue->Comment->contain(array('Issue'));
      $comments = $this->Project->Issue->Comment->find('all', $params);

      if (!$stats = Cache::read('stats')) {
        $stats = array();

        $this->Project->Issue->contain();
        $stats['num_issues'] = $this->Project->Issue->find('count');
        $this->Project->contain();
        $stats['num_projects'] = $this->Project->find('count');

        Cache::write('stats', $stats);
      }
      $this->set('stats', $stats);
    }

    $this->set(compact('page', 'subpage', 'title_for_layout', 'projects', 'issues', 'comments'));
    $this->render(implode('/', $path));
  }
}
