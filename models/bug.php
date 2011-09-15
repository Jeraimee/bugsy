<?php
class Bug extends AppModel {

  var $name = 'Bug';

  var $displayField = 'name';

  var $validate = array('project_id' => array('numeric' => array('rule'     => array('numeric'),
                                                                 'message'  => 'Invalid value for project_id',
                                                                 'required' => true)),
                        'user_id' => array('numeric' => array('rule'     => array('numeric'),
                                                              'message'  => 'Invalid value for user_id',
                                                              'required' => true)),
                        'subject' => array('notempty' => array('rule'     => array('notempty'),
                                                               'message'  => 'Subject is a required field',
                                                               'required' => true)),
                        'url' => array('url' => array('rule'     => array('url'),
                                                      'message'  => 'URL must be a valid URL',
                                                      'required' => false)),
                        'status' => array('notempty' => array('rule'     => array('notempty'),
                                                              'message'  => 'Status is a required field',
                                                              'required' => true)),
                        'priority' => array('notempty' => array('rule'     => array('notempty'),
                                                                'message'  => 'Priority is a required field',
                                                                'required' => true)));

  var $belongsTo = array('Project' => array('className'  => 'Project',
                                            'foreignKey' => 'project_id',
                                            'conditions' => '',
                                            'fields'     => '',
                                            'order'      => ''),
                         'User' => array('className'  => 'User',
                                         'foreignKey' => 'user_id',
                                         'conditions' => '',
                                         'fields'     => '',
                                         'order'      => ''));

  var $hasMany = array('Comment' => array('className'    => 'Comment',
                                          'foreignKey'   => 'bug_id',
                                          'dependent'    => false,
                                          'conditions'   => '',
                                          'fields'       => '',
                                          'order'        => '',
                                          'limit'        => '',
                                          'offset'       => '',
                                          'exclusive'    => '',
                                          'finderQuery'  => '',
                                          'counterQuery' => ''));

}
