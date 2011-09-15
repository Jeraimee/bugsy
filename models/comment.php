<?php
class Comment extends AppModel {

  var $name = 'Comment';

  var $displayField = 'comment';

  var $validate = array('issue_id' => array('numeric' => array('rule'     => array('numeric'),
                                                               'message'  => 'Invalid value for issue_id',
                                                               'required' => true)),
                        'user_id' => array('numeric' => array('rule'     => array('numeric'),
                                                              'message'  => 'Invalid value for user_id',
                                                              'required' => true)));

  var $belongsTo = array('Issue' => array('className'  => 'Issue',
                                          'foreignKey' => 'issue_id',
                                          'conditions' => '',
                                          'fields'     => '',
                                          'order'      => ''),
                         'User' => array('className'  => 'User',
                                         'foreignKey' => 'user_id',
                                         'conditions' => '',
                                         'fields'     => '',
                                         'order'      => ''));

}
