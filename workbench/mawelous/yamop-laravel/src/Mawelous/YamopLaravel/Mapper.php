<?php

namespace Mawelous\YamopLaravel;

class Mapper extends \Mawelous\Yamop\Mapper
{
	
	public function __construct( $modelClass = null, $fetchType = self::FETCH_OBJECT )
	{
		if( static::$_database == null ){
			static::$_database = $this->_getDatabase();
		}
	
		parent::__construct( $modelClass, $fetchType );
	}	
	
	protected function _createPaginator($results, $totalCount, $perPage)
	{
		return \Paginator::make( $results, $totalCount, $perPage );
	}
	
	public function getPaginator( $perPage = 10, $page = null )
	{
		if( $page == null ){
			$page = \Finput::get( 'page', 1 );
		}
	
		return parent::getPaginator( $page, $perPage );
	}
	
	protected function _getDatabase()
	{
		$config = \Config::get( 'database.mongo' );
		$connection = new \MongoClient( $this->_getServer() );
		return $connection->{$config[ 'database' ]};
	}
	
	protected function _getServer()
	{
		$config = \Config::get( 'database.mongo' );
		
		$server = 'mongodb://';
		if ( isset( $config[ 'user' ] ) && !empty( $config[ 'user' ] ) ){
			$server .= $config[ 'user' ] . ':' . $config[ 'password' ] .'@';
		}
		$server .= $config[ 'host'] . ':' .$config[ 'port' ] . '/' . $config[ 'database' ];
	
		return $server;
	}	
}