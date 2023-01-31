<?php
require_once '../web-config/config.php';
require_once '../web-config/database.php';


//create a new user
 if (isset($_POST['add-user'])) {

    $database->create("users", $fields = ["names"=>$_POST['names'], "email"=>$_POST['email'], "telephone"=>$_POST['telephone'], "category"=>$_POST['category'], "status"=>"Active", "location"=>$_POST['address']]);

    echo '<script type="text/javascript">alert("new user created"); window.location="users";</script>';
  }

  //edit user
 if (isset($_POST['edit-user'])){

    $database->update("users", "id = '".$_POST['id']."'", $fields = ["category"=>"Patient", "names"=>$_POST['names'], "telephone"=>$_POST['telephone'], "email"=>$_POST['email'], "location"=>$_POST['address']]);

      echo '<script type="text/javascript">alert("User modified"); window.location="users";</script>'; 
  }

//delete users
 if (isset($_POST['delete-user'])) {
    
    $database->deleteById("users", "id", $_POST['id']);
    
    echo '<script type="text/javascript">alert("user deleted"); window.location="users";</script>';
  }

  //create account 
 if (isset($_POST['create-account'])) {
    if($_POST["confirmpassword"] != $_POST["passwordsignin"])  
      {  
        echo '<script>alert("password not matched please try again!")</script>';  
      } else {
    $encryptedUserPassword = password_hash($_POST["confirmpassword"], PASSWORD_DEFAULT);
    $database->update("users", "email = '".$_POST['email']."'", $fields = ["username"=>$_POST['username'], "password"=>$encryptedUserPassword]);
      if($database->affected_rows() == 1) {
        echo '<script type="text/javascript">alert("account created"); window.location="../index";</script>';
      } else {
        echo '<script type="text/javascript">alert("account not created try again"); window.location="../index";</script>';
      }
    }
    
  }

  //add new drug
 if (isset($_POST['add-drug'])){
    $database->create("drugs", $fields = ["name"=>$_POST['name'], "description"=>$_POST['description'], "terms_condition"=>$_POST['terms_condition'], "price"=>$_POST['price'], "discount"=>$_POST['discount']]);
      echo '<script type="text/javascript">alert("Drug recorded"); window.location="drug";</script>'; 
  }

  //edit drug
 if (isset($_POST['edit-drug'])) {
    
    $database->update("drugs", "id = '".$_POST['id']."'", $fields = ["name"=>$_POST['name'], "description"=>$_POST['description'], "terms_condition"=>$_POST['terms_condition'], "price"=>$_POST['price'], "discount"=>$_POST['discount']]);
    
    echo '<script type="text/javascript">alert("drug modified"); window.location="drug";</script>';
  }

  //delete drug
 if (isset($_POST['delete-drug'])) {
    
    $database->deleteById("drugs", "id", $_POST['id']);
    
    echo '<script type="text/javascript">alert("drug deleted"); window.location="drug";</script>';
  }

  //add new patient
 if (isset($_POST['add-patient'])){

    $database->create("users", $fields = ["category"=>"Patient", "names"=>$_POST['names'], "telephone"=>$_POST['telephone'], "email"=>$_POST['email'], "status"=>"Active", "location"=>$_POST['address']]);

    $user = $database->inset_id();

    $database->create("patient", $fields = ["national_id"=>$_POST['national_id'], "dob"=>$_POST['dob'], "gender"=>$_POST['gender'], "diabetic_type"=>$_POST['diabetic_type'], "address"=>$_POST['address'], "insurance"=>$_POST['insurance'], "category"=>$_POST['category'], "status"=>"Active", "user_id"=>$user, "created_by"=>$_SESSION['id']]);
      echo '<script type="text/javascript">alert("Patient recorded"); window.location="patient";</script>'; 
  }

  //edit patient
 if (isset($_POST['edit-patient'])){

    $database->update("users", "id = '".$_POST['id']."'", $fields = ["category"=>"Patient", "names"=>$_POST['names'], "telephone"=>$_POST['telephone'], "email"=>$_POST['email'], "location"=>$_POST['address']]);

    $database->update("patient", "user_id = '".$_POST['id']."'", $fields = ["national_id"=>$_POST['national_id'], "dob"=>$_POST['dob'], "gender"=>$_POST['gender'], "diabetic_type"=>$_POST['diabetic_type'], "address"=>$_POST['address'], "insurance"=>$_POST['insurance'], "category"=>$_POST['category']]);
      echo '<script type="text/javascript">alert("Patient modified"); window.location="patient";</script>'; 
  }

  //delete patient
 if (isset($_POST['delete-patient'])) {
    
    $database->deleteById("patient", "id", $_POST['id']);
    
    echo '<script type="text/javascript">alert("patient deleted"); window.location="patient";</script>';
  }

  //order drugs
 if (isset($_POST['order-drug'])){
   $ans = $database->getAllWithColumn('i.insurance, discount','insurance i, patient p WHERE i.id = p.insurance AND p.user_id = "'.$_SESSION['id'].'" ORDER BY p.id DESC LIMIT 1');
    foreach($ans as $key => $value){
      $insurance = $value['insurance'];
      $discount = $value['discount'];
    }
   $database->create("application", $fields = ["address"=>$_POST['address'], "city"=>$_POST['city'], "zip_code"=>$_POST['zip_code'], "description"=>$_POST['description'], "insurance"=>$insurance, "discount"=>$discount, "status"=>"Request", "patient_id"=>$_SESSION['id']]);
   $application_id = $database->inset_id();
   $checkbox = $_POST['drugs'];
   for ($i=0; $i<sizeof ($checkbox);$i++) {  
   $ans = $database->getAllWithColumn('price','drugs WHERE id = "'.$checkbox[$i].'"');
    foreach($ans as $key => $value){
      $price = $value['price'];
    }
      $database->create("orders", $fields = ["drug_id"=>$checkbox[$i], "price"=>$price, "application_id"=>$application_id, "created_by"=>$_SESSION['id']]);
      echo '<script type="text/javascript">alert("Order sent, We will give you feedback shortly."); window.location="ordered";</script>'; 
   }
  }

  //order approval
 if (isset($_POST['order-approval'])){
   $checkbox = $_POST['drug_id'];
   $qty = $_POST['quantity'];
   $total = 0;
   for ($i=0; $i<sizeof ($checkbox);$i++) {
      $ans = $database->getAllWithColumn('price','orders WHERE drug_id = "'.$checkbox[$i].'" AND application_id = "'.$_POST['id'].'"');  
         foreach($ans as $key => $value){
         $price = $value['price'] * $qty[$i];
         $total += $price;
       }
      $database->update("orders", "drug_id = '".$checkbox[$i]."' AND application_id = '".$_POST['id']."'", $fields = ["quantity"=>$qty[$i]]);
      $database->update("application", "id = '".$_POST['id']."'", $fields = ["amount"=>$total, "status"=>"Approved", "comment"=>$_POST['comment']]);
      echo '<script type="text/javascript">alert("Order approval sent."); window.location="ordered";</script>'; 
        
   }
  }

  //reject order
 if (isset($_POST['reject-order'])){
   $database->update("orders", "id = '".$_POST['id']."'", $fields = ["status"=>"Rejected"]);
    echo '<script type="text/javascript">alert("Order approval sent."); window.location="ordered";</script>'; 
  }

  function insurance() {
    $connect = new mysqli("localhost", "root", "", "national_diabetic_db");
    $output ='';
    $ans =mysqli_query($connect,"SELECT * FROM insurance;");
    foreach ($ans as $key => $value) {
      $output .= '<option value="'.$value["id"].'">'.$value["insurance"].'</option>';
    }
    return $output;
  }

  function insuranceById($id) {
    $connect = new mysqli("localhost", "root", "", "national_diabetic_db");
    $output ='';
    $ans =mysqli_query($connect,"SELECT * FROM insurance WHERE id=$id;");
    foreach ($ans as $key => $value) {
      $output .= '<option value="'.$value["id"].'">'.$value["insurance"].'</option>';
    }
    return $output;
  }

?>