<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {

  var $components = array('Auth', 'Cookie',
                          'RequestHandler', 'Session',
                          'DebugKit.Toolbar' => array('panels' => array('history' => false,
                                                                        'log'     => false)));

  var $helpers = array('Form', 'Html', 'Js', 'Session', 'Time', 'Text', 'Ajax');

  function beforeRender()
  {
    $this->user = $this->Auth->user();
    $this->set('user', $this->user);
  }


  function setError($message)
  {
    return $this->Session->setFlash($message, 'error');
  }


  function setSuccess($message)
  {
    return $this->Session->setFlash($message, 'success');
  }

}
