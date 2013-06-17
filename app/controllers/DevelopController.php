<?php

class DevelopController extends BaseController {


	public function getTest()
	{
		$a = Test::getMapper()->find()->get();
		var_dump($a);exit;
	}

}