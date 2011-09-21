<?php
class SearchController extends AppController {

	var $name = 'Search';

  var $uses = 'Issue';

  public function beforeFilter()
  {
    parent::beforeFilter();
    $this->Auth->allow(array('index'));
  }


  public function index()
  {
    if (empty($this->params['url']['q'])) {
      $this->redirect($this->referer());
    }

    if (is_numeric($this->params['url']['q'])) {
      /* Probably an issue id so search there first */

      $params = array('conditions' => array('Issue.id' => $this->params['url']['q']));

      if (empty($this->user)) {
        $params['conditions']['Project.public_add'] = true;
      }

      $this->Issue->contain(array('Project'));

      if ($issue = $this->Issue->find('first', $params)) {
        $this->redirect(array('controller' => 'issues', 'action' => 'view', $issue['Issue']['id'], 'admin' => false));
      }
    }

    $params = array('conditions' => array('or' => array('Issue.subject LIKE'     => "%{$this->params['url']['q']}%",
                                                        'Issue.description LIKE' => "%{$this->params['url']['q']}%",
                                                        'Issue.url LIKE'         => "%{$this->params['url']['q']}%")));

    if (empty($this->user)) {
      $params['conditions']['Project.public_add'] = true;
    }

    $this->Issue->contain(array('Project'));

    if (!$issues = $this->Issue->find('all', $params)) {
      $this->setError(__('Sorry, no issues were found matching your query.', true));
      $this->redirect($this->referer());
    }
    if (count($issues) == 1) {
      $this->redirect(array('controller' => 'issues', 'action' => 'view', $issues[0]['Issue']['id'], 'admin' => false));
    }
    $this->set('q', $this->params['url']['q']);
    $this->set(compact('issues'));
  }

}
