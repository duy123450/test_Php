<?php

class Category
{
	public  $model, $action;
	function __construct()
	{
		$this->model = new MCategory();
		$action = getIndex('action', 'index');
		if (method_exists($this,$action))
			$this->$action();
		else {echo "Chua xd function {$this->action} "; exit;}
		
	}

	function index()
	{
		$data = $this->model->get();
		include "View/view_cat.php";
	}

	function show()
	{
		$data = $this->model->getBook();
		include "View/view.php";
	}

	function filter()
	{
		$name= getIndex('book_name');
		$cat_id= getIndex('cat_id','all');
		$pub_id = getIndex('pub_id', 'all');
		$data =$this->model->filter($name, $cat_id='all', $pub_id='all');
		include "View/view.php";
	}

	function edit()
	{
		$cat_id=getIndex('cat_id');
		if ($cat_id !='')
		{
			$data =$this->model->detail($cat_id);
			if (!empty($data))
				include "View/view_edit_cat.php";
			else {
				echo "Err.";
				exit;
			}

		}
	}

	function update()
	{
		$arr= array();
		
		$arr[] 	= postIndex('cat_name');
		$arr[] = postIndex('cat_id');
		$sql="update category set cat_name=? where cat_id=?";
		$n= $this->model->updateQuery($sql, $arr);
		if ($n==1)
		{
			$_SESSION['info']="Đã sửa category  ". $arr[0];
			header('location:index.php?controller=CCategory');
		}
		else
			{
			$_SESSION['info']="Lỗi sửa: ". $arr[0];

			?>
			<script type="text/javascript">
				window.history.go(-1);
			</script>
			<?php
		}

	}

	function insert()
	{
		$arr = array();
		$arr[] = postIndex('cat_id');
		/*if ($this->EXISTS_ID('book', 'book_id', $arr['book_id'] ))
		{
			return -1;//da co book_id trong table sach
		}*/

		$arr[] 	= postIndex('cat_name');
		$sql="insert into category(cat_id, cat_name) values(?, ?)";
		$n= $this->model->updateQuery($sql, $arr);
		if ($n==1)
		{
			$_SESSION['info']="Đã thêm category mã ". $arr[0];
			header('location:index.php?controller=CCategory');
		}
		else
			{
			$_SESSION['info']="Lỗi thêm... ". $arr[0];

			?>
			<script type="text/javascript">
				window.history.go(-1);
			</script>
			<?php
		}
	}

	function delete()
	{
		$arr = array();
		$arr[] = getIndex('cat_id');
		$sql="delete from category  where cat_id =? ";
		$n= $this->model->updateQuery($sql, $arr);
		if ($n==1)
		{
			$_SESSION['info']="Đã xóa category mã ". $arr[0];
			header('location:index.php?controller=CCategory');
		}
		else
			{
			$_SESSION['info']="Lỗi xóa: ". $arr[0];

			?>
			<script type="text/javascript">
				window.history.go(-1);
			</script>
			<?php
		}
	}
}