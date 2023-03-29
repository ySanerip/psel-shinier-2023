### Instrunções do Desafio:

1.  Faça o download do arquivo BancoTeste.zip e extraia os arquivos em uma pasta no seu computador.   
2.  Use um SGBD de sua preferência para criar um banco de dados e importar as tabelas do arquivo BancoTeste.fbk.
3.  Analise as tabelas do banco de dados e identifique as informações pertinentes para serem extraídas e organizadas na planilha modelo fornecida.
    
4.  Abra a planilha modelo fornecida e organize as informações extraídas das tabelas na ordem adequada, seguindo o formato da planilha.
    
5.  Salve a planilha como um arquivo CSV.
    
6.  Utilize a API fornecida para enviar a planilha CSV para o teste.
    
7.  Escreva um script em PHP que execute todo esse processo automaticamente. O script deve incluir a conexão com o banco de dados, a extração das informações relevantes, a organização das informações na planilha modelo, a conversão da planilha para CSV e o envio da planilha CSV para a API. Quanto mais eficiente e elegante for o seu script, melhor será a sua nota.
    
8.  Utilize o plugin REST Client no VS Code para testar a API e verificar se a planilha CSV foi enviada com sucesso.

### Com base na descrição do desafio, eu dividiria as 30 horas de trabalho da seguinte forma:



1. Organização e compreensão do desafio (30 min):

- Criar repositório no GitHub;

- Separar, em formato de texto, as atividades a serem executadas.

2.  Instalação e configuração do ambiente (1h30 min):
    

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
    

3.  Análise das tabelas e extração das informações pertinentes (8 horas):
    

-   Analisar a estrutura do banco de dados;
    
-   Identificar as tabelas, colunas e relações relevantes para o desafio;
    
-   Escrever consultas SQL para extrair as informações necessárias;
    
-   Verificar se as consultas SQL retornam os resultados esperados.
    

4.  Organização das informações na planilha modelo (5 horas):
    

-   Abrir a planilha modelo;
 
 -   Criar as abas necessárias para cada tabela do banco de dados;
    
-   Organizar as informações extraídas na planilha modelo;
    
-   Verificar se a organização das informações está de acordo com o formato da planilha modelo.
    

5.  Conversão da planilha para CSV (2 horas):
    

-   Salvar a planilha modelo como arquivo CSV;
		
	- Comecei por preparar o ambiente PHP, e converter as informaçẽos da planilha de forma direta. Para isso, foram utilizados os comandos:
				
		sudo apt install apache2 -y;
		sudo apt install php libapache2-mod-php
		sudo systemctl status apache2
		sudo apachectl configtest
		
	Para confirmação do ambiente virtual, acessar `http://<IP do seu servidor>`, que apresentará uma página padrão para o Apache.
    
-   Verificar se o arquivo CSV foi gerado corretamente.
    

6.  Desenvolvimento do script em PHP (10 horas):
    

-   Estabelecer a conexão com o banco de dados;
    
-   Escrever as consultas SQL para extrair as informações relevantes;
    
-   Organizar as informações na planilha modelo;
    
-   Converter a planilha modelo em arquivo CSV;
    
-   Enviar o arquivo CSV para a API por meio de código PHP;
    
-   Testar o script em diferentes cenários e verificar se está funcionando corretamente.
    

7.  Testes e documentação (3 horas):
    

-   Testar o script em diferentes cenários para verificar se está funcionando corretamente;
    
-   Documentar o código e as funcionalidades implementadas;
    
-   Escrever um guia de instalação e utilização do script;
    
-   Preparar uma apresentação sobre o desenvolvimento do script e os resultados obtidos.
