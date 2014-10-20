<?php 

function theme($file){
	return '/catalog/view/theme/' . $file;
	global $tenant_id;
	return 'repository/tenant_' . $tenant_id . '/theme/' . $file;
}
function js($file){
	global $tenant_id;
	return 'repository/tenant_' . $tenant_id . '/theme/' . $file;
} 
