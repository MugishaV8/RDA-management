<?php
session_start();
require "fpdf/fpdf4.php";
$db = new PDO('mysql:host=localhost; dbname=national_diabetic_db','root','');
class myPDF extends FPDF{
	function header(){
		if($this -> page ==   1){
		$this -> Image('images/log.png',160,1);
		$this -> SetFont('Arial','B',14);
		 $this -> cell(380,60,'',0,1,'C');
	 }
	}

	function  footer(){
		$this -> SetY(-15);
		$this -> SetFont('Arial','',8);
		$this ->Cell(0,10,'Printed By: '.$_SESSION["category"],0,0,'L');
		$this -> SetX($this->lMargin);
		$this ->Cell(0,10,'Page '.$this ->  PageNo().'/{nb}',0,0,'C');
		$this -> SetX($this->lMargin);
		$this ->Cell(0,10,'Printed on: '.date("j/n/Y"),0,0,'R');
	}

	function title(){
		$this -> cell(400,60,'LIST OF RWANDA DIABETIC ASSOCIATION PATIENTS',0,1,'C');
	}
	function headerTable(){
		$this -> SetFont('Times','B',12);
		$this -> Cell(100,15,'NAME',1,0,'C');
		$this -> Cell(80,15,'NATIONAL ID',1,0,'C');
		$this -> Cell(35,15,'GENDER',1,0,'C');
		$this -> Cell(50,15,'DATE OF BIRTH',1,0,'C');
		$this -> Cell(40,15,'CATEGORY',1,0,'C');
		$this -> Cell(50,15,'INSURANCE',1,0,'C');
		$this -> Cell(40,15,'DIABETIC TYPE',1,0,'C');
		$this -> Ln();
	}
	function viewTable($db){
		$i = 0;
		$this -> SetFont('Times','',12);
		$stmt = $db -> query('SELECT p.*, u.names, i.insurance AS insuranceco, u.telephone, u.email FROM patient p, users u, insurance i WHERE p.user_id = u.id AND i.id = p.insurance');
		while ($data = $stmt -> fetch(PDO::FETCH_OBJ)) {
			$i++;
			$this -> SetFont('Times','',12);
			$this -> Cell(100,10,$data->names,1,0,'L');
			$this -> Cell(80,10,$data->national_id,1,0,'L');
			$this -> Cell(35,10,$data->gender,1,0,'L');
			$this -> Cell(50,10,$data->dob,1,0,'C');
			$this -> Cell(40,10,$data->category,1,0,'C');
			$this -> Cell(50,10,$data->insuranceco,1,0,'L');
			$this -> Cell(40,10,$data->diabetic_type,1,0,'C');
			$this -> Ln();
		}
	}
}
$pdf = new myPDF();
$pdf -> AliasNbPages();
$pdf -> AddPage('L','A3',0);
$pdf -> title();
$pdf -> headerTable();
//$pdf -> myProfile($db);
$pdf -> viewTable($db);
$pdf -> Output();