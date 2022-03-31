## Projeto feito com docker através do Sail
### Para iniciar, na pasta do projeto execute o comando abaixo para criar o alias do sail (opcional):
`alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail’`

> Caso você não queira criar o alias, nos próximos comandos invés de sail execute ./vendor/bin/sail
> Por exemplo:
`./vendor/bin/sail up ou ./vendor/bin/sail up -d`

### Depois de criar o alias, execute:
`sail up ou sail up -d`
> sail up - debuga o container <br>
> sail up -d - sobe sem debugar <br>
> Normalmente utilizo o sail up para debugar e depois paro o container utilizando ctrl + c e aí sim utilizo o sail up -d para deixar o container em pé sem travar o terminal.

### Execute o comando abaixo para instalar as dependencias
`docker run --rm \ ` <br>
    `-u "$(id -u):$(id -g)" \` <br>
    `-v $(pwd):/var/www/html \` <br>
    `-w /var/www/html \` <br>
    `laravelsail/php81-composer:latest \` <br>
    `composer install --ignore-platform-reqs` <br>

### Para acessar a aplicação é só acessar:
`http://localhost/`

### No banco de dados a conexão é feita por padrão através do localhost na porta 3306 com usuário sail e senha password, de acordo com a configuração abaixo:

>Name: crud_app <br>
>Host: localhost   |   Port: 3306 <br>
>Authentication: User & Password <br>
>User: sail <br>
>Password: password <br>
>Database: crud_app <br>

### Para acessar o terminal do container
`sail bash`

### Para executar as migrations
`php artisan migrate`