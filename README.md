# Max Milhas teste backend - Wanderson Felipe Vieira

vieira.wanderson(at)gmail.com

Desafio
=======

"Crie uma aplicação web onde seja possível cadastrar uma nova foto, ver a lista de fotos cadastradas e excluir uma foto.
Nessa aplicação, faça uma página que exiba todas as fotos cadastradas em uma galeria como a da imagem em anexo chamada todas-fotos.jpg"


#Requisitos
Para rodar o programa, é necessário:
 - MySQL >= 5.5
 - PHP >= 5.4 

#Rodando o Script do Banco
 - O Script criará um banco de dados novo e sua respectiva tabela
 - Para executar, primeiramente configure as credencias do banco no arquivo script.php
 - Por padrão os dados estão:
 	$servername = "localhost";
	$username = "root";
	$password = "";

#Executando o Programa

Com o BD devidamente conectado, você poderá abrir o arquivo index.php no seu host local ou de sua preferência.

O programa possibilita o usuário adicionar ou remover fotos em uma galeria, além de exibir as mesmas em tamanho real.

O limite de upload é de 2MB e somente são aceitos arquivos jpg, jpeg e png.

 - Dificuldade encontradas: manuseio de dados entre o php e o modal.js, testes unitários (apesar dos estudos estarem em andamento ainda falta maior dominio para que sejam feitos em tempo hábil).