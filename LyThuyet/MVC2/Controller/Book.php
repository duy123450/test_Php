<?php

class Book
{
	public  $model, $action;
	public $dataCat, $dataPub;
	function __construct()
	{
		$this->model = new Model_Book();
		$action = getIndex('action', 'index');
		$this->dataCat= $this->model->getCat();
		$this->dataPub = $this->model->getPub();
		//print_r($_GET);
		if (method_exists($this,$action))
			$this->$action();
		else {echo "Chua xd function {$this->action} "; exit;}
		
	}

/**
 * [index description]
 * @return [type] [description]
 */
function index()
	{
		$data = $this->model->getnBookRandom(4);
		$data_cat = $this->dataCat;// $this->model->getCat();
		$data_pub = $this->dataPub;//$this->model->getPub();
		$subview = 'book_index.php';
		include "View/layout1.php";
	}

function bookCat()
{
	$cat_id = getIndex('cat_id');
	$data = $this->model->selectQuery("select * from book where cat_id= ?", array($cat_id));
	$data_cat = $this->dataCat;
		$data_pub = $this->dataPub;
		$subview = 'book_cat.php';
		include "View/layout1.php";

}
function show()
	{
		$data = $this->model->getBook();
		$data_cat = $this->dataCat;// $this->model->getCat();
		$data_pub = $this->dataPub;//$this->model->getPub();
		$subview = 'book_index.php';
		include "View/layout1.php";
	}

	function filter()
	{
		$name= getIndex('book_name');
		$cat_id= getIndex('cat_id','all');
		$pub_id = getIndex('pub_id', 'all');
		$data =$this->model->filter($name, $cat_id='all', $pub_id='all');
		include "View/view.php";
	}

	function detail()
	{

		$book_id=getIndex('book_id');
		if ($book_id !='')
		{
			$data =$this->model->detail($book_id);
			
		}

		$data_cat = $this->dataCat;
		$data_pub = $this->dataPub;
		$subview = 'book_detail.php';
		include "View/layout1.php";
	}

	function update()
	{
		$arr= array();
		//$book_id = 
	}

	function insert()
	{
		$_SESSION['info']='';
		$arr = array();
		$arr[] = postIndex('book_id');
		/*if ($this->EXISTS_ID('book', 'book_id', $arr['book_id'] ))
		{
			return -1;//da co book_id trong table sach
		}*/

		$arr[] 		= postIndex('book_name');
		$arr[] 		= postIndex('description');
		$arr[] 		= postIndex('price', 0);
		$arr[] 		= postIndex('pub_id');
		$arr[] 		= postIndex('cat_id');
		$sql="insert into book(book_id, book_name, description, price, pub_id, cat_id ";
		if ($_FILES['img']['error'] ==0)
		{
			move_uploaded_file($_FILES['img']['tmp_name'], UPLOAD_IMG .$_FILES['img']['name']);
			$arr[] 		= $_FILES['img']['name'];
			$sql .=", img ";
		}

		$sql .=")";
		if (Count($arr)==6)
		$sql .=" values(?, ?, ?, ?, ?, ?)";
		else
		$sql .=" values(?, ?, ?, ?, ?, ?, ?)";
		$n= $this->model->updateQuery($sql, $arr);
		if ($n==1)
		{
			$_SESSION['info']="Đã thêm sách mã ". $arr[0];
			header('location:index.php?controller=CBook');
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
}