<?php

namespace App\StuInfo;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class StuModel extends Model
{
	protected $table = "stuinfo";

	public function getInfo(){
		echo "string";
		DB::insert('insert into stuinfo (name, sex, age, create_at, upadte_at) values (?, ?, ?, ?, ?)', [1, 1, 1, 1, 1]);
	}

	public function showAllStu($classNum){

		$curl = curl_init();
		$header = array("content-type: application/x-www-form-urlencoded; charset=UTF-8");
		curl_setopt($curl, CURLOPT_URL, "http://jwzx.cqupt.edu.cn/jwzxtmp/showBjStu.php?bj={$classNum}");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER,$header);
		$content = curl_exec($curl);
		curl_close($curl);

		$reSet = "/(?<=<td>).*?(?=<\/td>)/";
		$reSet_content = [];

		preg_match_all($reSet, $content, $reSet_content);

		$finalData = array_chunk($reSet_content[0], 10);

		for ($i=1; $i < count($reSet_content[0])/10; $i++) {
			DB::insert('insert into stuinfo (stu_id, stu_num, stu_name, stu_sex, stu_classnum, stu_majornum, stu_majorname, stu_academy, stu_grade, stu_status) values (?,?,?,?,?,?,?,?,?,?)', $finalData[$i]);
			var_dump($finalData[$i]);
			echo "Insert Success";
		}

	}
	public function showPic($stuNum){

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "http://jwzx.cqupt.edu.cn/showstuPic.php?xh={$stuNum}");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		$content = curl_exec($curl);
		curl_close($curl);

	}

	public function search($key){

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "http://jwzx.cqupt.edu.cn/jwzxtmp/data/json_StudentSearch.php?searchKey=%E6%81%BD%E6%B6%B5");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		$content = curl_exec($curl);
		curl_close($curl);

		$content = json_decode($content);

		var_dump($content);
	}
}
