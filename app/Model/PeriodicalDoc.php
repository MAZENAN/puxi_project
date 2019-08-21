<?php

namespace App\Model;

use Config;
use Illuminate\Database\Eloquent\Model;
use OSS\Core\OssException;
use OSS\OssClient;

class PeriodicalDoc extends Model {
	public $table = 'document';
	public $fillable = ['year', 'phase', 'code', 'name', 'original', 'note', 'status', 'periodical_id'];
	public $timestamps = false;

	public function getPrivateUrl() {
		$timeout = 3600;
		$ossClient = null;
		$server = Config::get('oss.useInternal') ? Config::get('oss.ossServerInternal') : Config::get('oss.ossServer');
		try {
			$ossClient = new OssClient(Config::get('oss.AccessKeyId'), Config::get('oss.AccessKeySecret'), $server);
		} catch (OssException $e) {
			print $e->getMessage();
		}
		$object = 'Docpdf/' . $this->name;
		$signedUrl = $ossClient->signUrl(Config::get('oss.bucket'), $object, $timeout, "GET");
		return $signedUrl;
	}
}
