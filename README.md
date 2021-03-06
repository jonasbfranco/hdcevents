<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



* * *


Quando ocorrer o erro, é porque 
SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes (SQL: alter table `users` add unique `users_email_unique`(`email`))



Laravel usa o conjunto de caracteres utf8mb4 por padrão, que inclui suporte para armazenar "emojis" 
no banco de dados. Se você estiver executando uma versão do MySQL mais antiga do que a versão 5.7.7 
ou MariaDB anterior à versão 10.2.2, talvez seja necessário configurar manualmente o comprimento da 
string padrão gerado pelas migrações para que o MySQL crie índices para elas. Você pode configurar 
isso chamando o método Schema::defaultStringLength no AppServiceProvider:

Para resolver isso siga os passos abaixo:

Edite o arquivo app\Providers\AppServiceProvider.php

Adicione o namespace use Illuminate\Support\Facades\Schema;

Dentro do método boot adicione Schema::defaultStringLength(191);

Resultado final do arquivo:

```bash
use Illuminate\Support\Facades\Schema;

public function boot()
{
    Schema::defaultStringLength(191);
}
```


* * *

### Quando baixar os arquivos
```bash
- $ composer install
- $ php -r "copy('.env.example', '.env');"
	ou
- $ @php -r "file_exists('.env') || copy('.env.example', '.env');"
- $ php artisan key:generate
    (configurar o arquivo .env, linha = DB_DATABASE=nome do banco de daos)
- $ php artisan migrate
```


# Comandos usados nestas Aulas

- Criar Banco de dados
- Setar banco de dados no arquivo .env

### Iniciar as Migrations (criar as tabelas)
```bash
$ php artisan migrate
```

### Criar novas Migrations
```bash
$ php artisan make:migration create_products_table
```

### Verificar como estao as migrations
```bash
$ php artisan migrate:status
```

### Atualizar tabelas existente
```bash
$ php artisan migrate:fresh
```

### Criar um Scheca Table para a tabela Products
```bash
$ php artisan make:migration add_category_to_products_table
```

### Exibir o status
```bash
$ php artisan migrate:status
```

### Criar este Schema (coluna na tabela)
```bash
$ php artisan migrate
```

### Voltar ao status antes de inserir a coluna na tabela)
```bash
$ php artisan migrate:rollback
```

### Zerar todas as migrate
```bash
$ php artisan migrate:reset
$ php artisan migrate:status
```

### Fazer rollback e fazer migrate
```bash
$ php artisan migrate:refresh
```

### Apagar as tabelas e fazer migrate
```bash
$ php artisan migrate:fresh
```

### Criar a migration Event
```bash
$ php artisan make:migration create_events_table
$ php artisan migrate:status
$ php artisan migrate
```

### Criar o Model Event
```bash
$ php artisan make:model Event
```

### Adicionar campo image na tabela existente(events)
```bash
$ php artisan make:migration add_image_to_events_table
```

### Adicionar estas linhas na migration criada
- function up()
- table->string('image');

<br>
<br>

- function down()
- table->dropColumn('image');

### Criar o campo
```bash
$ php artisan migrate
```

### Adicionar campo itens na tabela existente(events) para receber json
```bash
$ php artisan make:migration add_itens_to_events_table
```

### Adicionar campo date na tabela existente(events)
```bash
$ php artisan make:migration add_date_to_events_table
```

### Instalar autenticacao Jetstream && Livewire
```bash
$ composer require laravel/jetstream
$ php artisan jetstream:install livewire
$ npm install && npm run dev
```

### Adicionar campo user_id na tabela existente(events)
```bash
$ php artisan make:migration add_user_id_to_events_table
```

### Criar tabela event_user
```bash
$ php artisan make:migration create_event_user_table
```