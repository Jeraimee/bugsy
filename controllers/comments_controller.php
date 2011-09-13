<?php
class CommentsController extends AppController {

  var $name = 'Comments';

  function add()
  {
    if (!empty($this->data)) {
      $this->Comment->create();
      if ($this->Comment->save($this->data)) {
        $this->Session->setFlash(__('The comment has been saved', true));
        $this->redirect(array('action' => 'index'));
      }
      else {
        $this->Session->setFlash(__('The comment could not be saved. Please, try again.', true));
      }
    }
    $bugs = $this->Comment->Bug->find('list');
    $users = $this->Comment->User->find('list');
    $this->set(compact('bugs', 'users'));
  }


  function edit($id = null)
  {
    if (!$id && empty($this->data)) {
      $this->Session->setFlash(__('Invalid comment', true));
      $this->redirect(array('action' => 'index'));
    }
    if (!empty($this->data)) {
      if ($this->Comment->save($this->data)) {
        $this->Session->setFlash(__('The comment has been saved', true));
        $this->redirect(array('action' => 'index'));
      }
      else {
        $this->Session->setFlash(__('The comment could not be saved. Please, try again.', true));
      }
    }
    if (empty($this->data)) {
      $this->data = $this->Comment->read(null, $id);
    }
    $bugs = $this->Comment->Bug->find('list');
    $users = $this->Comment->User->find('list');
    $this->set(compact('bugs', 'users'));
  }


  function delete($id = null)
  {
    if (!$id) {
      $this->Session->setFlash(__('Invalid id for comment', true));
      $this->redirect(array('action'=>'index'));
    }
    if ($this->Comment->delete($id)) {
      $this->Session->setFlash(__('Comment deleted', true));
      $this->redirect(array('action'=>'index'));
    }
    $this->Session->setFlash(__('Comment was not deleted', true));
    $this->redirect(array('action' => 'index'));
  }


  function admin_delete($id = null)
  {
    if (!$id) {
      $this->Session->setFlash(__('Invalid id for comment', true));
      $this->redirect(array('action'=>'index'));
    }
    if ($this->Comment->delete($id)) {
      $this->Session->setFlash(__('Comment deleted', true));
      $this->redirect(array('action'=>'index'));
    }
    $this->Session->setFlash(__('Comment was not deleted', true));
    $this->redirect(array('action' => 'index'));
  }

}
