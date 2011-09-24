<?php
class IssuesController extends AppController {

  var $name = 'Issues';

  public function beforeFilter()
  {
    parent::beforeFilter();
    $this->Auth->allow(array('index', 'add', 'view'));
  }

  function index()
  {
    if (empty($this->user)) {
      $this->paginate['conditions']['Project.public_add'] = true;
    }

    $this->Issue->contain(array('Project'));
    $this->set('issues', $this->paginate());
  }


  function view($id = null)
  {
    if (!$id) {
      $this->setError('Invalid issue ID');
      $this->redirect($this->referer());
    }
    $this->Issue->contain(array('Project', 'Comment' => array('User')));
    $this->set('issue', $this->Issue->read(null, $id));
  }


  function add($project_id = null)
  {
    if (!empty($this->data)) {

      $this->data['Issue']['status'] = 'New';
      if (!empty($this->user)) {
        $this->data['Issue']['user_id'] = $this->user['User']['id'];
      }

      $this->Issue->create();
      if ($this->Issue->save($this->data)) {

        $issue_id = $this->Issue->getLastInsertID();

        $this->setSuccess("Issue {$issue_id} has been added.");
        $this->redirect(array('action' => 'view', $issue_id));
      }
      else {
        $this->setError('Your issue could not be saved. Please, try again.');
      }
    }

    $params = array();
    if (empty($this->user)) {
      $params['conditions'] = array('Project.public_add' => true);
    }
    $projects = $this->Issue->Project->find('list', $params);

    if (empty($projects)) {
      $this->setError('No projects are currently available.');
      $this->redirect($this->referer());
    }

    $priorities = Configure::read('Defaults.priorities');

    $this->set(compact('projects', 'priorities', 'project_id'));

  }


  function edit($id = null)
  {
    if (!$id && empty($this->data)) {
      $this->setError('Invalid issue ID');
      $this->redirect($this->referer());
    }
    if (!empty($this->data)) {
      if ($this->Issue->save($this->data)) {
        $this->setSuccess("Issue {$this->data['Issue']['id']} has been updated.");
        $this->redirect(array('action' => 'view', $this->data['Issue']['id']));
      }
      else {
        $this->setError('The Issue could not be saved. Please, try again.');
      }
    }
    if (empty($this->data)) {
      $this->data = $this->Issue->read(null, $id);
    }
    $projects = $this->Issue->Project->find('list');
    $this->set(compact('projects'));
  }


  function admin_index()
  {
    $this->Issue->recurisve = 0;
    $this->set('issues', $this->paginate());
  }


  function admin_delete($id = null)
  {
    if (!$id) {
      $this->setError('Invalid issue ID');
      $this->redirect($this->referer());
    }
    if ($this->Issue->delete($id)) {
      $this->setSuccess('Issue deleted.');
      $this->redirect(array('action' => 'index'));
    }
    $this->setError('There was an error deleting the issue. Please, try again.');
    $this->redirect($this->referer());
  }

}
