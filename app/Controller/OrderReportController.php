<?php
	class OrderReportController extends AppController{

		public function index(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));
			//debug($orders);exit;

			$this->loadModel('Part');
			$parts = $this->Part->find('all',array('conditions'=>array('Part.valid'=>1),'recursive'=>-1));
			// debug($portions);exit;	

			// To Do - write your own array in this format
			// $order_reports = array('Order 1' => array(
			// 							'Ingredient A' => 1,
			// 							'Ingredient B' => 12,
			// 							'Ingredient C' => 3,
			// 							'Ingredient G' => 5,
			// 							'Ingredient H' => 24,
			// 							'Ingredient J' => 22,
			// 							'Ingredient F' => 9,
			// 						),
			// 					  'Order 2' => array(
			// 					  		'Ingredient A' => 13,
			// 					  		'Ingredient B' => 2,
			// 					  		'Ingredient G' => 14,
			// 					  		'Ingredient I' => 2,
			// 					  		'Ingredient D' => 6,
			// 					  	),
			// 					);

			// ...			
			$this->loadModel("OrderDetail");
			$this->loadModel("Portion");
			$this->loadModel("PortionDetail");
			$this->loadModel("Item");
			$order_reports = array();

			foreach($orders as $order){
				$id = $order['Order']['id'];
				$order_name = $order['Order']['name'];
				$ingredientsPerItem = $this->Order->getIngredients($id);
				$total_ingredients = array();

				foreach($parts as $part){
					$total_ingredients[$part['Part']['name']] = 0;
				}
				
				foreach ($parts as $part){
					foreach($ingredientsPerItem as $ingredients){
						foreach ($ingredients as $key=>$value){
							$name = $part['Part']['name'];																	
							if($name == $key){								
								$total_ingredients[$key] += $value;																
							}							
						}						
					}					
				}				
				$total_ingredients = array_filter($total_ingredients);					
				$order_reports[$order_name] = $total_ingredients;				
			}			
			

			$this->set('order_reports',$order_reports);

			$this->set('title',__('Orders Report'));
		}

		public function Question(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));

			// debug($orders);exit;

			$this->set('orders',$orders);

			$this->loadModel('Portion');
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));
				
			// debug($portions);exit;

			$this->set('portions',$portions);

			$this->set('title',__('Question - Orders Report'));
		}

	}
