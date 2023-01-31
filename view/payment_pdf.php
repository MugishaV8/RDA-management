<?php
session_start();
require "fpdf/fpdf4.php";
$db = new PDO('mysql:host=localhost; dbname=national_diabetic_db','root','');
class myPDF extends FPDF{
	function header(){
		if($this -> page ==   1){
		$this -> Image('images/log.png',100,1);
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
		$this -> cell(280,60,'PAYMENT LIST OF RWANDA DIABETIC ASSOCIATION',0,1,'C');
	}
	function headerTable(){
		$this -> SetFont('Times','B',12);
		$this -> Cell(50,15,'DATE',1,0,'C');
		$this -> Cell(60,15,'NAME',1,0,'C');
		$this -> Cell(35,15,'INSURANCE',1,0,'C');
		$this -> Cell(30,15,'TOTAL',1,0,'C');
		$this -> Cell(30,15,'COVER',1,0,'C');
		$this -> Cell(30,15,'CHARGES',1,0,'C');
		$this -> Cell(30,15,'STATUS',1,0,'C');
		$this -> Ln();
	}
	function viewTable($db){
		$i = 0;
		$this -> SetFont('Times','',12);
		if($_SESSION["category"] != "Patient"){
		$stmt = $db -> query('SELECT p.*, a.id AS app_id, a.updated_at, a.amount, a.application_code, dob, gender, u.names, a.address, zip_code, a.status AS statusAppl, a.discount, a.insurance AS assuranceco FROM patient p, users u, application a WHERE p.user_id = u.id AND  a.patient_id = p.user_id AND a.amount != "0"');
		} else {
		$stmt = $db -> query('SELECT p.*, a.id AS app_id, a.updated_at, a.amount, a.application_code, dob, gender, u.names, a.address, zip_code, a.status AS statusAppl, a.discount, a.insurance AS assuranceco FROM patient p, users u, application a WHERE p.user_id = u.id AND  a.patient_id = p.user_id AND a.amount != "0" AND a.patient_id ="'.$_SESSION['id'].'"');	
		}
		while ($data = $stmt -> fetch(PDO::FETCH_OBJ)) {
			$i++;
			$dateOfBirth = $data->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dateOfBirth), date_create($today));
			$charge = $diff->format('%y') < 25 ? 0 : 5000;
            $amountpay = $diff->format('%y') < 25 ? 0 : (($data->amount * $data->discount) / 100);
			$this -> SetFont('Times','',12);
			$this -> Cell(50,10,$data->updated_at,1,0,'C');
			$this -> Cell(60,10,$data->names,1,0,'L');
			$this -> Cell(35,10,$data->assuranceco,1,0,'L');
			$this -> Cell(30,10,$data->amount.' FRW',1,0,'R');
			$this -> Cell(30,10,($data->amount - ($data->amount * $data->discount) / 100).' FRW',1,0,'R');
			$this -> Cell(30,10,$amountpay.' FRW',1,0,'R');
			$this -> Cell(30,10,(($amountpay == 0) ? 'COVERED' : (($data->application_code == NULL) ? 'NOT PAID' : 'PAID')),1,0,'L');
			$this -> Ln();
		}
	}
}
$pdf = new myPDF();
$pdf -> AliasNbPages();
$pdf -> AddPage('P','A3',0);
$pdf -> title();
$pdf -> headerTable();
//$pdf -> myProfile($db);
$pdf -> viewTable($db);
$pdf -> Output();