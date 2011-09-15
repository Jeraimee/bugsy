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
    $this->Issue->recursive = 0;
    $this->set('Issues', $this->paginate());
  }


  function view($id = null)
  {
    if (!$id) {
      $this->Session->setFlash(__('Invalid Issue', true));
      $this->redirect(array('action' => 'index'));
    }
    $this->set('Issue', $this->Issue->read(null, $id));
  }


  function add($project_id = null)
  {
    if (!empty($this->data)) {

      $this->data['Issue']['status'] = 'New';
      if (!empty($this->user)) {
        $this->data['Issue']['user_id'] = $this->user['id'];
      }

      $this->Issue->create();
      if ($this->Issue->save($this->data)) {
        $this->setSuccess(__('The Issue has been saved', true));
        $this->redirect(array('action' => 'view', $this->Issue->getLastInsertID()));
      }
      else {
        $this->setError(__('The Issue could not be saved. Please, try again.', true));
      }
    }

    $params = array();
    if (empty($this->user)) {
      $params['conditions'] = array('Project.public_add' => true);
    }
    $projects = $this->Issue->Project->find('list', $params);

    if (empty($projects)) {
      $this->setError(__('No projects are currently available.', true));
      $this->redirect('/');
    }

    $users = $this->Issue->User->find('list');
    $priorities = Configure::read('Defaults.priorities');

    $this->set(compact('projects', 'users', 'priorities', 'project_id'));

  }


  function edit($id = null)
  {
    if (!$id && empty($this->data)) {
      $this->Session->setFlash(__('Invalid Issue', true));
      $this->redirect(array('action' => 'index'));
    }
    if (!empty($this->data)) {
      if ($this->Issue->save($this->data)) {
        $this->Session->setFlash(__('The Issue has been saved', true));
        $this->redirect(array('action' => 'index'));
      }
      else {
        $this->Session->setFlash(__('The Issue could not be saved. Please, try again.', true));
      }
    }
    if (empty($this->data)) {
      $this->data = $this->Issue->read(null, $id);
    }
    $projects = $this->Issue->Project->find('list');
    $users = $this->Issue->User->find('list');
    $this->set(compact('projects', 'users'));
  }

}
