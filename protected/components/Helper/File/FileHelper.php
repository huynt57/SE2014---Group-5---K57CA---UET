<?php
class FileHelper{
	public static function createFolder($name, $url){
		if (!is_dir($url.'/'.$name)) {
		    return mkdir($url.'/'.$name, 0777, true);
		}
		return false;
	}
	
	public static function createClientFileFolder($clientName){
		return FileHelper::createFolder($clientName, Yii::app()->getBasePath(true).'/../'.Yii::app()->params['CLIENT_FILES_PATH']);
	}
	
	public static function createFileFolderForProject($clientName, $projectName){
		return FileHelper::createFolder($projectName, Yii::app()->getBasePath(true).'/../'.Yii::app()->params['CLIENT_FILES_PATH'].'/'.$clientName);
	}
	
	public static function moveFileToProjectFolder($clientName, $projectName, $fileData, $isRename = false){
		FileHelper::createFileFolderForProject($clientName, $projectName);
		$fileName = $_FILES["file"]["name"];
		return move_uploaded_file($_FILES["file"]["tmp_name"], Yii::app()->getBasePath(true).'/../'.Yii::app()->params['CLIENT_FILES_PATH'].'/'.$clientName."/$projectName"."/$fileName");	
	}
	
	public static function getFileUrl($clientName, $projectName, $fileName){
		$url = Yii::app()->getBaseUrl(true).'/'.Yii::app()->params['CLIENT_FILES_PATH'].'/'.$clientName."/$projectName"."/$fileName";
		return $url;
	}
	
	public static function deleteFileFromProject($clientName, $projectName, $fileName){
		$url = Yii::app()->getBasePath(true).'/../'.Yii::app()->params['CLIENT_FILES_PATH'].'/'.$clientName."/$projectName"."/$fileName";
		if (file_exists($url)) {
			return unlink($url);
		}
		
		return false;
	}
	
	public static function getFileSizeText($size){
		if($size >= 1024 * 1024 * 1024){
			return number_format(($size/(1024 * 1024 * 1024)),0,'.','').' gb';
		}
		else if($size >= 1024 * 1024){
			return number_format(($size/(1024 * 1024)),0,'.','').' mb';
		}
		else if($size >= 1024){
			return number_format(($size/1024),0,'.','').' kb';
		}
		else{
			return ($size).' b';
		}
	}
	
	public static function getIconUrlForFileType($type){
		if(strcmp($type, 'image/png') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/png.png';
		}
		else if(strcmp($type, 'audio/x-aac') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/aac.png';
		}
		else if(strcmp($type, 'audio/aiff') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/aiff.png';
		}
		else if(strcmp($type, 'video/msvideo') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/avi.png';
		}
		else if(strcmp($type, 'application/msword') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/docx.png';
		}
		else if(strcmp($type, 'application/x-msdownload') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/exe.png';
		}
		else if(strcmp($type, 'video/x-flv') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/flv.png';
		}
		else if(strcmp($type, 'image/gif') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/gif.png';
		}
		else if(strcmp($type, 'image/jpeg') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/jpg.png';
		}
		else if(strcmp($type, 'video/quicktime') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/mov.png';
		}
		else if(strcmp($type, 'audio/mpeg') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/mp3.png';
		}
		else if(strcmp($type, 'video/mp4') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/mp4.png';
		}
		else if(strcmp($type, 'video/mpeg') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/mpg.png';
		}
		else if(strcmp($type, 'application/pdf') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/pdf.png';
		}
		else if(strcmp($type, 'application/vnd.ms-powerpoint') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/ppt.png';
		}
		else if(strcmp($type, 'application/vnd.ms-powerpoint') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/pps.png';
		}
		else if(strcmp($type, 'image/vnd.adobe.photoshop') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/psd.png';
		}
		else if(strcmp($type, 'application/x-rar-compressed') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/rar.png';
		}
		else if(strcmp($type, 'text/plain') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/txt.png';
		}
		else if(strcmp($type, 'audio/wav') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/wav.png';
		}
		else if(strcmp($type, 'application/zip') == 0){
			return Yii::app()->theme->baseUrl.'/assets/filetype/zip.png';
		}
		
		return Yii::app()->theme->baseUrl.'/assets/filetype/blank.png';
	}
}