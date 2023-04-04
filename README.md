# Portal de Carros

Este é um projeto de um portal de carros, onde usuários podem anunciar seus carros.

## Funcionalidades

O portal de carros possui as seguintes funcionalidades:

- Pesquisa por carros por modelo, marca, ano e preço.
- Lista de resultados com informações básicas sobre cada carro, como modelo, marca e ano.
- Página de detalhes para cada carro, com informações detalhadas sobre o veículo, incluindo fotos, especificações
  técnicas
- Página de perfil do usuário.

## Tecnologias utilizadas

O portal de carros foi desenvolvido utilizando as seguintes tecnologias:

- HTML, CSS e JavaScript para o front-end.
- PHP com o framework Laravel para o back-end.
- Banco de dados MySQL para armazenar informações sobre carros, usuários, comentários e avaliações.

## Instalação e uso

Para utilizar o portal de carros, siga as instruções abaixo:

- Clone o repositório para sua máquina local: git clone https://github.com/marcelomelojr/flowih_teste_pratico.git
- Instale as dependências do projeto: composer install
- Configure o arquivo .env com as informações do seu banco de dados.
- Crie as tabelas no banco de dados: php artisan migrate
- Inicie o servidor: php artisan serve
- Abra o navegador e acesse o endereço http://localhost:8000

### Utilizando Docker
- Para rodar o projeto utilizando o docker, rode o comando abaixo:
    - ./vendor/bin/sail up
    
### Vite
Execute o comando npm run dev, para iniciar o vite e gerar o css e js das páginas.

## Seeders

- Para popular o banco de dados com dados de teste, execute o comando: php artisan db:seed
- Após a execução do comando, o banco de dados será populado com 1 usuário administrador, 10 usuarios comuns e 25
  carros.

## Usuário administrador

- O usuário administrador possui as seguintes credenciais:
    - E-mail: admin@admin.com
    - Senha: password

## Testes automatizados

Para rodar os testes, siga as intruções abaixo:

- php artisan test
