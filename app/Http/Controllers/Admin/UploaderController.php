<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use OSS\Core\OssException;
use OSS\OssClient;

class UploaderController extends Controller {
	private $ossClient;
	public function __construct() {
		$server = Config::get('oss.useInternal') ? Config::get('oss.ossServerInternal') : Config::get('oss.ossServer');
		try {
			$this->ossClient = new OssClient(Config::get('oss.AccessKeyId'), Config::get('oss.AccessKeySecret'), $server);
		} catch (OssException $e) {
			return $this->error();
		}
	}

	public function uploadImage(Request $request) {
		if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
			if ($request->has('chunk')) {
				return $this->chunkUpload($request);
			}
			try {
				$path = uniqid('cover', true) . '.' . $request->file('cover')->getClientOriginalExtension();
				$this->ossClient->putObject(Config::get('oss.bucket'), 'Periodicalcover/' . $path, file_get_contents($request->file('cover')->path()));
				return $this->success($path);
			} catch (OssException $e) {
				return $this->error();
			}
		} else {
			return $this->error();
		}
	}

	public function uploadFile(Request $request) {
		if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
			if ($request->has('chunk')) {
				return $this->chunkFileUpload($request);
			}
			try {
				$path = uniqid('doc', true) . '.' . $request->file('cover')->getClientOriginalExtension();
				$this->ossClient->putObject(Config::get('oss.bucket'), 'Docpdf/' . $path, file_get_contents($request->file('cover')->path()));
				return $this->success($path);
			} catch (OssException $e) {
				return $this->error();
			}
		} else {
			return $this->error();
		}
	}

	private function chunkUpload(Request $request) {
		$file = $request->file('cover');
		$chunk = $request->get('chunk', 0);
		$chunks = $request->get('chunks', 0);
		$time = $request->get('time');
		$fileName = $request->get('name');
		$tempName = $time . '/' . md5($fileName) . $chunk;
		//暂存分片
		Storage::disk('tmp')->put($tempName, file_get_contents($file->path()));
		//判断是否是最后一个分片

		if ($chunk == ($chunks - 1)) {
			//合并分片
			$realName = $time . '/' . uniqid('cover', true) . '.' . $file->getClientOriginalExtension();
			for ($i = 0; $i <= $chunk; $i++) {
				$temp = $time . '/' . md5($fileName) . $i;
				Storage::disk('upload')->append($realName, Storage::disk('tmp')->get($temp), false);
			}

			try {
				$path = uniqid('cover', true) . '.' . $file->getClientOriginalExtension();
				$this->ossClient->putObject(Config::get('oss.bucket'), 'Periodicalcover/' . $path, Storage::disk('upload')->get($realName));
				return $this->success($path);
			} catch (OssException $e) {
				return $this->error();
			}

		} else {
			return $this->uploading($chunk, $chunks);
		}

	}

	private function chunkFileUpload(Request $request) {
		$file = $request->file('cover');
		$chunk = $request->get('chunk', 0);
		$chunks = $request->get('chunks', 0);
		$time = $request->get('time');
		$fileName = $request->get('name');
		$tempName = $time . '/' . md5($fileName) . $chunk;
		//暂存分片
		Storage::disk('tmp')->put($tempName, file_get_contents($file->path()));
		//判断是否是最后一个分片

		if ($chunk == ($chunks - 1)) {
			//合并分片
			$realName = uniqid('cover', true) . '.' . $file->getClientOriginalExtension();
			$realPath = storage_path('app/uploader/uploader/' . $time);
			if (!file_exists($realPath)) {
				mkdir($realPath, 777);
			}
			$fp = fopen(storage_path("app/uploader/uploader/$time/" . $realName), 'a+');
			for ($i = 0; $i <= $chunk; $i++) {
				$temp = $time . '/' . md5($fileName) . $i;
				fwrite($fp, Storage::disk('tmp')->get($temp));
			}
			fclose($fp);

			try {
				$path = uniqid('doc', true) . '.' . $file->getClientOriginalExtension();
				//ini_set("max_execution_time", "0");
				$this->ossClient->uploadFile(Config::get('oss.bucket'), 'Docpdf/' . $path, $realPath . '/' . $realName);
				return $this->success($path);
			} catch (OssException $e) {
				return $this->error();
			}

		} else {
			return $this->uploading($chunk, $chunks);
		}

	}

	private function error($message = '上传失败', $code = '0') {
		return response()->json(['message' => $message, 'code' => $code]);
	}

	private function success($path, $message = 'upload success!', $code = '1') {
		return response()->json(['message' => $message, 'code' => $code, 'path' => $path]);
	}

	private function uploading($chunk, $chunks, $message = 'uploading', $code = '2') {
		return response()->json(['message' => $message, 'code' => $code, 'chunk' => $chunk, 'chunks' => $chunks]);
	}

}
