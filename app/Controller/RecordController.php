<?php
	class RecordController extends AppController{
		
		public function index(){
			ini_set('memory_limit','256M');
			set_time_limit(0);
			
			$this->setFlash('Listing Record page too slow, try to optimize it.');
			
			$this->Record->recursive = -1;
			//$records = $this->Record->find('all');			
			$records = $this->Record->find('all', array('cache' => 'recordList', 'cacheConfig' => 'short'));			
			$this->set('records',$records);		
			
			$this->set('title',__('List Record'));
		}
		
		
// 		public function update(){
// 			ini_set('memory_limit','256M');
			
// 			$records = array();
// 			for($i=1; $i<= 1000; $i++){
// 				$record = array(
// 					'Record'=>array(
// 						'name'=>"Record $i"
// 					)			
// 				);
				
// 				for($j=1;$j<=rand(4,8);$j++){
// 					@$record['RecordItem'][] = array(
// 						'name'=>"Record Item $j"		
// 					);
// 				}
				
// 				$this->Record->saveAssociated($record);
// 			}
			
			
			
// 		}
	}