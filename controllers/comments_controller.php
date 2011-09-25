<?php
class CommentsController extends AppController {

  var $name = 'Comments';

  function add()
  {
    if (!empty($this->data)) {
      $this->Comment->create();

      if (!empty($this->user)) {
        $this->data['Comment']['user_id'] = $this->user['User']['id'];
      }

      if ($this->Comment->save($this->data)) {
        $this->setSuccess('Your comment has been added.');
        $this->redirect($this->referer());
      }
      else {
        $this->setError('Your comment could not be saved. Please, try again.');
        $this->redirect($this->referer());
      }
    }
  }


  function admin_delete($id = null)
  {
    if (!$id) {
      $this->setError('Invalid comment ID');
      $this->redirect($this->referer());
    }
    if ($this->Comment->delete($id)) {
      $this->setSuccess('Comment deleted.');
      $this->redirect($this->referer());
    }
    $this->setError('There was an error deleting the comment. Please, try again.');
    $this->redirect($this->referer());
  }

}
