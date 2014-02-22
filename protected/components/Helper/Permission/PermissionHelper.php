<?php
class PermissionHelper{
	public static function checkPermission($userPermission, $taskPermission) {
		if($userPermission){
			//admin can doo anything
			if(PermissionHelper::containPermission($userPermission,  Yii::app()->params['PERMISSION_ADMINISTRATOR_MASTER'])){
				return true;
			}
			else{
				return PermissionHelper::containPermission($userPermission,  $taskPermission);
			}
		}
		else{
			return false;
		}
	}
	
	public static function containPermission($userPermission, $taskPermission){
		if($userPermission){
			$permissions = explode('|', $userPermission);
			if(count($permissions) > 0){
				foreach($permissions as $permission){
					if(strcmp($permission, $taskPermission) == 0){
						
						return true;
					}
				}
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
		
		return false;
	}
	
	public static function isAdministrator($userPermission){
		if(!$userPermission || strcmp($userPermission, '')==0){
			return false;
		}
		
		if(PermissionHelper::containPermission($userPermission,  Yii::app()->params['PERMISSION_ADMINISTRATOR_MASTER'])){
			return true;
		}
		
		if(PermissionHelper::containPermission($userPermission,  Yii::app()->params['PERMISSION_ADMINISTRATOR_MANAGER_USER_HIGH'])){
			return true;
		}
		
		return false;
	}
	
	public static function getRoleText($userPermission){
		if(PermissionHelper::isAdministrator($userPermission)){
			return "Administrator";
		}
		return 'Normal User';
	}
}