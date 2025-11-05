<?php
class Student{
    public $id;
    public $name;
    public $phone;
    function setInfo($id, $name, $phone){
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
    }
    public function getInfo(){
        echo "<hr>";
        echo "ID: {$this->id} <br>";
        echo "Name: {$this->name} <br>";
        echo "Phone: {$this->phone} <br>";
    }
}

$o1 = new Student();
$o1->setInfo(1, "Nguyen Van A", "0123456789");
print_r($o1);
$o1->getInfo();