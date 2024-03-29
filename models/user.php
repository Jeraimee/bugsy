<?php

class User extends AppModel {

  var $name = 'User';

  var $displayField = 'username';

  var $validate = array('username' => array('notempty' => array('rule'     => array('notempty'),
                                                                'message'  => 'Username is a required field',
                                                                'required' => true),
                                            'unique' => array('rule'    => array('isUnique'),
                                                              'message' => 'This username is already in use.')),
                        'password' => array('notempty' => array('rule'     => array('notempty'),
                                                                'message'  => 'Password is a required field',
                                                                'required' => true,
                                                                'on'       => array('add', 'login'))),
                        'email_address' => array('email' => array('rule'    => array('email'),
                                                                  'message' => 'Email Address must be a valid email address'),
                                                 'notempty' => array('rule'     => array('notempty'),
                                                                     'message'  => 'Email is a required field',
                                                                     'required' => true)),
                        'confirmed' => array('boolean' => array('rule'       => array('boolean'),
                                                                'message'    => 'Invalid value for confirmed',
                                                                'required'   => false,
                                                                'allowEmpty' => true)));


  var $hasMany = array('Issue' => array('className'    => 'Issue',
                                        'foreignKey'   => 'user_id',
                                        'dependent'    => false,
                                        'conditions'   => '',
                                        'fields'       => '',
                                        'order'        => '',
                                        'limit'        => '',
                                        'offset'       => '',
                                        'exclusive'    => '',
                                        'finderQuery'  => '',
                                        'counterQuery' => ''),
                       'Comment' => array('className'    => 'Comment',
                                          'foreignKey'   => 'user_id',
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
