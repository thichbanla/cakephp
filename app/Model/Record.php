<?php
	class Record extends AppModel{		
		public $hasMany = array('RecordItem');		

		function find($conditions = null, $fields = array(), $order = null, $recursive = null) {
			$doQuery = true;
			// check if we want the cache
			if (!empty($fields['cache'])) {
				$cacheConfig = null;
				// check if we have specified a custom config
				if (!empty($fields['cacheConfig'])) {
					$cacheConfig = $fields['cacheConfig'];
				}
				$cacheName = $this->name . '-' . $fields['cache'];
				// if so, check if the cache exists
				$data = Cache::read($cacheName, $cacheConfig);
				if ($data == false) {
					$data = parent::find($conditions, $fields,
						$order, $recursive);
					Cache::write($cacheName, $data, $cacheConfig);
				}
				$doQuery = false;
			}
			if ($doQuery) {
				$data = parent::find($conditions, $fields, $order,
					$recursive);
			}
			return $data;
		}
	}