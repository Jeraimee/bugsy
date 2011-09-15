<?php
class Project extends AppModel {

  var $name = 'Project';

  var $displayField = 'name';

  var $validate = array('name' => array('notempty' => array('rule'     => array('notempty'),
                                                            'message'  => 'Name is a required field',
                                                            'required' => true)),
                        'public_view' => array('boolean' => array('rule'     => array('boolean'),
                                                                  'message'  => 'Invalid value for public_view',
                                                                  'required' => true)),
                        'public_add' => array('boolean' => array('rule'     => array('boolean'),
                                                                 'message'  => 'Invalid value for public_add',
                                                                 'required' => true)));

  var $hasMany = array('Issue' => array('className'    => 'Issue',
                                        'foreignKey'   => 'project_id',
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
