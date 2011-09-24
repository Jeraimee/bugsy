<?php
class UsersController extends AppController {

  var $name = 'Users';

  public function beforeFilter()
  {
    parent::beforeFilter();
    $this->Auth->allow(array('add'));
  }


  public function login()
  {
    if ($this->Auth->user()) {
      $this->redirect($this->referer());
    }
  }


  public function logout()
  {
    $this->redirect($this->Auth->logout());
  }


  public function my()
  {
    if (empty($this->user)) {
      $this->setError('Invalid user ID');
      $this->redirect($this->referer());
    }

    $this->User->contain(array('Issue' => array('Project'), 'Comment'));
    $params = array('conditions' => array('id' => $this->user['User']['id']));
    $user = $this->User->find('first', $params);
    $this->set(compact('user'));
  }


  function add()
  {
    if ($this->Auth->user()) {
      $this->redirect($this->referer());
    }
    if (!empty($this->data)) {
      $this->User->create();

      if ($this->data['User']['password'] == $this->Auth->password($this->data['User']['password_confirm'])) {
        if ($this->User->save($this->data)) {
          $this->setSuccess('Your account has been added. You may now login.');
          $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
        else {
          $this->setError('The user could not be saved. Please, try again.');
        }
      }
      else {
        $this->setError('Your passwords did not match. Please, try again.');
      }
    }
    unset($this->data['User']['password']);
    unset($this->data['User']['password_confirm']);
  }


  function admin_index()
  {
    $stats = array();

    $this->User->contain();
    $stats['number_of_users'] = $this->User->find('count');

    $this->User->contain();
    $params = array('conditions' => array('confirmed' => 1));
    $stats['number_of_confirmed_users'] = $this->User->find('count', $params);

    $this->User->Issue->contain();
    $number_of_issues = $this->User->Issue->find('count');

    $stats['avg_issues_per_user'] = (floor($number_of_issues/$stats['number_of_users']));

    $this->set(compact('stats'));

    $this->User->contain();
    $this->set('users', $this->paginate());
  }


  function admin_view($id = null)
  {
    if (!$id) {
      $this->setError('Invalid user ID');
      $this->redirect($this->referer());
    }
    $this->User->contain(array('Issue', 'Comment' => array('Issue')));
    $this->set('user', $this->User->find('first', array('conditions' => array('id' => $id))));
  }


  function admin_add()
  {
    if (!empty($this->data)) {
      $this->User->create();
      if ($this->User->save($this->data)) {
        $this->setSuccess('The user has been saved');
        $this->redirect(array('action' => 'view', $this->User->getLastInsertID()));
      }
      else {
        $this->setError('The user could not be saved. Please, try again.');
      }
    }
  }


  function admin_edit($id = null)
  {
    if (!$id && empty($this->data)) {
      $this->setError(__('Invalid user', true));
      $this->redirect($this->referer());
    }
    if (!empty($this->data)) {
      if ($this->User->save($this->data)) {
        $this->setSuccess(__('The user has been saved', true));
        $this->redirect(array('controller' => 'users', 'action' => 'view', $this->data['User']['id'], 'admin' => true));
      }
      else {
        $this->setError(__('The user could not be saved. Please, try again.', true));
      }
    }
    if (empty($this->data)) {
      $this->data = $this->User->read(null, $id);
    }
  }


  function admin_delete($id = null)
  {
    if (!$id) {
      $this->Session->setFlash(__('Invalid id for user', true));
      $this->redirect(array('action'=>'index'));
    }
    if ($this->User->delete($id)) {
      $this->Session->setFlash(__('User deleted', true));
      $this->redirect(array('action'=>'index'));
    }
    $this->Session->setFlash(__('User was not deleted', true));
    $this->redirect(array('action' => 'index'));
  }

}
