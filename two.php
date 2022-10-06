<?php

$servername = 'localhost';
$username = 'bbhtzcprlji3';
$password = 'CBm$D6OYPy';
$dbname = 'croudfunding';

$user_id=$_GET['user_id'];
$phone_old="";
$email_old="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $phone_old=$row["phone"];
    $email_old=$row["email"];

  }
} else {
  echo "0 results";
}
$conn->close();





$phone_old=trim($phone_old);
$email_old=trim($email_old);

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
$sql = "SELECT * FROM tblclients WHERE phonenumber='$phone_old'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $super_id=$row["userid"];
  }
}

//$sql99 = "SELECT * FROM tblcontacts WHERE email='$email_old'";
//$result = $conn->query($sql99);

//if ($result->num_rows > 0) {
  // output data of each row
  //while($row = $result->fetch_assoc()) {
//    $table_contact_id=$row["id"];
  //}}





if(isset($_GET['user_id']) || isset($_GET['first_name']) || isset($_GET['last_name'])) {
    $user_id=$_GET['user_id'];
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
$ssn=$_GET['ssn'];
$address=$city.",".$state.",".$country;
$today = date("Y-m-d H:i:s");
$last_id="";        
   
$phone_old=trim($phone_old);
$phone=trim($phone);

//$sql="UPDATE tblclients SET company='$company', phonenumber='$phone_old' WHERE userid='27'";

$sql="UPDATE tblclients SET company='$company', vat='$ssn', phonenumber='$phone', country='236', city='$city', state='$state', address='$address' WHERE phonenumber='$phone_old'";

    if ($conn->query($sql) === TRUE) {
         
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    

$sql22="UPDATE tblcontacts SET is_primary='1', firstname='$first_name', lastname='$last_name', email='$email', phonenumber='$phone' WHERE userid='$super_id'";
    
      if ($conn->query($sql22) === TRUE) {
         
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    


$sql="UPDATE tblcustomfieldsvalues SET value='$dependents' WHERE relid='$super_id' AND fieldid='13'";///department

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} 

$yearly__income="UPDATE tblcustomfieldsvalues SET value='$yearly_income' WHERE relid='$super_id' AND fieldid='5'";//////yearly income

if ($conn->query($yearly__income) === TRUE) {
  echo "New record created successfully";
}

$networths="UPDATE tblcustomfieldsvalues SET value='$net_worth' WHERE relid='$super_id' AND fieldid='6'";///$networths
if ($conn->query($networths) === TRUE) {
  echo "New record created successfully";
} 
$liqued="UPDATE tblcustomfieldsvalues SET value='$liquid_assets' WHERE relid='$super_id' AND fieldid='4'";///$liqued
if ($conn->query($liqued) === TRUE) {
  echo "New record created successfully";
} 



$imortanatliqued="UPDATE tblcustomfieldsvalues SET value='$liquidity_importance' WHERE relid='$super_id' AND fieldid='7'";///$liquidity_importance
if ($conn->query($imortanatliqued) === TRUE) {
  echo "New record created successfully";
} 
$sources="UPDATE tblcustomfieldsvalues SET value='$source' WHERE relid='$super_id' AND fieldid='8'";///$sources
if ($conn->query($sources) === TRUE) {
  echo "New record created successfully";
} 
$year_exp="UPDATE tblcustomfieldsvalues SET value='$years_experience' WHERE relid='$super_id' AND fieldid='9'";///$year_exp
if ($conn->query($year_exp) === TRUE) {
  echo "New record created successfully";
} 



$risk="UPDATE tblcustomfieldsvalues SET value='$risk_tolerance' WHERE relid='$super_id' AND fieldid='10'";///$risk
if ($conn->query($risk) === TRUE) {
  echo "New record created successfully";
} 

$time="UPDATE tblcustomfieldsvalues SET value='$timeline' WHERE relid='$super_id' AND fieldid='11'";///$time
if ($conn->query($time) === TRUE) {
  echo "New record created successfully";
} 

$gall="UPDATE tblcustomfieldsvalues SET value='$goal' WHERE relid='$super_id' AND fieldid='12'";///$gall
if ($conn->query($gall) === TRUE) {
  echo "New record created successfully";
} 


$shadi="UPDATE tblcustomfieldsvalues SET value='$material_status' WHERE relid='$super_id' AND fieldid='2'";///$shadi
if ($conn->query($shadi) === TRUE) {
  echo "New record created successfully";
} 
$temp="Yes";
if($employment=="Unemployed"){ $temp="No"; }

$emplyy="UPDATE tblcustomfieldsvalues SET value='$temp' WHERE relid='$super_id' AND fieldid='14'";///$emplyy
if ($conn->query($emplyy) === TRUE) {
  echo "New record created successfully";
} 
$addd="UPDATE tblcustomfieldsvalues SET value='$address' WHERE relid='$super_id' AND fieldid='3'";///$addd
if ($conn->query($addd) === TRUE) {
  echo "New record created successfully";
} 




    
    
    
    
}///if last condition






$conn->close();



?>