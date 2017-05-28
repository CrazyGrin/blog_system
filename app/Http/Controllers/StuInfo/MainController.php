<?php

namespace App\Http\Controllers\StuInfo;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\StuInfo\StuModel;

class MainController extends Controller
{
	public function getInfo(){
		$StuModel = new StuModel();
		$StuModel->getInfo();
	}

	public function showAllStu($classNum){
		$StuModel = new StuModel();
		$StuModel->showAllStu($classNum);
	}

	public function showStuInfo($stuNum){
		return view('StuInfo')->with('stuNum', $stuNum);
	}

	public function search($key){
		$StuModel = new StuModel();
		$StuModel->search($key);
	}
}
