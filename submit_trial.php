<?php

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");

include 'admin/config/db_connect.php';

/* =========================
USER ID LOGIC
========================= */

if(isset($_SESSION['user_id'])){

    $user_id = $_SESSION['user_id'];

}else{

    if(!isset($_SESSION['guest_id'])){

        $_SESSION['guest_id'] = rand(100000,999999);

    }

    $user_id = $_SESSION['guest_id'];

}

/* =========================
GET JSON DATA
========================= */

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {

    echo json_encode([
        'success' => false,
        'error' => 'No input received'
    ]);

    exit;
}

$user_id = isset($data['user_id'])
? (int)$data['user_id']
: 0;
/* =========================
SANITIZE INPUTS
========================= */

$fullName      = $conn->real_escape_string($data['fullName']);
$fatherName    = $conn->real_escape_string($data['fatherName']);
$dob           = $conn->real_escape_string($data['dob']);

$age           = (int) $data['age'];

$gender        = $conn->real_escape_string($data['gender']);

$state         = $conn->real_escape_string($data['state']);
$district      = $conn->real_escape_string($data['district']);

$address       = $conn->real_escape_string($data['address']);

$email         = $conn->real_escape_string($data['email']);
$phone         = $conn->real_escape_string($data['phone']);

$city          = $conn->real_escape_string($data['city']);

$playingRole   = $conn->real_escape_string($data['playingRole']);

$battingStyle  = $conn->real_escape_string($data['battingStyle']);

$bowlingStyle  = $conn->real_escape_string($data['bowlingStyle']);

$experience    = (int) $data['experience'];

$achievements  = $conn->real_escape_string($data['achievements']);

/* =========================
OPTIONAL TRIAL DATA
========================= */

$trial_name = isset($data['trial_name'])
? $conn->real_escape_string($data['trial_name'])
: '';

$venue = isset($data['venue'])
? $conn->real_escape_string($data['venue'])
: '';

$trial_date = isset($data['trial_date'])
? $conn->real_escape_string($data['trial_date'])
: '';

$fee = isset($data['fee'])
? $conn->real_escape_string($data['fee'])
: '';

/* =========================
CHECK DUPLICATE PHONE
========================= */

$checkSql = "
SELECT id
FROM trial_registrations
WHERE phone = '$phone'
LIMIT 1
";

$result = $conn->query($checkSql);

if ($result->num_rows > 0) {

    echo json_encode([
        'success' => false,
        'error' => 'This mobile number is already registered.'
    ]);

    $conn->close();

    exit;
}

/* =========================
INSERT QUERY
========================= */

$sql = "

INSERT INTO trial_registrations (

user_id,
full_name,
father_name,
dob,
age,
gender,
state,
district,
address,
email,
phone,
playing_role,
batting_style,
bowling_style,
experience,
city,
achievements,
status,

trial_name,
venue,
trial_date,
fee,

payment_status,
registration_status,
selection_status

)

VALUES (

'$user_id',
'$fullName',
'$fatherName',
'$dob',
$age,
'$gender',
'$state',
'$district',
'$address',
'$email',
'$phone',
'$playingRole',
'$battingStyle',
'$bowlingStyle',
$experience,
'$city',
'$achievements',
'Deactive',

'$trial_name',
'$venue',
'$trial_date',
'$fee',

'pending',
'pending',
'waiting'

)

";

/* =========================
EXECUTE QUERY
========================= */

if ($conn->query($sql) === TRUE) {

    echo json_encode([
        'success' => true,
        'message' => 'Registration successful',
        'user_id' => $user_id
    ]);

} else {

    echo json_encode([
        'success' => false,
        'error' => $conn->error
    ]);
}

$conn->close();

?>