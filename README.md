
## Instrunções do Desafio:

1.  Faça o download do arquivo BancoTeste.zip e extraia os arquivos em uma pasta no seu computador.   
2.  Use um SGBD de sua preferência para criar um banco de dados e importar as tabelas do arquivo BancoTeste.fbk.
3.  Analise as tabelas do banco de dados e identifique as informações pertinentes para serem extraídas e organizadas na planilha modelo fornecida.
    
4.  Abra a planilha modelo fornecida e organize as informações extraídas das tabelas na ordem adequada, seguindo o formato da planilha.
    
5.  Salve a planilha como um arquivo CSV.
    
6.  Utilize a API fornecida para enviar a planilha CSV para o teste.
    
7.  Escreva um script em PHP que execute todo esse processo automaticamente. O script deve incluir a conexão com o banco de dados, a extração das informações relevantes, a organização das informações na planilha modelo, a conversão da planilha para CSV e o envio da planilha CSV para a API. Quanto mais eficiente e elegante for o seu script, melhor será a sua nota.
    
8.  Utilize o plugin REST Client no VS Code para testar a API e verificar se a planilha CSV foi enviada com sucesso.

## Processo de resolução do desafio:



#### 1. Organização e compreensão do desafio:

- Criar repositório no GitHub;

- Separar, em formato de texto, as atividades a serem executadas.

#### 2.  Instalação e configuração do ambiente:
    

-  Baixar e descompactar o arquivo BancoTeste.zip;
    
-   Instalar um SGBD (Sistema Gerenciador de Banco de Dados) de preferência;

	-	O software gerenciador de banco de dados escolhido para análise do mesmo foi, por sua simplicidade e facilidade de uso, o FlameRobin. Sua instalação foi feita a partir do seguinte comando:
	
			sudo apt-get install flamerobin;	
    
-   Importar as tabelas do arquivo BancoTeste.fbk;

	- Para que fosse possível importar os dados da tabela, primeiro foi necessário criar um arquivo 'BancoTeste.fdb' a partir do arquivo baixado. Para tal, foi necessário garantir permissões de leitura e escrita para a pasta em que o arquivo 'BancoTeste.fbk' - uma vez que durante o processo de criação do arquivo .fdb me deparei com mensagens de erros. Tais permissões foram condedidas atraáves do comando:
	
			sudo chmod 777 caminho/do/arquivo;
		Uma vez sanados os erros de permissão, pude seguir com a criação do banco de dados, extensão fdb atráves do comando:

			
			gbak -c -user SYSDBA -password <senha> /caminho/do/arquivo.fbk localhost:/caminho/do/arquivo.fdb


	
-   Verificar se as tabelas foram importadas corretamente;
    
-   Identificar e instalar as ferramentas necessárias para desenvolver o script em PHP.
    

#### 3.  Análise das tabelas e extração das informações pertinentes:
    

-   Analisar a estrutura do banco de dados;
    
-   Identificar as tabelas, colunas e relações relevantes para o desafio;
    
-   Escrever consultas SQL para extrair as informações necessárias;
	
		"SELECT * FROM (SELECT '' AS nome_clinica, emd101.nome, 					crd111.documento, crd111.valor, bxd111.valor AS valor_pago, crd111.emissao, crd111.vencto, bxd111.baixa
		FROM emd101
		LEFT JOIN crd111 ON emd101.cgc_cpf = crd111.cgc_cpf
		LEFT JOIN bxd111 ON emd101.cgc_cpf = bxd111.cgc_cpf and 		crd111.documento = bxd111.documento
		UNION ALL
		SELECT '' AS nome_clinica, emd101.nome, cxd555.documento, cxd555.valor, cxd555.valor AS valor_pago, cxd555.data AS emissao, cxd555.data AS vencto, cxd555.data AS baixa
		FROM emd101
		LEFT JOIN atd222 ON emd101.cgc_cpf = atd222.cnpj_cpf
		LEFT JOIN cxd555 ON emd101.cgc_cpf = atd222.cnpj_cpf and cxd555.documento = atd222.documento)
		ORDER BY nome;"
    
-   Verificar se as consultas SQL retornam os resultados esperados.
			   
	- Foi necessário conectar ao banco de dados para testar a query. Tal procedimento pode ser feito com as seguintes linhas de comando:
				
			isql- fb
			CONNECT "localhost:/local/do/arquivo.fdb"
			user 'SYSDBA'
			password 'masterket';
			

#### <del>4.  Organização das informações na planilha modelo:<del>
    
- A  organização da planilha foi feita atráves da query escrita acima.
   

#### 5.  Conversão da planilha para CSV:
   - Primeira tentativa de extração naõ funcional, realizada a partir do comando: 
					  
			OUTPUT 'local/do/arquivo.csv'
			//QUERY SELECT * FROM ( SELECT ...
			OUTPUT
			
   - Optei por começar o script.
		
	- Comecei por preparar o ambiente PHP, e converter as informaçẽos da planilha de forma direta. Para isso, foram utilizados os comandos para prepara o ambiente de desenvolvimento PHP atráves dos comandos:
				
			sudo apt install apache2 -y;
			sudo apt install php libapache2-mod-php
			sudo systemctl status apache2
			sudo apachectl configtest
		
	Para confirmação do ambiente virtual, acessar `http://<IP do seu servidor>`, que apresentará uma página padrão para o Apache.
    

#### 6.  Desenvolvimento do script em PHP:
    

-   Estabelecer a conexão com o banco de dados;
	
	- Para tal foi utilizada a biblioteca PDO, para estabelecer conexão com um banco de dados tipo firebird. Foi necessário então habilitar  a extensão 
					
			extension=firebir;
   
	    no arquivo php.ini
    
- Escrever código básico para testar conexão;
- Escrever primeiro código para executar a extração de arquivos por meio das funções :
	 
	  prepare();
	  execute();
	  fetchAll(PDO::FETCH_OBJ); 	
	e loop para escrever os dados em um arquivo.
		
-   Escrever código para executar o envio de informações para a API;
		
	- Utilizarndo a biblioteca CURL, foram possíves fazer requisições HTTP POST na API referida. Sendo então possível coletar o token e enviar o arquivo gerado;
       
-   Enviar o arquivo CSV para a API por meio de código PHP;
			
	- Foram unidos os scripts para que, após alguns ajustes, a automatização do processo estivesse completa.
    
-   Testar o script em diferentes cenários e verificar se está funcionando corretamente.
    

#### 7.  Testes e documentação:
    

-   Testar o script em diferentes cenários para verificar se está funcionando corretamente;
	
	- Recebi erros relacionados a restrições de envio de dados, como a não possibilidade de um valor NULL na coluna "nome". 
	- Resposta de erro devido a quantidade de informação enviada. 
    
-   Documentar o código e as funcionalidades implementadas;
    
    
-   Preparar uma apresentação sobre o desenvolvimento do script e os resultados obtidos.
