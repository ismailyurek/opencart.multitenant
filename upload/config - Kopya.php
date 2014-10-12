<?php

// HTTP
define('COMMON_HTTP_SERVER', 'http://sandbox.opencart.tst/'); 

// HTTPS
define('COMMON_HTTPS_SERVER', 'http://sandbox.opencart.tst/'); 

// DIR
define('COMMON_DIR_APPLICATION', 'C:\Documents\SourceCode\Eclipse\php\php\opencart.multitenant\upload/catalog/');
define('COMMON_DIR_SYSTEM', 'C:\Documents\SourceCode\Eclipse\php\php\opencart.multitenant\upload/system/');
define('COMMON_DIR_LANGUAGE', 'C:\Documents\SourceCode\Eclipse\php\php\opencart.multitenant\upload/catalog/language/');
define('COMMON_DIR_TEMPLATE', 'C:\Documents\SourceCode\Eclipse\php\php\opencart.multitenant\upload/catalog/view/theme/');
define('COMMON_DIR_CONFIG', 'C:\Documents\SourceCode\Eclipse\php\php\opencart.multitenant\upload/system/config/');
define('COMMON_DIR_IMAGE', 'C:\Documents\SourceCode\Eclipse\php\php\opencart.multitenant\upload/image/');
define('COMMON_DIR_CACHE', 'C:\Documents\SourceCode\Eclipse\php\php\opencart.multitenant\upload/system/cache/');
define('COMMON_DIR_DOWNLOAD', 'C:\Documents\SourceCode\Eclipse\php\php\opencart.multitenant\upload/system/download/');
define('COMMON_DIR_MODIFICATION', 'C:\Documents\SourceCode\Eclipse\php\php\opencart.multitenant\upload/system/modification/');
define('COMMON_DIR_LOGS', 'C:\Documents\SourceCode\Eclipse\php\php\opencart.multitenant\upload/system/logs/');

// DB
define('COMMON_DB_DRIVER', 'mysqli');
define('COMMON_DB_HOSTNAME', 'localhost');
define('COMMON_DB_USERNAME', 'root');
define('COMMON_DB_PASSWORD', '');
define('COMMON_DB_DATABASE', 'opencart01');
define('COMMON_DB_PREFIX', '');

// Tenant Repository
define('DIR_REPOSITORY', 'repository/');

global $tenant_id;
$tenant_id = 10;

class environment {
	private $db;

	public function __construct() {

	}


	public static function getAppDirectory(){
		return COMMON_DIR_APPLICATION;
	}
	public static function getSystemDirectory(){
		return COMMON_DIR_SYSTEM;
	}
	public static function getLangDirectory(){
		return COMMON_DIR_LANGUAGE;
	}
	public static function getTemplateDirectory(){
		return COMMON_DIR_TEMPLATE;
	}
	public static function getConfigDirectory(){
		return COMMON_DIR_CONFIG;
	}
	public static function getModificationDirectory(){
		return COMMON_DIR_MODIFICATION;
	}
	
	public static function getHttpServer(){
		/* override http server
		 * tenant-based http server
		* */
		return COMMON_HTTP_SERVER;
	}
	
	public static function getHttpsServer(){
		/* override https server
		 * tenant-based https server
		* */
		return COMMON_HTTPS_SERVER;
	}
	
	
	
	public static function getCacheDirectory(){
		/* override cach directory
		 * tenant-based cache directory or repository
		* */
		return DIR_REPOSITORY . environment::getTenantDirectory() . 'cache/';	//return DIR_CACHE . '';
	}

	public static function getImageDirectory(){
		/* override image directory
		 * tenant-based image directory or repository
		* */
		return DIR_REPOSITORY . environment::getTenantDirectory() . 'image/';
	}

	public static function getLogsDirectory(){
		/* override logs directory
		 * tenant-based logs directory or repository
		* */

		return DIR_REPOSITORY . environment::getTenantDirectory() . 'logs/';	//return DIR_LOGS . '';
	}

	public static function getDownloadDirectory(){
		/* override download directory
		 * tenant-based download directory or repository
		* */

		return DIR_REPOSITORY . environment::getTenantDirectory() . 'download/';	//return DIR_DOWNLOAD . '';
	}
	
	static function getTenantDirectory(){
		global $tenant_id;
	
		return 'trepo' . $tenant_id . '/';
	}
	

	public static function getHttpCatalogServer(){
		/* override http server
		 * tenant-based http server
		* */
		return HTTP_CATALOG;
	}

	public static function getHttpsCatalogServer(){
		/* override https server
		 * tenant-based https server
		* */
		return HTTPS_CATALOG;
	}

	public static function getRepositoryHttp() {
		global $tenant_id;
		return environment::getHttpServer() . 'repository/tenant_' . $tenant_id . '/';
	}

	public static function getRepositoryHttps() {
		global $tenant_id;
		return environment::getHttpsServer() . 'repository/tenant_' . $tenant_id . '/';
	}

	public static function getCatalogRepositoryHttp() {
		global $tenant_id;
		return environment::getHttpsCatalogServer() . 'repository/tenant_' . $tenant_id . '/';
	}

	public static function getCatalogRepositoryHttps() {
		global $tenant_id;
		return environment::getHttpsCatalogServer() . 'repository/tenant_' . $tenant_id . '/';
	}

	public static function getConfigHttp() {
		return environment::getHttpServer();	//$this->config->get('config_url')
	}

	public static function getConfigHttps() {
		return environment::getHttpServer();	//$this->config->get('config_ssl')
	}

}

// HTTP
define('HTTP_SERVER', environment::getHttpServer());

// HTTPS
define('HTTPS_SERVER', environment::getHttpsServer());

// DIR
define('DIR_APPLICATION', environment::getAppDirectory());
define('DIR_SYSTEM', environment::getSystemDirectory());
define('DIR_LANGUAGE', environment::getLangDirectory());
define('DIR_TEMPLATE', environment::getTemplateDirectory());
define('DIR_CONFIG', environment::getConfigDirectory());
define('DIR_IMAGE', environment::getImageDirectory());
define('DIR_CACHE', environment::getCacheDirectory());
define('DIR_DOWNLOAD', environment::getDownloadDirectory());
define('DIR_MODIFICATION', environment::getModificationDirectory());
define('DIR_LOGS', environment::getLogsDirectory());

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'opencart_db');
define('DB_PREFIX', '');
