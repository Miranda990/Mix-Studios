<?php
// Conectar ao banco de dados
$conn = new mysqli('localhost', 'root', '', 'meu_site');

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $link_pagamento = $_POST['link_pagamento'];

    // Verifica se o arquivo de imagem foi enviado
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        // Define a pasta para salvar as imagens
        $pastaDestino = 'uploads/';
        
        // Gera um nome único para a imagem para evitar conflitos
        $nomeImagem = uniqid() . '-' . basename($_FILES['imagem']['name']);
        $caminhoImagem = $pastaDestino . $nomeImagem;

        // Move a imagem para a pasta de destino
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoImagem)) {
            // Insere os dados no banco de dados
            $sql = "INSERT INTO ebooks (titulo, descricao, valor, link_pagamento, imagem) 
                    VALUES ('$titulo', '$descricao', '$valor', '$link_pagamento', '$caminhoImagem')";
            
            if ($conn->query($sql) === TRUE) {
                echo "eBook adicionado com sucesso!";
            } else {
                echo "Erro ao adicionar eBook: " . $conn->error;
            }
        } else {
            echo "Erro ao fazer upload da imagem.";
        }
    } else {
        echo "Por favor, envie uma imagem para a capa do eBook.";
    }
}

$conn->close();
?>
