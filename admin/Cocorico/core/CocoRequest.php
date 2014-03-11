<?php
class CocoRequest{
	
	private static $requests = array();
	private static $restored = array();
	
	public static function request($name){
		if (isset(CocoRequest::$restored[$name])){
			return CocoRequest::$restored[$name];
		}
		else{
			array_push(CocoRequest::$requests, $name);
			return false;
		}
	}
	
	public function restore(){
		CocoRequest::$restored = array_merge(unserialize(get_option('cocostore_values')), $_POST);
		update_option('cocostore_values', serialize(array()));//clears the cache
	}
	
	public function backup(){
		$names = unserialize(get_option('cocostore_names'));
		$values = array();
		
		foreach ($names as $name){
			$values[$name] = $_POST[$name];
		}
		
		update_option('cocostore_values', serialize($values));
//		remove_action('shutdown', array('CocoStore', 'prepareBackup'));
	}
	
	public function prepareBackup(){
		if (count(CocoRequest::$requests) === 0) return;
		
		$ser = serialize(CocoRequest::$requests);
		update_option('cocostore_names', $ser);
	}
	
}
add_action('init', array('CocoRequest', 'restore'));
add_action('save_post', array('CocoRequest', 'backup'));
add_action('shutdown', array('CocoRequest', 'prepareBackup'));