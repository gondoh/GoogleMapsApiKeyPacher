<?php
class GoogleMapsApiKeyPacherController extends BcPluginAppController {
	public $components = array('Cookie', 'BcAuth', 'BcAuthConfigure');
	public $uses = array("SiteConfig");
	private $configName = null;
	
	public function __construct($request = null, $response = null) {
		parent::__construct($request, $response);
		$this->configName = Configure::read('GoogleMapsApiKeyPacher.keyName');
	}
	
	public function admin_index(){
		$this->pageTitle = "Google Maps APIキー設定";
		
		if (empty($this->request->data)) {
			$data = $this->SiteConfig->findByName($this->configName);
			$data = array(
				'GoogleMapsApiKeyPacher' => array(
					'key' => (empty($data['SiteConfig']['value'])) ? "" : $data['SiteConfig']['value']
				)
			);
		} else {
			// 更新
			if ($this->SiteConfig->findByName($this->configName)) {
				// サニタイズ
				$db = $this->SiteConfig->getDataSource();
				$value = $db->value($this->request->data['GoogleMapsApiKeyPacher']['key'], 'string');
				// 更新実行
				$this->SiteConfig->updateAll(
					array('value' => $value),
					array('SiteConfig.name' => $this->configName)
				);
			// 追加
			} else {
				$data = array(
					'name' => $this->configName,
					'value' => $this->request->data['GoogleMapsApiKeyPacher']['key']
				);
				$this->SiteConfig->save($data, false);
			}
			$data = array(
				'GoogleMapsApiKeyPacher' => array(
					'key' => $this->request->data['GoogleMapsApiKeyPacher']['key']
				)
			);
		}
		$this->request->data = $data;
	}
}