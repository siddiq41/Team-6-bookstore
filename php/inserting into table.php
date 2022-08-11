<? 
$mysql_host = 'localhost'; 
$mysql_user = 'oyem_Amaka'; 
$mysql_password = 'Chiyenum1.'; 
$mysql_db = 'oyem_db1';
$conn = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_db); 

if ($conn->connect_error) {
die("Connection failed: " .$conn->connect_error); }

$sql = "INSERT INTO Profiles ( fname, lname,100,DOB,USER_CODE) VALUES ('John', 'Doe', 100,STR_TO_DATE('22,3,1990', '%d,%m,%y'),1 )"; if ($conn->query($sql) === TRUE) {
echo "New record created successfully"; 
} else {
echo "Error: " . $sql "<br>" . $conn->error;} $conn->close();
?>