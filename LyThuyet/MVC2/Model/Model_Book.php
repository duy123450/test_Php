<?php
class Model_Book extends Db
{
		
	function getBook()
	{
		return $this->getTable('book');
	}

	function getnBookRandom($n)
	{
		return $this->selectQuery('select * from book order by rand() limit 0, 4');
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
	
	function delete($book_id)
	{
		$row = $this->detail($book_id);
		$img = ROOT.'/images/book/' .$row['img'];
		unlink($img);
		$sql="delete from book where book_id= ?";
		$this->updateQuery($sql, array($book_id));
		header('location:admin.php');

	}

	function update()
	{
		$arr = array();
		$book_id =postIndex('book_id');
		$arr[]= postIndex('book_name');
		$arr[]= postIndex('description');
		$arr[]= postIndex('price');
		$arr[]= postIndex('cat_id');
		$arr[]= postIndex('pub_id');
		$sql="update book set book_name=?, description=?, price=?, cat_id=?, pub_id=?  ";
		if ($_FILES['img']['error']==0)
		{
			$row = $this->detail($book_id);
			$img = ROOT.'/images/book/' .$row['img'];
			unlink($img);
			$img0 = ROOT.'/images/book/' .$_FILES['img']['name'];
			$img = $_FILES['img']['name'];
			move_uploaded_file($_FILES['img']['tmp_name'], $img0);
			$arr[] = $img;
			$sql.= " , img= ? ";
		}
		
		$sql .=" where book_id = ?";
		$arr[]= postIndex('book_id');

		$this->updateQuery($sql, $arr);
		header('location:admin.php');

	}

}