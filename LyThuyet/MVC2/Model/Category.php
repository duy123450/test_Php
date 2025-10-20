<?php
class Category extends Db
{
	

	function get()
	{
		$stm = $this->conn->prepare("select * from category");
		$stm->execute();
		return $stm->fetchAll();
	}

	function detail($cat_id)
	{
		$sql="select * from category where cat_id=? ";
		$arr= array($cat_id);
		$data= parent::selectQuery($sql, $arr);
		if (Count($data)>0)
			return $data[0];
		return 0;
	}
}