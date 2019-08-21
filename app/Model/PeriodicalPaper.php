<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Config;
use Laravel\Scout\Searchable;
use OSS\Core\OssException;
use OSS\OssClient;
class PeriodicalPaper extends Model {
	public $table = "periodical_paper";
	public $fillable = ['title', 'abstract', 'keywords', 'platename', 'authors', 'source', 'doi', 'content', 'name', 'year', 'phase', 'sortid', 'code', 'periodical_id', 'is_rm', 'status'];
    use Searchable;
    //定义索引里面的type
    public function searchableAs() {
        return 'periodical_paper';
    }

    //定义有哪些字段需要搜索
    public function toSearchableArray() {
        return [
            'title' => $this->title,
            'abstract'=>$this->abstract
        ];
    }
//导入数据 php artisan scout:import "\App\Model\PeriodicalPaper"
	public function getPrivateUrl(){
        $timeout = 3600;
        $ossClient = null;
        $server = Config::get('oss.useInternal') ? Config::get('oss.ossServerInternal') : Config::get('oss.ossServer');
        try {
            $ossClient = new OssClient(Config::get('oss.AccessKeyId'), Config::get('oss.AccessKeySecret'), $server);
        } catch (OssException $e) {
            print $e->getMessage();
        }
        $object = 'PaperDoc/' . $this->name;
        $signedUrl = $ossClient->signUrl(Config::get('oss.bucket'), $object, $timeout, "GET");
        return $signedUrl;
    }

    public function periodical(){
        return $this->belongsTo('App\Model\Periodical','periodical_id');
    }
}
