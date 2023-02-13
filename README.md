# Configurações iniciais

## Criar o projeto:
```
composer create-project laravel/laravel proj-ccih
```

## Instalar as dependências do Laravel:
```
composer install
```

## Instalar o bootstrap:
```
composer require laravel/ui
php artisan ui bootstrap
npm install
npm run dev
npm run production
```

## Conceder permissão ao diretório:
```
chmod -R 777 /var/www/html/nome-do-projeto
```

## Copiar o arquivo .env.example e inserir a credencial do DB:
```
cp .env.example .env
```

## Gerar a chave da aplicação:
```
php artisan key:generate
```

## Gerar as tabelas no banco de dados (acrescentar :refresh ao final da linha de comando se necessário para recriar as tabelas):
```
php artisan migrate
```

## Rodar a aplicação:
```
php artisan serve
```

<hr>

# Login

## Criação de controle para o login:
```
php artisan make:controller UsuarioController --resource
```

