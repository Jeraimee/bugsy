<?php
class ProjectsController extends AppController {

  var $name = 'Projects';

  public function beforeFilter()
  {
    parent::beforeFilter();
    $this->Auth->allow(array('index', 'view'));
  }


  public function index()
  {
    if (empty($this->user)) {
      $this->paginate = array('conditions' => array('Project.public_view' => true));
    }
    $this->Project->recursive = 0;
    $this->set('projects', $this->paginate());
  }


  function view($id = null)
  {
    if (!$id) {
      $this->setError('Invalid project id.');
      $this->redirect(array('action' => 'index'));
    }
    $this->set('project', $this->Project->read(null, $id));
  }


  function add()
  {
    if (!empty($this->data)) {
      $this->Project->create();
      if ($this->Project->save($this->data)) {
        $this->setSuccess("{$this->data['Project']['name']} has been added.");
        $this->redirect(array('action' => 'view', $this->Project->getLastInsertID()));
      }
      else {
        $this->setError('The project could not be added. Please, try again.');
      }
    }
  }


  function edit($id = null)
  {
    if (!$id && empty($this->data)) {
      $this->setError('Invalid project id');
      $this->redirect(array('action' => 'index'));
    }
    if (!empty($this->data)) {
      if ($this->Project->save($this->data)) {
        $this->setSuccess("{$this->data['Project']['name']} was updated.");
        $this->redirect(array('action' => 'view', $this->data['Project']['id']));
      }
      else {
        $this->setError("{$this->data['Project']['name']} could not be saved. Please, try again.");
      }
    }
    if (empty($this->data)) {
      $this->data = $this->Project->read(null, $id);
    }
  }


  function admin_index()
  {
    $this->Project->recursive = 0;
    $this->set('projects', $this->paginate());
  }


  function admin_view($id = null)
  {
    if (!$id) {
      $this->setError('Invalid project ID');
      $this->redirect($this->referer());
    }
    $this->set('project', $this->Project->read(null, $id));
  }


  function admin_add()
  {
    if (!empty($this->data)) {
      $this->Project->create();
      if ($this->Project->save($this->data)) {
        $this->setSuccess("{$this->data['Project']['name']} has been added.");
        $this->redirect(array('action' => 'index', $this->Project->getLastInsertID()));
      }
      else {
        $this->setError('The project could not be saved. Please, try again.');
      }
    }
  }


  function admin_edit($id = null)
  {
    if (!$id && empty($this->data)) {
      $this->setSuccess('Invalid project ID');
      $this->redirect($this->referer());
    }
    if (!empty($this->data)) {
      if ($this->Project->save($this->data)) {
        $this->setSuccess("{$this->data['Project']['name']} has been saved.");
        $this->redirect(array('action' => 'view', $this->data['Project']['id']));
      }
      else {
        $this->setError('The project could not be saved. Please, try again.');
      }
    }
    if (empty($this->data)) {
      $this->data = $this->Project->read(null, $id);
    }
  }


  function admin_delete($id = null)
  {
    if (!$id) {
      $this->setError('Invalid project ID');
      $this->redirect($ths->referer());
    }
    if ($this->Project->delete($id)) {
      $this->setSuccess('Project deleted.');
      $this->redirect(array('action'=>'index'));
    }
    $this->setError('There was an error deleting the project. Please, try again.');
    $this->redirect($this->referer());
  }

}
