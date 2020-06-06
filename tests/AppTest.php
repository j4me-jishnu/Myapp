<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class AppTest extends TestCase{
  public static function setUpBeforeClass(): void{
  }
  protected function setUp():void{
  }
  public function testCanCreateApp(): void{
    $app=new App();
    $this->assertInstanceOf(
      App::class,
      $app
    );
  }
  public function testAppCanGreet(): void{
    $app=new App();
    $output=$app->greet("Bob");
    $this->assertEquals(
      "Hello, Bob",
      $output
    );
  }

  public function testAppCannotGreetIfNameIsEmpty(): void{
    $this->expectExceptionMessage('Error Processing Request');
    $app=new App();
    $app->greet("");
  }

  public function testMyFunction(): void{
    $app=new App();
    $output=$app->checkuser("jishnu","12345");
    $this->assertEquals("User verified successfully", $output);
  }
  public function testIfPasswordEmpty(): void{
    $this->expectExceptionMessage("Password is not given");
    $app=new App();
    $password="";
    $output=$app->ifPasswordEmpty($password);
  }
  public function testPasswordWithTrueValue(): void{
    $app=new App();
    $output = $app->passwordValidation("jishnu123");
    $this->assertEquals("Your password is jishnu123", $output);
  }
  public function testPasswordNotValidIfNotContainANumber(): void{
    $this->expectExceptionMessage("Please include a number");
    $output=new App();
    $output->passwordValidation("jishnu");
  }
  public function testPrintCustomersList(): void{
    $app = new App();
    $customers = array("Abhishesk", "Anand", "Ajith");
    $output = $app->listCustomers($customers);
    $this->assertEquals("AbhisheskAnandAjith", $output);
  }
  public function testIfEmptyCutomerDetails(): void{
    $this->expectExceptionMessage("No customer details given");
    $output=new App();
    $customer = array("");
    $output->ifCustomerEmpty($customer);
  }
  // public function testNotAddCutomerIfNoCustomer(): void{
  //   $this->expectExceptionMessage("Failed to add customer");
  //   $app = new App();
  //   $app->addCustomer("");
  // }
  // public function testIfCustomerAdded(): void{
  //   $app = new App();
  //   $customer = array('name'=>"jishnu",'age'=> "23");
  //   $output = $app->addCustomer($customer);
  //   $this->assertEquals('jishnu',$output['name']);
  //   $this->assertEquals('23',$output['age']);
  // }
  public function testAppCannotBlockIfNoCustomerId(): void{
    $this->expectExceptionMessage("Customer ID not valid");
    $customer_id="";
    $new_password="jishnu123";
    $output=new App();
    $output->blockCustomer($customer_id, $new_password);
  }
  public function testAppCannotBlockIfPasswordNotMatching(): void{
    $this->expectExceptionMessage("Password Not Matching");
    $customer_id="1";
    $new_password="jish";
    $app=new App();
    $app->blockCustomer($customer_id, $new_password);
  }
  public function testBlockCustomerIfValid(): void{
    $customer_id="1";
    $new_password="jishnu123";
    $app = new App();
    $output=$app->blockCustomer($customer_id, $new_password);
    $this->assertEquals(true, $output);
  }
  public function testAppCanShowDatewiseResult(): void{
    $app = new App();
    $output = $app->showDateWiseWinnerDetails("2020-06-05");
    $this->assertEquals("jishnu", $output);
  }
  public function testAppCannotShowDatewiseResultIfEmptyDate(): void{
    $this->expectExceptionMessage("Invalid Date");
    $app = new App();
    $app->showDateWiseWinnerDetails("");
  }
  public function testShowNoRecordsWhenNoRecordsOnDate(): void{
    $this->expectExceptionMessage("No records found");
    $app = new App();
    $app->showDateWiseWinnerDetails("2020-06-04");
  }
  public function testAppCannotShowCustomerIfEmptyMobile(): void{
    $this->expectExceptionMessage("Invalid Mobile Number");
    $app = new App();
    $app->searchCustomerOnMobile("");
  }
  public function testAppCanShowCustomer(): void{
    $app = new App();
    $output = $app->searchCustomerOnMobile("8089706022");
    $this->assertEquals("jishnu", $output);
  }
  public function testMobileNumberNotFound(): void{
    $this->expectExceptionMessage("No records found");
    $app = new App();
    $app->searchCustomerOnMobile("8089706033");
  }
  public function testCustomerPaymentAdding(): void{
    $app = new App();
    $output = $app->customerPaymentAdding("1", "250");
    $this->assertEquals("250", $output);
  }
  public function testAppCannotAddPaymentWhenNoCustomerId(): void{
    $this->expectExceptionMessage("No records found");
    $app = new App();
    $app->customerPaymentAdding("5","260");
  }
  public function testAppCannotAddPaymentWhenEmptyAmount(): void{
    $this->expectExceptionMessage("Input valid data");
    $app = new App();
    $app->customerPaymentAdding("1","");
  }
  public function testAppCannotShowPaymentIfNoCustomer(): void{
    $this->expectExceptionMessage("Invalid Customer ID");
    $app = new App();
    $app->showDetailedCustomerPaymentHistory("");
  }
  public function testAppCanShowPaymentDetails(): void{
    $app = new App();
    $output = $app->showDetailedCustomerPaymentHistory("1");
    $this->assertEquals("record1", $output);
  }
  public function testAppCannotShowBalanceIfNoCustomer(): void{
    $this->expectExceptionMessage("Invalid Customer ID");
    $app = new App();
    $app->showCustomerBalanceAmountToPay("");
  }
  public function testAppCanShowCustomerBalance(): void{
    $app = new App();
    $output = $app->showCustomerBalanceAmountToPay("1");
    $this->assertEquals("250", $output);
  }
  public function testAppCanAddWinningCode(): void{
    $app = new App();
    $date = date("Y-m-d");
    $output = $app->publishWinningCode("ABC123", $date);
    $this->assertEquals(true, $output);
  }
  public function testAppCannotPublishIfInputsEmpty(): void{
    $this->expectExceptionMessage("Invalid date or winning code");
    $app = new App();
    $date = date("Y-m-d");
    $winninng_code = "";
    $app->publishWinningCode($winninng_code, $date);
  }

  protected function tearDown():void{

  }

  public static function tearDownAfterClass():void{

  }

}
