## Instalação

Para instalar o projeto em seu ambiente local, siga os passos abaixo:

- Instale as dependências
<div style="margin-bottom: 12px">
    <div style="padding:4px; margin-left: 24px">
        <code>composer install</code>
    </div>
</div>

- Crie um arquivo .env a partir do arquivo .env.example
<div style="margin-bottom: 12px">
    <div style="padding:4px; margin-left: 24px">
        <code><span class="hljs-built_in">cp</span> .env.example .<span class="hljs-built_in">env</span></code>
    </div>
</div>

- Configure as variáveis de ambiente no arquivo .env conforme o ambiente local.

- Gere uma chave de aplicação:
<div style="margin-bottom: 12px">
    <div style="padding:4px; margin-left: 24px">
        <code>php artisan <span class="hljs-built_in">key</span>:generate</code>
    </div>
</div>

- Execute as migrations do Banco de dados:
<div style="margin-bottom: 12px">
    <div style="padding:4px; margin-left: 24px">
        <code>php artisan migrate</code>
    </div>
</div>





