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
            <img src="ebook-cover.jpg" alt="Capa do eBook">
            <h3>Título do eBook</h3>
            <p>Descrição do eBook.</p>
            <p>Preço: R$XX,XX</p>
            <button>Comprar Agora</button>
        </div>
        
    </section>

    <section id="blog">
        <h2>Blog</h2>
        <article>
            <h3>Título do Post</h3>
            <p>Conteúdo do blog...</p>
        </article>
        
    </section>

    <section id="contact">
        <h2>Contato</h2>
        <form id="contact-form">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Mensagem:</label>
            <textarea id="message" name="message" required></textarea>
            
            <button type="submit">Enviar</button>
        </form>
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