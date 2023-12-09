<?php
// Establish your database connection

// Assuming you have the user ID available in the session or from POST data
// $user_id = // Retrieve the user ID from the session or POST data

// Retrieve the last login timestamp for the user
$sql = "SELECT last_login FROM user_activity WHERE user_id = $user_id";
// Execute the SQL statement and retrieve the last login timestamp

if ($last_login_timestamp) {
    // Calculate the login duration
    $current_time = time(); // Get the current time in Unix timestamp format
    $last_login_time = strtotime($last_login_timestamp); // Convert the last login timestamp to Unix timestamp

    $login_duration_seconds = $current_time - $last_login_time;
    $login_duration = date('H:i:s', $login_duration_seconds); // Format the duration as HH:MM:SS

    // Update the login duration in the user_activity table
    $sql = "UPDATE user_activity SET login_duration = '$login_duration' WHERE user_id = $user_id";
    // Execute the SQL statement
}
?>

