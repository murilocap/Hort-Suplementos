<?php  
	//Recebendo as informações do produto selecionado pelo usuário
	$codprod=$_GET['codprod'];
	$codcli=$_GET['codcli'];
	$preco=$_GET['preco'];

	 //Variaveis de conexão com a base de dados
	 $host = "localhost";
	 $bd = "info2a";
	 $usuario = "root";
	 $senha = "";
                     
	 //Tentando estabelecer uma conexão com a base de dados
	 $con = mysqli_connect($host, $usuario, $senha, $bd)
	 or die('Erro ao conectar no SGBD');

	$codvenda = retorna_codvenda($codcli);
	if ($codvenda>0){
		//Há uma venda não concluída por este cliente
		echo ("Encontrou!!!! Codigo da venda =$codvenda");

		//Inserindo o produto comprado
		insere_produtos($codvenda);

		echo ("<br>Inserido produtos nesta venda em aberto");

	}else{
		//Não há venda em aberto. Iniciando uma nova venda
		$query="INSERT INTO vendas (codcli, datavenda) VALUES ($codcli, '2023-02-13')";

		$dados=mysqli_query($con, $query) or die ("Erro ao iniciar uma nova venda para este cliente");

		//Capturando o código desta nova venda
		$codvenda = retorna_codvenda($codcli);

		//Inserindo o produto comprado
		insere_produtos($codvenda);

		echo ("Uma nova venda foi criata e também foi inserido produto nela");
	}

	function insere_produtos($codigodavenda){
		global $con, $codprod, $preco;	

		//Insere agora o produto comprado na tabela itens_venda
		$query="INSERT INTO itens_venda(codvenda, codprod, qtde, preco) VALUES ($codigodavenda,$codprod,1,$preco)";
	 	
	 	//Executando a query de inserção
	 	$dados=mysqli_query($con, $query) or die ("Erro ao gravar o produto na tabela itens_venda");
	}

	function retorna_codvenda($codigocliente){
		global $con;

		//Até que prove o contrário, não encontrou vendas em aberto para este cliente
		$codvenda=0;

		//Verificando se este cliente já possui alguma venda em aberto
	 	$query="SELECT * FROM vendas WHERE codcli=$codigocliente AND isnull(nota_fiscal)";

	 	//Executando a query de pesquisa
	 	$dados=mysqli_query($con, $query) or die ("Erro ao consultar venda");

		// transforma os dados em um array
		$linha = mysqli_fetch_assoc($dados);

		//verifica se encontrou alguma venda em aberto. 
		//Se sim, $total será maior que zero.
		$total = mysqli_num_rows($dados);
		if ($total>0){
			//Há uma venda não concluída por este cliente
			//Gravando o código desta venda
			$codvenda=$linha['codvenda'];
		}
		return $codvenda;
	}
?>