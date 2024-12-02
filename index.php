<?php
$conn = new mysqli('localhost', 'root', '', 'meu_site');

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

$sql = "SELECT * FROM ebooks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MixStudio</title>
    <link rel="stylesheet" href="arte.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
</head>

<body>
    <header>
        <h1>MixStudio</h1>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">Sobre Nós</a></li>
                <li><a href="#store">Ebooks</a></li>
                <li><a href="#blog">Cursos</a></li>
                <li><a href="#contact">Contato</a></li>
                <li><a href="Login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    
    <section id="home">
        <h2>Bem-vindo ao MixStudio</h2>
        <p>Encontre os melhores eBooks para você!</p>
    </section>

    <section id="about">
        <h2>Sobre Nós</h2>
        <p>Somos uma startup dedicada a oferecer uma ampla gama de eBooks para todos os gostos.</p>
    </section>

    <section id="store">
        <h2>Loja</h2>
        <div class="product">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='ebook-item'>";
                    
                    if (!empty($row['imagem'])) {
                        echo "<img src='" . htmlspecialchars($row['imagem']) . "' alt='Capa do eBook' style='width:150px; height:auto;'>";
                    }
                    echo "<h3>" . htmlspecialchars($row['titulo']) . "</h3>";
                    echo "<p>" . htmlspecialchars($row['descricao']) . "</p>";
                    echo "<p>Valor: R$" . number_format($row['valor'], 2, ',', '.') . "</p>";
                    echo "<a href='" . htmlspecialchars($row['link_pagamento']) . "' target='_blank' class='btn-comprar'>Comprar</a>";
                    echo "<hr>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhum eBook disponível.</p>";
            }
            ?>
        </div>
    </section>

    <section id="blog">
        <h2>Blog</h2>
        <article>
            <h3>Título do Post</h3>
            <p>Conteúdo do blog...</p>
        </article>
    </section>


    <footer>
        <p>&copy; 2024 MixStudio. Todos os direitos reservados.</p>
    </footer>

    <script src="calculator.js"></script>
</body>
</html>


   ______     ____
  /\/\/\/\   | "o \
<|\/\/\/\/|_/   __/
 |____________/
 |_|_|   /_/_/
 
