<?php

require_once 'config/db_connect.php';

/* =========================================
   FILE NAME
========================================= */

$file_name = "registrations_" . date("Y-m-d") . ".csv";

/* =========================================
   HEADERS
========================================= */

header('Content-Type: text/csv');

header('Content-Disposition: attachment; filename="' . $file_name . '"');

/* =========================================
   OUTPUT
========================================= */

$output = fopen("php://output", "w");

/* =========================================
   CSV HEADINGS
========================================= */

fputcsv($output, [

    'ID',
    'Full Name',
    'Father Name',
    'DOB',
    'Age',
    'Gender',
    'State',
    'District',
    'Address',
    'Email',
    'Phone',
    'Playing Role',
    'Batting Style',
    'Bowling Style',
    'Experience',
    'City',
    'Achievements',
    'Status',
    'Created At'

]);

/* =========================================
   FETCH DATA
========================================= */

$query = "

    SELECT *
    FROM trial_registrations
    ORDER BY id DESC

";

$result = mysqli_query($conn, $query);

/* =========================================
   EXPORT DATA
========================================= */

while($row = mysqli_fetch_assoc($result)){

    fputcsv($output, [

        $row['id'],
        $row['full_name'],
        $row['father_name'],
        $row['dob'],
        $row['age'],
        $row['gender'],
        $row['state'],
        $row['district'],
        $row['address'],
        $row['email'],
        $row['phone'],
        $row['playing_role'],
        $row['batting_style'],
        $row['bowling_style'],
        $row['experience'],
        $row['city'],
        $row['achievements'],
        $row['status'],
        $row['created_at']

    ]);

}

/* =========================================
   CLOSE
========================================= */

fclose($output);

exit();

?>