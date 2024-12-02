<?php
session_start(); 


$conn = new mysqli('localhost', 'root', '', 'meu_site');

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM usuarios WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['is_admin'] = ($user['is_admin'] == 1); 

        
        if ($_SESSION['is_admin']) {
            header('Location: admin.php');
            exit;
        } else {
            echo "Acesso restrito: você não é um administrador.";
        }
    } else {
        echo "<p style='color: red;'>Email ou senha inválidos.</p>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Adm</title>
    <link rel="stylesheet" href="loginart.css">
</head>
<body>
    <header>
        <h1>MixStudios - Login Adms</h1>
    </header>
    <section>
        <h2>Login</h2>
        <form id="loginForm" method="post" action="login.php">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        <p id="errorMessage" style="color: red;"></p>
    </section>
  </body>
</html>
