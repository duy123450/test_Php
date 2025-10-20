<?php
class Model_User extends Db
{
		
	function get()
	{
		return $this->getTable('book');
	}

	function getById($userName)
	{
		return $this->selectQuery('select email, name, address, phone from users where email=? ', array($userName));
	}

	function getByIdPass($userName, $pass)
	{
		$arr = array($userName, $pass);
		$data= $this->selectQuery('select email, name, address, phone from users where email=? and password=?', $arr);
		
		if (Count($data)==0) return array();
		return $data[0];
	}

	function getAdminByIdPass($userName, $pass)
	{
		$arr = array($userName, $pass);
		$data= $this->selectQuery('select * from admin where userName=? and password=?', $arr);
		
		if (Count($data)==0) return array();
		return $data[0];
	}

	function getCat()
	{
		return $this->getTable('category');
	}

	function getPub()
	{
		return $this->getTable('publisher');
	}


	function filter($name, $cat_id='all', $pub_id='all')
	{
		$sql="select * from book where 1 ";
		$arr= array();
		if ($name !='')
		{
			$sql .=" and book_name like ? ";
			$arr[]="%$name%";
		}
		if ($cat_id !='all')
		{
			$sql .=" and cat_id= ? ";
			$arr[]=$cat_id;
		}
		if ($pub_id !='all')
		{
			$sql .=" and pub_id= ? ";
			$arr[]=$pub_id;
		}
		return parent::selectQuery($sql, $arr);
	}
	function detail($book_id)
	{
		$sql="select * from book where book_id=? ";
		$arr= array($book_id);
		$data= parent::selectQuery($sql, $arr);
		if (Count($data)>0)
			return $data[0];
		return 0;
	}
	
}