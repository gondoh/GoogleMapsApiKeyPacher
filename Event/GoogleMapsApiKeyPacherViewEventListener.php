<?php
class GoogleMapsApiKeyPacherViewEventListener extends BcViewEventListener {
/**
 * 登録イベント
 *
 * @var array
 */
	public $events = array(
		'afterLayout'
	);

	public function afterLayout(CakeEvent $event) {
		$View = $event->subject;
		$key = $View->BcBaser->siteConfig[Configure::read('GoogleMapsApiKeyPacher.keyName')];
		
		if (empty($key)) return true;

		// google maps apiに 登録キーを追加
		$output = $View->output;
		if (preg_match_all('/<script.*?src=("|\')(.*?\/\/maps\.google\.com\/maps\/api\/[^"\']+).*?<\/script>/i', $output, $matches)) {
			if (!empty($matches[2])) {
				foreach($matches[2] as $gmApiUrl) {
					/**
					 * キー情報が取り込まれていないことを確認
					 * 今後コア改修が入った場合、このプラグインが有効担っていた場合
					 * ２重にAPIキーが登録されてしまう問題を事前に解消
					 */
					if (strpos($gmApiUrl, "key=") === false) {
						if (strpos($gmApiUrl, "?") !== false) {
							$View->output = str_replace($gmApiUrl, $gmApiUrl . "&key=" . h($key), $output);
						} else {
							$View->output = str_replace($gmApiUrl, $gmApiUrl . "?key=" . h($key), $output);
						}
					}
				}
			}
		}
		return true;
	}

}
