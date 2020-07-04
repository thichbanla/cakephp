<?php
	class FormatController extends AppController{
		
		public function q1(){
			
			$this->setFlash('Question: Please change Pop Up to mouse over (soft click)');
			
			if($this->request->is('post')){
				$selection = $this->request->data['Type']['type'];
				$this->Session->write('selection', $selection);                 					
				$this->redirect(array('controller' => 'Format', 'action' => 'selected'));				
			}
			
// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
		}	
		
		public function q1_detail(){

			$this->setFlash('Question: Please change Pop Up to mouse over (soft click)');				
			
// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
		}

		public function selected(){	
			$selection = $this->Session->read('selection');
			$this->set('selection', $selection);							
		}
		
	}