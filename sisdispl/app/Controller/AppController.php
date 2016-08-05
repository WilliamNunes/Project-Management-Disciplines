<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
      public function afterFilter() {
        if(!in_array($this->action, array('adm_login', 'adm_cadastro', 'index_login', 'index_cadastro'))){
          if(in_array($this->action, array('adm_aluno','adm_curriculo','adm_curso','adm_disciplina','adm_geral', 'adm_requisito',
                                           'adm_edit', 'adm_aluno_edit', 'adm_requisito_edit', 'adm_curriculo_edit', 'adm_disciplina_edit',
                                           'adm_curso_edit'))){
          $this->autenticaradm();
          }
          else {
            $this->autenticar();
          }
        }
      }

      public function autenticar() {
        if (! $this->Session->check('Aluno')) {
          $this->redirect(array('controller' => 'alunos', 'action' => 'index_login'));
          exit();
        } else {
          $aluno = $this->Session->read('Aluno');
          $this->Flash->set($aluno['0']['Aluno']['nome']);
        }
      }

      public function autenticaradm(){
        if (! $this->Session->check('Usuario')) {
          $this->redirect(array('controller' => 'usuarios', 'action' => 'adm_login'));
          exit();
        } else {
          $usuario = $this->Session->read('Usuario');
          $this->Flash->set($usuario['0']['Usuario']['nome']);
        }
      }
}
