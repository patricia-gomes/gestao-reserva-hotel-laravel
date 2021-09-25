## Gestão de Reserva de Hotel em Laravel

Utilizei o [Laravel/UI](https://github.com/laravel/ui) para instalar o Bootstrap.<br/>
E implementei a biblioteca [FullCalendar](https://fullcalendar.io/) para exibir as reservas cadastradas no banco.<br/><br/>

<ul>
	<li>Exibe as reservas que vão entrar hoje</li>
	<li>Exibe os hospédes que estão de saída hoje</li>
	<li>Converte reserva em hospedagem</li>
	<li>Cadastro de reservas, hospédes e acomodações </li>
	<li>Edita reservas, hospédes e acomodações</li>
	<li>Deleta hospédes</li>
	<li>Cancela reservas</li>
</ul>

## Login

Email: `admin@admin.com`<br/>
Password: 1234<br/>

## Configurações

O código sql para criar o banco e as tabelas é o arquivo: <strong>sql_db.sql</strong><br/>

Para configurar o banco de dados altere o nome do arquivo <strong>.env.example</strong> para <strong>.env</strong> e na opção <strong>DB_DATABASE</strong> coloque o nome do seu banco de dados e etc.<br/>
Altere a url para utilizar no localhost, no arquivo <strong>config/app.php</strong><br/>
`'url' => env('APP_URL', 'http://localhost'),`<br/>
E no arquivo <strong>.ENV</strong> também altere APP_URL para `APP_URL=http://localhost`<br/>

## Rodar a aplicação

`php artisan key:generate` <br/>

`composer update` <br/>

`php artisan serve` <br/>