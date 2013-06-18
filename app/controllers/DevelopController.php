<?php

class DevelopController extends BaseController {


	public function getTest()
	{
		$a = Test::getMapper()->find()->get();
		var_dump($a);exit;
	}
	
	public function getUser()
	{
		$query = array( 'nickname' => 'user' );
		
		$mapper = new Mapper( 'User' );
		
		$u = $mapper->findOne( $query );
		
		var_dump( $u );exit;
	}
	
	public function getGetPass()
	{
		return Hash::make( 'test11' );
	}
	
	public function getContests()
	{
		$paginator = Contest::getMapper()
			->find( array( 'status' => 1) )
			->getPaginator(2);
		
		var_dump( $paginator );
	}

}