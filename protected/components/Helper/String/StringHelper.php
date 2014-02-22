<?php
class StringHelper{
	public static function spaceIfNullString($string){
		if($string){
			return $string;
		}

		return '&nbsp;';
	}
	
	public static function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}
	
	public static function replaceSeperatorWithOther($string, $oldSeperator, $newSeperator){
		if(!$string){
			return null;
		}
		return str_replace($oldSeperator, $newSeperator, $string);
	}
	
	public static function convertArrayToStringWithSeperator($array, $seperator){
		$string = '';
		$count = 0;
		foreach($array as $item){
			$string = $string.$item;
			if($count <= count($array) - 1){
				$string = $string.$seperator;
			}
			$count++;
		}
		return $string;
	}
}