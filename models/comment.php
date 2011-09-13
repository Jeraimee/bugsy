<?php
class Comment extends AppModel {

  var $name = 'Comment';

  var $displayField = 'comment';

  var $validate = array('bug_id' => array('numeric' => array('rule'     => array('numeric'),
                                                             'message'  => 'Invalid value for bug_id',
                                                             'required' => true)),
                        'user_id' => array('numeric' => array('rule'     => array('numeric'),
                                                              'message'  => 'Invalid value for user_id',
                                                              'required' => true)));

  var $belongsTo = array('Bug' => array('className'  => 'Bug',
                                        'foreignKey' => 'bug_id',
                                        'conditions' => '',
                                        'fields'     => '',
                                        'order'      => ''),
                         'User' => array('className'  => 'User',
                                         'foreignKey' => 'user_id',
                                         'conditions' => '',
                                         'fields'     => '',
                                         'order'      => ''));

}
