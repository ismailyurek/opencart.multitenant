<?php 
global $tenant_id;
$tenant_id = 10;

class environment {

	public static function getAppDirectory(){
		return DIR_APPLICATION;
	}

	public static function getSystemDirectory(){
		return DIR_SYSTEM;
	}

	public static function getLangDirectory(){
		return DIR_LANGUAGE;
	}

	public static function getTemplateDirectory(){
		return DIR_TEMPLATE;
	}

	public static function getConfigDirectory(){
		return DIR_CONFIG;
	}

	public static function getModificationDirectory(){
		return DIR_MODIFICATION;
	}

	public static function getHttpServer(){
		return HTTP_SERVER;
	}

	public static function getHttpsServer(){
		return HTTPS_SERVER;
	}

	public static function getCacheDirectory(){
		return DIR_REPOSITORY . environment::getTenantDirectory() . 'cache/';
	}

	public static function getImageDirectory(){
		return DIR_REPOSITORY . environment::getTenantDirectory() . 'image/';
	}

	public static function getImgRelDirectory(){
		return 'repository/' . environment::getTenantDirectory() . 'image/';
	}

	public static function getLogsDirectory(){
		return DIR_REPOSITORY . environment::getTenantDirectory() . 'logs/';
	}

	public static function getDownloadDirectory(){
		return DIR_REPOSITORY . environment::getTenantDirectory() . 'download/';
	}
	
	public static function getUploadDirectory(){
		return DIR_REPOSITORY . environment::getTenantDirectory() . 'upload/';
	}

	static function getTenantDirectory(){
		global $tenant_id;
		return 'trepo' . $tenant_id . '/';
	}
}