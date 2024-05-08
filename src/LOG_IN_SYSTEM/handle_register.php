<?php
session_start();
require_once '../includes/connect.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $password_confirm = $_POST['password_confirm'] ?? null;

    if (empty($name) || empty($email) || empty($password) || empty($password_confirm)) {
        $message = "Alle felter må fylles ut.";
    } elseif ($password !== $password_confirm) {
        $message = "Passordene matcher ikke.";
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bindParam(1, $email);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $hashed_password);
            if ($stmt->execute()) {
                $_SESSION['message'] = "Registrering vellykket. Du kan nå logge inn.";
                header("Location: login.php");
                exit();
            } else {
                $message = "Kunne ikke registrere bruker.";
            }
        } else {
            $message = "En bruker med denne e-postadressen finnes allerede.";
        }
    }
}

$_SESSION['message'] = $message;
header("Location: register.php");
exit();
?>
