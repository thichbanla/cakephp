<?php

class Portion extends AppModel{

	var $belongsTo = array('Item');

	var $hasMany = array('PortionDetail' => array(
								'conditions' => array('PortionDetail.valid' => 1)
							)
						);
	public function getIngredients($portionId = null){
		$PortionDetail = ClassRegistry::init('PortionDetail');			
		$Part = ClassRegistry::init('Part');	
		$portion_details = $PortionDetail->find('all', array('conditions'=>array('portion_id'=>$portionId, 'PortionDetail.valid'=>1), 'recursive'=>-1));				
		$ingredients = array();
		foreach ($portion_details as $portion_detail){
			$part_id = $portion_detail['PortionDetail']['part_id'];
			$part_val = $portion_detail['PortionDetail']['value']; //qty of a part/an item
			$part = $Part->find('first', array('conditions'=>array('id'=>$part_id, 'Part.valid'=>1), 'recursive'=>-1));			
			$part_name = $part['Part']['name'];			
			$ingredients[$part_name] = $part_val;
		}			
		return $ingredients;
	}
}