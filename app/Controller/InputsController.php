<?php
App::uses('AppController', 'Controller');
/**
 * Inputs Controller
 *
 * @property Input $Input
 * @property PaginatorComponent $Paginator
 */
class InputsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Input->recursive = -1;
		$inputs = $this->Input->find('all');			
			$this->set('inputs',$inputs);		
			
			$this->set('title',__('List Input'));

	}
}
