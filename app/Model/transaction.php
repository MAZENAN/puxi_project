<?php
DB::beginTransaction();
try {
	$name = 'abc';
	$result1 = Test::create(['name' => $name]);
	if (!$result1) {
		/**
		 * Exception类接收的参数
		 * $message = "", $code = 0, Exception $previous = null
		 */
		throw new \Exception("1");
	}
	$result2 = Test::create(['name' => $name]);
	if (!$result2) {
		throw new \Exception("2");
	}
	DB::commit();
} catch (\Exception $e) {
	DB::rollback(); //事务回滚
	echo $e->getMessage();
	echo $e->getCode();
}