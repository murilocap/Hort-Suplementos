<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vegance</title>
    <link rel="stylesheet" href="../../materiais/estilos/formata.css">
    <link rel="stylesheet" href="../../materiais/estilos/cadastro.css">
    <link rel="shortcut icon" href="../../materiais/imagens/favicon.ico" type="image/x-icon">
    <script src="../../materiais/codigos/util.js"></script>
</head>
<body>
    
    <header>
        <a id="titulo" href="../../"><h1>Vegance</h1></a>
        <nav>
            <form action="../../.php" method="get" name="busca" id="busca">
                <input type="text" name="busca-inp" id="busca-inp" placeholder="Busque aqui..." autocomplete="off">
                <button type="submit" name="busca-btn" id="busca-btn"><ion-icon name="search-outline"></ion-icon></button>
            </form>
            <ul id="top-atalhos">
                <li><a class="top-icone" id="carrinho" href="carrinho/"><ion-icon name="cart-outline"></ion-icon><span>Carrinho</span></a></li>
                <li><a class="top-icone" id="favoritos" href="lista-desejos/"><ion-icon name="heart-outline"></ion-icon><span>Favoritos</span></a></li>
                <li><a class="top-icone" id="conta" href="../"><ion-icon name="person-circle-outline"></ion-icon><span>Conta</span></a></li>
            </ul>
        </nav>
    </header>

    <main>
        
        <h2>Cadastro de Produto</h2>
        <?php 
            //Fazendo a conexão com a base de dados
            $host="localhost";
            $bd="vegance";
            $user="root";
            $senha="";

            //Criando uma variável de conexão agora
            $con = mysqli_connect($host,$user,$senha,$bd) 
            or die("Impossível conectar neste banco de dados");

            //Recebendo os dados fornecedios pelo formulário
            $codbarras = $_POST["cod-brr"];
            $nome = $_POST["nome"];
            $estoque = $_POST["estoque"];
            $custo = $_POST["custo"];
            $venda = $_POST["venda"];
            $foto = $_POST["foto"];

            //Criando a string de inserção na tabela clientes
            $query = "INSERT INTO produtos (codbarras, nome, estoque, custo, venda, foto) VALUES ('$codbarras', '$nome', $estoque, $custo, $venda, '$foto')";

            //Finalmente cadastrando o cliente no BD que está apontado pela variável $con
            $retorno=mysqli_query($con, $query) or die ("Erro ao cadastrar o cliente");
            
        ?>
        <section class="sec-center">
            <img src="../../materiais/imagens/done.png" alt="imagem ilustrativa" class="main-img">
            <p class="texto-destaque">Novo produto registrado!</p>
            <p class="texto-legenda"><ion-icon name="checkmark"></ion-icon> Cadastro efetuado com sucesso.</p>
            <a href="../" class="cta-a"><ion-icon name="reload-circle-outline"></ion-icon> Cadastrar outro produto...</a>
        </section>

    </main>

    <footer>
        <p>Feito com &#10084; no Brasil!</p>
        <p>Copyright &copy; 2022 Murilo Capita, todos os direitos reservados.</p>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>