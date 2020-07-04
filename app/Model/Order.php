<?php
	class Order extends AppModel{
		
		var $hasMany = array('OrderDetail' => array(
									'conditions' => array('OrderDetail.valid' => 1)
								)
							);	
		public function getIngredients($orderId = null){
			$OrderDetail = ClassRegistry::init('OrderDetail');
			$Portion = ClassRegistry::init('Portion');
			
			$order_details = $OrderDetail->find('all', array('conditions'=>array('order_id'=> $orderId, 'OrderDetail.valid'=>1), 'recursive'=>-1));			
			$item = array();
			foreach ($order_details as $order_detail){									
				$item_id = $order_detail['OrderDetail']['item_id'];					
				$item_qty = $order_detail['OrderDetail']['quantity']; //qty of items
				//debug($order_details);exit;
				
				$portion = $Portion->find('first', array('conditions'=>array('item_id'=>$item_id, 'Portion.valid'=>1), 'recursive'=>-1));															
				$id = $portion['Portion']['id'];
				$ingredients = $Portion->getIngredients($id);										
				
				foreach($ingredients as &$ingredient){
					$ingredient = $ingredient * $item_qty;	
				}	
				$item[$item_id] = $ingredients;				
			}
			return $item;
		}
	}