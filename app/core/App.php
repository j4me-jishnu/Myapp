<?php
class App{
  var $result;
  private function is_empty($value){
    return trim($value)=="";
  }
  public function greet($name){
    if($this->is_empty($name)){
      throw new Exception("Error Processing Request", 1);
    }else{
      return "Hello, $name";
    }
  }

  public function passwordValidation($password){
      if(!preg_match("#[0-9]+#",$password)){
        throw new Exception("Please include a number", 1);
      }
      else{
        return "Your password is ".$password;
      }
  }
  public function ifPasswordEmpty($password){
    if(trim($password)==""){
      throw new Exception("Password is not given", 1);
    }
  }

  public function checkuser($username, $password){
    if($username="jishnu" && $password="12345"){
      return "User verified successfully";
    }
    else{
      return "User verification failed";
    }
  }
  public function listCustomers($customer){
    $customers="";
    for($i=0;$i<count($customer);$i++){
     $customers.=($customer[$i]);
   }
   return $customers;
  }
  public function ifCustomerEmpty($customer){
    if(trim($customer==array(""))){
      throw new Exception("No customer details given", 1);
    }
  }
  // public function addCustomer($customer){
  //   if(trim($customer)=array("")){
  //     throw new Exception("Failed to add customer", 1);
  //   }
  //   else{
  //     echo $customer;
  //     return $new_customer = $customer;
  //   }
  // }
  public function blockCustomer($customer_id, $new_password){
    $customer_status;
    if(trim($customer_id)==""){
      throw new Exception("Customer ID not valid", 1);
    }
    else{
      if($new_password == "jishnu123"){
        return true;
      }
      else{
        throw new Exception("Password Not Matching", 1);
      }

    }
  }
  public function showDateWiseWinnerDetails($date_value){
    $data = array("2020-06-05"=>"jishnu");
    if(trim($date_value)==""){
      throw new Exception("Invalid Date", 1);
    }
    else{
    foreach($data as $key => $value){
      if($date_value == $key){
              return $value;
            }
      else{
        throw new Exception("No records found", 1);
      }
    }
  }
  }
  public function searchCustomerOnMobile($mobile){
    $data = array("jishnu"=>"8089706022");
    if(trim($mobile)==""){
      throw new Exception("Invalid Mobile Number", 1);
    }
    else{
    foreach($data as $key => $value){
      if($mobile == $value){
              return $key;
            }
      else{
        throw new Exception("No records found", 1);
      }
    }
  }
  }
  public function customerPaymentAdding($customer_id, $customer_amount){
    $customer_details = array("1"=>"");
    if((trim($customer_id)=="" || trim($customer_amount)=="") || (trim($customer_id)=="" && trim($customer_amount)=="")){
      throw new Exception("Input valid data", 1);
    }
    else{
      foreach($customer_details as $key=>$val){
        if($customer_id == $key){
          $customer_details[$key]=$customer_amount;
          return $customer_details[$key];
        }
        else{
          throw new Exception("No records found", 1);
        }
      }
    }
  }

  public function showDetailedCustomerPaymentHistory($customer_id){
    $records = array("1"=>"record1", "2"=>"record2");
    if(trim($customer_id)==""){
      throw new Exception("Invalid Customer ID", 1);
    }
    else{
      foreach ($records as $key => $value) {
        if($customer_id==$key){
          return $value;
        }
      }
    }
  }
  public function showCustomerBalanceAmountToPay($customer_id){
    $records = array("1"=>"250", "2"=>"350");
    if(trim($customer_id)==""){
      throw new Exception("Invalid Customer ID", 1);
    }
    else{
      foreach ($records as $key => $value) {
        if($customer_id==$key){
          return $value;
        }
      }
    }
  }
  public function editPaymentDetails($customer_id){

  }
  public function publishWinningCode($winninng_code, $date){
    $winninng_code_records = array("");
    if(trim($winninng_code)=="" || trim($date)==""){
      throw new Exception("Invalid date or winning code", 1);
    }
    else{
      $winninng_code_records[$date]=$winninng_code;
      return true;
    }
  }
  public function lockContestBeforeOneHour(){

  }
  public function publishWinner($winninng_code, $customer_id){

  }
  public function participatedCustomersList(){

  }
}
 ?>
