<?php
session_start();
require_once '../includes/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Debugging statements
    error_log("Login attempt with: $login");

    if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :login");
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :login");
    }

    $stmt->bindValue(':login', $login);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Debugging statements
    if ($user) {
        error_log("User found: " . print_r($user, true));
    } else {
        error_log("No user found with login: $login");
    }

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_surname'] = $user['surname'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        if ($_SESSION['role'] === 'admin') {
            header("Location: ../dashboard/admin_panel.php");
        } else {
            header("Location: logged-in.php");
        }
        exit;
    } else {
        $_SESSION['message'] = 'Login feilet: Ugyldig brukernavn eller passord';
        header("Location: login.php");
        exit;
    }
}
?>
