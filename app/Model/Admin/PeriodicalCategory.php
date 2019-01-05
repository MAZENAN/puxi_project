<?php
namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PeriodicalCategory extends Model {
	public $table = 'periodical_category';
	public $timestamps = false;
	public $fillable = ['name', 'description', 'status', 'pid', 'is_nav', 'sortcode', 'typestr', 'level'];

	public static function hasPid($id) {
		return self::find($id) ? true : false;
	}
/**
 *生成['id'=>id,'name'=>name,'pid'=>pid,'level'=>level]数组
 * @param  array   &$arr  [description]
 * @param  integer $level [description]
 * @param  integer $pid   [description]
 * @return [type]         [description]
 */
	public static function getTree(&$arr = [], $level = 1, $pid = 0) {
		if ($pid == 0) {
			$objs = self::select('id', 'name', 'pid')->where('pid', '=', 0)->get();
			if ($objs) {
				foreach ($objs as $obj) {
					$arr[] = ['id' => $obj->id, 'name' => $obj->name, 'pid' => $obj->pid, 'level' => $level];
					self::getTree($arr, $level, $obj->id);
				}
			}

		} else {
			$level++;
			$objs = self::select('id', 'name', 'pid')->where('pid', '=', $pid)->get();
			if ($objs) {
				foreach ($objs as $obj) {
					$arr[] = ['id' => $obj->id, 'name' => $obj->name, 'pid' => $obj->pid, 'level' => $level];
					self::getTree($arr, $level, $obj->id);
				}
			}

		}
		$level--;
		return $arr;
	}

	public function getStatus() {
		switch ($this->status) {
		case 1:
			return '未启用';
			break;
		case 2:
			return '已启用';
			break;
		}
	}

	public static function addData($data) {
		$data['description'] ? '' : $data['description'] = '';
		$data['sortcode'] ? '' : $data['sortcode'] = 1;
		$category = self::create($data);
		$id = $category->id;
		$pid = $data['pid'];

		$newData = [];
		if ($pid == 0) {
			$newData['typestr'] = "<{$id}<";
			$newData['level'] = 1;
		} else {
			$parent = self::select('typestr', 'level')->where('id', '=', $pid)->first();
			$newData['typestr'] = $parent->typestr . "{$id}<";
			$newData['level'] = $parent->level + 1;
		}

		$res = self::where('id', '=', $id)->update($newData);
		return $res ? true : false;
	}
}