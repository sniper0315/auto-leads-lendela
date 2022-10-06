<?php

$first_name=$_GET['first_name'];
$last_name=$_GET['last_name'];
$company=$first_name." ".$last_name;
$email=$_GET['email'];
$country=$_GET['country'];
$state=$_GET['state'];
$city=$_GET['city'];
$employment=$_GET['employment'];
$material_status=$_GET['material_status'];
$dependents=$_GET['dependents'];
$goal=$_GET['goal'];
$timeline=$_GET['timeline'];
$risk_tolerance=$_GET['risk_tolerance'];
$years_experience=$_GET['years_experience'];
$source=$_GET['source'];
$liquidity_importance=$_GET['liquidity_importance'];
$net_worth=$_GET['net_worth'];
$yearly_income=$_GET['yearly_income'];
$liquid_assets=$_GET['liquid_assets'];
$phone=$_GET['phone'];
$passwordi=$_GET['password'];
$user=$_GET['user'];
$ssn=$_GET['ssn'];
$zip_code=$_GET['zip'];
$address=$city.",".$state.",".$country;
$today = date("Y-m-d H:i:s");
$last_id="";
$passwordo=password_hash($passwordi, PASSWORD_DEFAULT);



$servername = "173.201.179.126";
$username = "crm_perfexx_crm";
$password = "001234560crmcrm";
$dbname = "crm_perfexx_crm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO tblclients (company, vat, phonenumber, country, city, zip, state, address, datecreated)
VALUES ('$company', '$ssn', '$phone', '236', '$city', '$zip_code', '$state', '$address', '$today')";

if ($conn->query($sql) === TRUE) {
     $last_id = $conn->insert_id;
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


$servername = "173.201.179.126";
$username = "crm_perfexx_crm";
$password = "001234560crmcrm";
$dbname = "crm_perfexx_crm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO tblcontacts (userid, is_primary, firstname, lastname, email, phonenumber, datecreated, password)
VALUES ('$last_id', '1', '$first_name', '$last_name', '$email', '$phone', '$today', '$passwordo')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
///////////////////////////////////////This is all for the custom fields
/////////////////////////////////////////////for department
$servername = "173.201.179.126";
$username = "crm_perfexx_crm";
$password = "001234560crmcrm";
$dbname = "crm_perfexx_crm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO tblcustomfieldsvalues (relid, fieldid, fieldto, value)
VALUES ('$last_id', '13', 'customers', '$dependents')";///department

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
}

$yearly__income = "INSERT INTO tblcustomfieldsvalues (relid, fieldid, fieldto, value)
VALUES ('$last_id', '5', 'customers', '$yearly_income')";///yearly income

if ($conn->query($yearly__income) === TRUE) {
  echo "New record created successfully";
} 
$networths = "INSERT INTO tblcustomfieldsvalues (relid, fieldid, fieldto, value)
VALUES ('$last_id', '6', 'customers', '$net_worth')";///net_worth income

if ($conn->query($networths) === TRUE) {
  echo "New record created successfully";
} 
$liqued = "INSERT INTO tblcustomfieldsvalues (relid, fieldid, fieldto, value)
VALUES ('$last_id', '4', 'customers', '$liquid_assets')";///liquid_assets income

if ($conn->query($liqued) === TRUE) {
  echo "New record created successfully";
} 
$imortanatliqued = "INSERT INTO tblcustomfieldsvalues (relid, fieldid, fieldto, value)
VALUES ('$last_id', '7', 'customers', '$liquidity_importance')";///liquidity_importance income

if ($conn->query($imortanatliqued) === TRUE) {
  echo "New record created successfully";
} 
$sources = "INSERT INTO tblcustomfieldsvalues (relid, fieldid, fieldto, value)
VALUES ('$last_id', '8', 'customers', '$source')";///sources 

if ($conn->query($sources) === TRUE) {
  echo "New record created successfully";
} 
$year_exp = "INSERT INTO tblcustomfieldsvalues (relid, fieldid, fieldto, value)
VALUES ('$last_id', '9', 'customers', '$years_experience')";///years_experience 

if ($conn->query($year_exp) === TRUE) {
  echo "New record created successfully";
} 
$risk = "INSERT INTO tblcustomfieldsvalues (relid, fieldid, fieldto, value)
VALUES ('$last_id', '10', 'customers', '$risk_tolerance')";///risk 

if ($conn->query($risk) === TRUE) {
  echo "New record created successfully";
} 
$time = "INSERT INTO tblcustomfieldsvalues (relid, fieldid, fieldto, value)
VALUES ('$last_id', '11', 'customers', '$timeline')";///timeline 

if ($conn->query($time) === TRUE) {
  echo "New record created successfully";
} 
$gall = "INSERT INTO tblcustomfieldsvalues (relid, fieldid, fieldto, value)
VALUES ('$last_id', '12', 'customers', '$goal')";///$goal 

if ($conn->query($gall) === TRUE) {
  echo "New record created successfully";
} 
$shadi = "INSERT INTO tblcustomfieldsvalues (relid, fieldid, fieldto, value)
VALUES ('$last_id', '2', 'customers', '$material_status')";///$material_status 

if ($conn->query($shadi) === TRUE) {
  echo "New record created successfully";
} 
$temp="Yes";
if($employment=="Unemployed"){ $temp="No"; }
$emplyy = "INSERT INTO tblcustomfieldsvalues (relid, fieldid, fieldto, value)
VALUES ('$last_id', '14', 'customers', '$temp')";///$employment

if ($conn->query($emplyy) === TRUE) {
  echo "New record created successfully";
} 
$addd = "INSERT INTO tblcustomfieldsvalues (relid, fieldid, fieldto, value)
VALUES ('$last_id', '3', 'customers', '$address')";///$address 

if ($conn->query($addd) === TRUE) {
  echo "New record created successfully";
} 





$conn->close();


?>