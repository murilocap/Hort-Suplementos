<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vegance</title>
    <link rel="stylesheet" href="materiais/estilos/formata.css">
    <link rel="shortcut icon" href="/materiais/imagens/favicon.ico" type="image/x-icon">
    <script src="materiais/codigos/util.js"></script>
</head>
<body>
    
    <header>
        <a id="titulo" href="index.html"><h1>Vegance</h1></a>
        <nav>
            <form action=".php" method="get" name="busca" id="busca">
                <input type="text" name="busca-inp" id="busca-inp" placeholder="Busque aqui..." autocomplete="off">
                <button type="submit" name="busca-btn" id="busca-btn"><ion-icon name="search-outline"></ion-icon></button>
            </form>
            <ul id="top-atalhos">
                <li><a class="top-icone" id="carrinho" href="carrinho/index.html"><ion-icon name="cart-outline"></ion-icon><span>Carrinho</span></a></li>
                <li><a class="top-icone" id="favoritos" href="lista-desejos/index.html"><ion-icon name="heart-outline"></ion-icon><span>Favoritos</span></a></li>
                <li><a class="top-icone" id="conta" href="login/"><ion-icon name="person-circle-outline"></ion-icon><span>Conta</span></a></li>
            </ul>
        </nav>
    </header>


    <main>
        <h2>
            Resultados da busca por &quot;<?php echo($_GET["busca-inp"]); ?>&quot;:
        </h2>
        <section id="busca-cards">
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
                $nomeprod = $_GET["busca-inp"];

                //Montando a query de pesquisa
                $query = 'SELECT * FROM produtos WHERE nome LIKE "'.'%'.$nomeprod.'%"';

                //Fazendo a consulta na tabela
                $dados = mysqli_query($con,$query) or die ("Erro ao consultar produtos.");

                //Transformando os dados em um array
                $linha = mysqli_fetch_assoc($dados);

                //Transformando os dados em um array
                $total = mysqli_num_rows($dados);

                //Exibe os produtos que correspondem aos critérios de pesquisa
                if ($total > 0) {
                    do {
                        echo("<div class='busca-card'>
                                <img src='materiais/imagens/produtos/".$linha['foto']."'>
                                <div>
                                    <label>".$linha['nome']."</label>
                                    <a class='card-cta'>R$ ".$linha['venda']."</a>
                                </div>
                            </div>");
                    } while ($linha = mysqli_fetch_assoc($dados));
                } else {
                    echo("Não foram encontrados produtos com os termos da pesquisa...");
                }
            ?>
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