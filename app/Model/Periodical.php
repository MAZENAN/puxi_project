<?php

namespace App\Model;

use Config;
use DB;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use OSS\Core\OssException;
use OSS\OssClient;

class Periodical extends Model {
	use Searchable;

	//定义索引里面的type
	public function searchableAs() {
		return 'periodical';
	}

	//定义有哪些字段需要搜索
	public function toSearchableArray() {
		return [
			'title' => $this->title,
		];
	}

	public $table = 'periodical';

	public $fillable = [
		'title',
		'first_letter',
		'description',
		'image',
		'foreign_title',
		'issn',
		'cn',
		'viewed',
		'download',
		'lang',
		'created_at',
		'updated_at',
		'establish_at',
		'cycle',
		'status',
		'is_rm',
		'mobile',
		'email',
		'address',
		'postal_code',
		'price_info',
		'typestr',
		'competent_unit',
		'sponsor_unit',
		'editorial_unit',
	];

	public static function addData($data) {
		$data['first_letter'] = substr(app('pinyin')->abbr($data['title']), 0, 1);

		if (!$data['issn']) {
			unset($data['issn']);
		}
		if (!$data['cn']) {
			unset($data['cn']);
		}

		DB::beginTransaction();
		try {
			$res1 = self::create($data);

			if (!$res1) {
				throw new \Exception("1");
			}
			if (isset($data['level_ids'])) {
				foreach ($data['level_ids'] as $id) {
					$res = PeriodicalDb::create(['periodical_id' => $res1->id, 'db_id' => $id]);
					if (!$res) {
						throw new \Exception("2");
					}
				}
			}
			DB::commit();
			return true;
		} catch (\Exception $e) {
			DB::rollback();
			return false;
		}
	}

	public static function updateData($data) {
	    if (empty($data)){
	        return;
        }
        $data['first_letter'] = substr(app('pinyin')->abbr($data['title']), 0, 1);

        if (!$data['issn']) {
            unset($data['issn']);
        }
        if (!$data['cn']) {
            unset($data['cn']);
        }

        DB::beginTransaction();
        try {
            $res1 = self::find($data['id'])->update($data);

            if (!$res1) {
                throw new \Exception("1");
            }
            if (isset($data['level_ids'])) {
                PeriodicalDb::where('periodical_id',$data['id'])->delete();
                foreach ($data['level_ids'] as $id) {
                    $res = PeriodicalDb::create(['periodical_id' => $data['id'], 'db_id' => $id]);
                    if (!$res) {
                        throw new \Exception("2");
                    }
                }
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            echo $e->getMessage();
            DB::rollback();
            return false;
        }
    }

	public function tystrToName() {
		if ($this->typestr === '0') {
			return '无分类';
		}
		$typeArr = explode('<', trim($this->typestr, '<'));
		$newStr = '';
		foreach ($typeArr as $id) {
			$newStr .= PeriodicalCategory::where('id', '=', $id)->value('name') . '>';
		}
		return $newStr;
	}

	public function imageUrl() {
		$timeout = 3600;
		$options = array(
			OssClient::OSS_PROCESS => "image/resize,m_lfit,h_100,w_100",
		);
		$server = Config::get('oss.useInternal') ? Config::get('oss.ossServerInternal') : Config::get('oss.ossServer');
		try {
			$ossClient = new OssClient(Config::get('oss.AccessKeyId'), Config::get('oss.AccessKeySecret'), $server);
		} catch (OssException $e) {
			print $e->getMessage();
		}
		$object = 'Periodicalcover/' . $this->image;
		$signedUrl = $ossClient->signUrl(Config::get('oss.bucket'), $object, $timeout, "GET", $options);
		return $signedUrl;
	}

	public function getStatus() {
		switch ($this->status) {
		case 1:
			return '已下架';

		case 2:
			return '已发布';
		}
	}

	public function getCycle() {
		//1代表旬刊,2半月刊,3月刊,4双月刊,5季刊,6半年刊,7年刊
		$arr = [
			1 => '旬刊',
			2 => '半月刊',
			3 => '月刊',
			4 => '双月刊',
			5 => '季刊',
			6 => '半年刊',
			7 => '年刊',
		];
		return $arr[$this->cycle];
	}

	public function dbs() {
		return $this->belongsToMany('App\Model\DatabaseLevel', 'periodical_db', 'periodical_id', 'db_id');
	}

}
