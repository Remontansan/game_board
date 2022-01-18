<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // データのクリア
        DB::table('boards')->truncate();
        DB::table('users')->truncate();
        DB::table('profiles')->truncate();

        // データ挿入

        $gameboard1 = [
            'user_id' => '1',
            'game_name' => 'apex',
            'deadline' => '2021-1-11 15:57:00',
            'user_name' => '大寳　悠太',
            'content' => 'やりましょう',
        ];

        $gameboard2 = [
            'user_id' => '2',
            'game_name' => 'call of duty',
            'deadline' => '2021-1-13 15:57:00',
            'user_name' => '芝田　直樹',
            'content' => 'Codやろ〜🥺',

        ];

        $gameboard3 = [
            'user_id' => '3',
            'game_name' => 'マイクラ',
            'deadline' => '2021-1-12 15:57:00',
            'user_name' => '宮原　航平',
            'content' => 'マイクラ@3',

        ];

        // ユーザ情報

        $user1 = [
            'name' => '大寳　悠太',
            'email' => 'ootakarayuuta@gmail.com',
            'password' => '$2y$10$uCbs7VvY2TDLx95PkfaBce6uo9bvGb029yi/x6oTNI.vuWT3LqwEm',
        ];

        $user2 = [
            'name' => '芝田　直樹',
            'email' => 'sibatanaoki@gmail.com',
            'password' => '$2y$10$uCbs7VvY2TDLx95PkfaBce6uo9bvGb029yi/x6oTNI.vuWT3LqwEm',
        ];

        $user3 = [
            'name' => '宮原　航平',
            'email' => 'miyaharakouhei@gmail.com',
            'password' => '$2y$10$uCbs7VvY2TDLx95PkfaBce6uo9bvGb029yi/x6oTNI.vuWT3LqwEm',
        ];

        // プロフィール

        $profile1 = [
            'user_id' => '1',
            'user_name' => '大寳　悠太',
            'nickname' => 'yuuta',
            'gender' => '男',
            'age' => '22',
            'favorite_1' => 'apex',
            'favorite_2' => 'apex',
            'favorite_3' => 'ピクミン',
            'content' => 'やああああああああああああ',
        ];

        $profile2 = [
            'user_id' => '2',
            'user_name' => '芝田　直樹',
            'nickname' => 'けんちゃん',
            'gender' => '男',
            'age' => '22',
            'favorite_1' => 'cod',
            'favorite_2' => 'apex',
            'favorite_3' => 'apex',
            'content' => 'やああああああああああああ',
        ];

        $profile3 = [
            'user_id' => '3',
            'user_name' => '宮原　航平',
            'nickname' => 'miyatti',
            'gender' => '男',
            'age' => '22',
            'favorite_1' => 'lol',
            'favorite_2' => 'お絵かきの森',
            'favorite_3' => 'スマブラ',
            'content' => 'やああああああああああああ',
        ];


        

        DB::table('boards')->insert($gameboard1);
        DB::table('boards')->insert($gameboard2);
        DB::table('boards')->insert($gameboard3);
        DB::table('users')->insert($user1);
        DB::table('users')->insert($user2);
        DB::table('users')->insert($user3);
        DB::table('profiles')->insert($profile1);
        DB::table('profiles')->insert($profile2);
        DB::table('profiles')->insert($profile3);

        

    }
}
