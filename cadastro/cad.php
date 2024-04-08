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
	$nome = $_POST["nome"];
	$sobrenome = $_POST["sbr-nome"];
	$rua = $_POST["rua"];
	$bairro = $_POST["bairro"];
	$cidade = $_POST["cidade"];
	$cep = $_POST["cep"];
	$estado = $_POST["uf"];
	$celular = $_POST["celular"];
	$email = $_POST["email"];
	$senha = $_POST["senha"];

	//Criando a string de inserção na tabela clientes
	$query="INSERT INTO clientes (nome, sobrenome, rua, bairro, cidade, cep, uf, celular, email, senha) VALUES ('$nome','$sobrenome','$rua','$bairro','$cidade','$cep','$estado','$celular','$email','$senha')";

	//Finalmente cadastrando o cliente no BD que está apontado pela variável $con
	$retorno=mysqli_query($con, $query) or die ("Erro ao cadastrar o cliente");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vegance</title>
    <link rel="stylesheet" href="../materiais/estilos/formata.css">
    <link rel="shortcut icon" href="../materiais/imagens/favicon.ico" type="image/x-icon">
    <script src="../../materiais/codigos/util.js"></script>
</head>
<body>
    
    <header>
        <a id="titulo" href="../index.html"><h1>Vegance</h1></a>
        <nav>
            <form action="../.php" method="get" name="busca" id="busca">
                <input type="text" name="busca-inp" id="busca-inp" placeholder="Busque aqui..." autocomplete="off">
                <button type="submit" name="busca-btn" id="busca-btn"><ion-icon name="search-outline"></ion-icon></button>
            </form>
            <ul id="top-atalhos">
                <li><a class="top-icone" id="carrinho" href="carrinho/index.html"><ion-icon name="cart-outline"></ion-icon><span>Carrinho</span></a></li>
                <li><a class="top-icone" id="favoritos" href="lista-desejos/index.html"><ion-icon name="heart-outline"></ion-icon><span>Favoritos</span></a></li>
                <li><a class="top-icone current-icon" id="conta"><ion-icon name="person-circle-outline"></ion-icon><span>Conta</span></a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Cadastro</h2>        
        <section class="texto-img">
            <img src="../materiais/imagens/done.png" alt="imagem ilustrativa" class="main-img">
            <div>
            <p class="texto-destaque">Bem-vindo(a)! <br> É bom ter você com a gente.</p>
            <p class="texto-legenda"><ion-icon name="checkmark"></ion-icon> Cadastro efetuado com sucesso.</p>
            </div>
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