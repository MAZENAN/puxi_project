<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //产生faker实例
        $faker = \Faker\Factory::create('zh_CN');
        //循环生成数据
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            //访问具体的属性来获取数据
            $data[] = [
                'username' => $faker->userName, //生成用户名
                'password' => bcrypt('123456'), //使用框架内置bcrypt方法加密密码
                'gender' => rand(1, 3), //性别随机
                'phone' => $faker->phoneNumber, //生成手机号
                'created_at' => date('Y-m-d H:i:s', time()), //创建时间
                'updated_at' => date('Y-m-d H:i:s', time()), //更新时间
                'status' => rand(1, 2), //帐号状态
            ];
        }
        //写入到数据表
        DB::table('member')->insert($data);
    }
}
