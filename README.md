# supervisorio-biomedico
Repositório do Projeto Final da disciplina de Desenvolvimento Web 2016.1 - IFPB

# Alunos:

Rafael Guerra de Pontes

Rychard Guedes

# Descrição do Projeto:

O projeto propõe o desenvolvimento de uma interface web para ser usada por Médicos e Pacientes de alguma clínica ou hospital. A plataforma foi nomeada de "Heart Bit" e pretende oferecer diferentes funcionalidades para cada tipo de usuário. Um médico pode acompanhar os dados de seus pacientes. Os pacientes só podem visualizar os dados pertinentes a ele mesmo. Uma das principais "features" da plataforma é o acompanhamento de leituras de circuitos biomédicos na forma de gráficos gerados a partir de dados armazenados em bancos de dados. Em versões futuras, pode-se integrar a leitura de dados em tempo real a partir de algum circuito conectado a um paciente.

Há uma tela de login que oferece a opção de cadastro de novos usuários.

Na tela de cadastro, os dados exigidos são diferentes para cada tipo de usuário.

Após o cadastro e login, o usuário é remetido a uma página com as informações às quais ele tem acesso.

#Algumas telas

![Telas de login e cadastro](https://drive.google.com/open?id=0B-O63wXhLBMvQXRBTFlCOUZza3c)

# Requisitos mínimos

  > apt-get install apache2 php5 mysql-server mysql-client php5-mysql

# Tutorial básico de uso

  > Para utilizar o sistema desenvolvido é necessário executar os passos a seguir:

    1. Criar um diretório em /var/www/html/ chamado "aula"

    2. Dentro do diretório aula, clonar o repositório:
        # https://github.com/raf01/supervisorio-biomedico.git

    3. Configurar o mysql server e criar as tabelas com o script existente em ../supervisorio-biomedico/sql/criacao-banco-alternativo.sql

    4. Abrir o navegador em http://localhost/aula/supervisorio-biomedico/login.html

    5. Fazer o login ou cadastro

    6. Acessar a página à qual você tem direito.
