<?php
$config = array(
	"GoogleMapsApiKeyPacher" => array(
		'keyName' => 'GoogleMapsApiKeyPacher.key'
	),
	'BcApp.adminNavi.GoogleMapsApiKeyPacher' => array(
		'name'		 => 'Google Maps API キー',
		'contents'	 => array(
			array('name'	 => '設定',
				'url'	 => array(
					'admin'		 => true,
					'plugin'	 => 'google_maps_api_key_pacher',
					'controller' => 'google_maps_api_key_pacher',
					'action'	 => 'index')
			)
		)
	)
);