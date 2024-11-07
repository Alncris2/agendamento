# 🪮 Agendamento online 👩🏻‍🦰(Andamento)
Este é um sistema de agendamento online desenvolvido para facilitar o trabalho de agendamentos, permitindo que clientes agendem serviços de forma prática e intuitiva. O sistema foi desenvolvido em Laravel 11 e utiliza Blade para a interface do usuário, além de Docker para o ambiente de desenvolvimento.

## White Labels
**JuliaBraids**: white labels do sistema de agendamento online, com o objetivo de facilitar o agendamento de serviços de tranças e penteados. O sistema é personalizável e pode ser adaptado para diferentes tipos de negócios.

**AfroEstima**: white labels do sistema de agendamento online, com o objetivo de facilitar o agendamento de serviços de cortes e penteados. O sistema é personalizável e pode ser adaptado para diferentes tipos de negócios.

## 🔧 Tecnologias Utilizadas

- **Laravel:** Framework PHP na versão 10.x para a infraestrutura do e-commerce.
- **PHP:** Linguagem de programação na versão 8.2.
- **Blade:** Template engine para criar views.
- **Docker:** Para containerização e gerenciamento do ambiente de desenvolvimento.
- **Redis:** Para caching e gerenciamento de sessões.
- **MySQL:** Banco de dados relacional.
- **Webhook**: Para envio de lembretes e integração com WhatsApp.
- **Tenancy**: Para suporte a múltiplos locatários. (Andamento)


## Recusos

- **Agendamento online:**
  Seu cliente faz o agendamento pelo site sem que você precise fazer nada.

- **Agenda:**
  Gerencie sua agenda de forma fácil e rápida quando e onde estiver.

- **Lembretes automatizados:**
  Reduza o índice de faltas de última hora em até 70% com os lembretes por e-mail e SMS.

- **Cadastro de clientes:**
  Todas as informações dos seus clientes em um só local, fácil e seguro.

- **Relatórios analíticos:**
  Análise de desempenho financeiro e gerenciamento de agendamentos.

- **Controle financeiro:**
  Completo, fácil de usar e otimizado para facilitar o seu trabalho.

- **Gerenciamento de Serviços:**
  Cadastro de serviços e produtos relacionados.

### Pagamentos

- Opção de pagamento direto na plataforma ou na hora do agendamento.

### Promoções

- Sistema de promoções e criação de cupons.


## 🚀 Configuração do Ambiente

### Ambiente com Laravel Sail

1. **Clone o Repositório:**

    ```shell
    git clone https://github.com/alncris2/agendamento.git
    cd agendamento
    ```

3. **Inicie o Ambiente com Sail:**

    ```shell
    ./vendor/bin/sail up -d
    ```

4. **Acesse o Contêiner Principal:**

    ```shell
    ./vendor/bin/sail shell
    ```

5. **Instale as Dependências:**

   Dentro do contêiner:

    ```shell
    composer install && npm install --no-package-lock && npm run dev
    ```

6. **Configure o Laravel:**

   Dentro do contêiner:

    ```shell
    php artisan key:generate && php artisan migrate --seed
    ```

7. **Atualize as Rotas do Front-end:**

   Dentro do contêiner:

    ```shell
    php artisan ziggy:generate
    ```

8. **Permissões para o Script do Xdebug (Executar na Máquina HOST):**

    ```shell
    chmod +x docker/xdebug/xdebug.sh
    ```

### Ambiente sem Docker

1. **Clone o Repositório:**

    ```shell
    git clone https://github.com/alncris2/agendamento.git
    cd agendamento
    ```

2. **Instale as Dependências do Laravel:**

    ```shell
    composer install
    ```

3. **Instale as Dependências do Front-end e Inicie o Servidor:**

    ```shell
    npm install && npm run dev
    ```

4. **Copie e Configure o Arquivo de Ambiente:**

    ```shell
    cp .env.example .env
    ```

5. **Gere a Chave do Aplicativo:**

    ```shell
    php artisan key:generate
    ```

6. **Execute as Migrações e Inicie o Servidor:**

    ```shell
    php artisan migrate && php artisan serve
    ```

7. **Atualize as Rotas do Front-end:**

    ```shell
    php artisan ziggy:generate
    ```

## 🛠️ Contribuindo

Para contribuir com o projeto, siga estas diretrizes:

1. **Crie uma Branch para sua Feature ou Correção:**

    ```shell
    git checkout -b nome-da-sua-branch
    ```

2. **Faça Commit das suas Alterações:**

    ```shell
    git add .
    git commit -m "Descrição das mudanças"
    ```

3. **Envie sua Branch para o Repositório:**

    ```shell
    git push origin nome-da-sua-branch
    ```

4. **Abra um Pull Request**

## 📜 Padrões de Codificação

### Visual Code

- Use uma indentação de 4 espaços em vez de tabulação.

### Projeto

- Adote uma convenção de nomenclatura consistente para classes, variáveis e métodos.
- Evite copiar código de projetos anteriores.

### Rotas

- **Visualização (Português):** `localhost:8005/produto/cadastrar`
- **Requisição (Inglês):** `localhost:8005/ProductController/create`

### Convenções de Nomenclatura

- **Constantes:** LETRAS_MAISCULAS_SEPARADAS_POR_UNDERSCORE
- **Controladores:** PascalCase com sufixo 'Controller', ex. `UserController`
- **Tabelas:** snake_case e plural, ex. `users`, `products`
- **Colunas:** snake_case, ex. `id`, `title`

### Variáveis

- **CamelCase:** `$completedOrders`, `$pendingOrders`

### Models

- **PascalCase e Singular:** `User`, `Order`

### Métodos e Funções

- **camelCase:** `get()`, `getAll()`

### HTML e CSS

- **kebab-case:** IDs e classes, ex. `#user-id`, `.button-primary`

## 📝 Uso de CSS e JS via Controller

No arquivo `main.blade.php`:

```php
@if (isset($styles) && is_array($styles) && count($styles) > 0)
    @foreach ($styles as $style)
        <link href="{{ $style }}" rel="stylesheet" type="text/css" />
    @endforeach
@endif

@if (isset($scripts) && is_array($scripts) && count($scripts) > 0)
    @foreach ($scripts as $script)
        <script src="{{ $script }}"></script>
    @endforeach
@endif
```

No controlador:

```php
$data = [
    'styles' => ['/css/pages/UserPage.css'],
    'scripts' => ['/js/pages/UserPage.js'],
    'user' => $user,
];

return view('user', $data);
```

## 🌟 Contribuidores

<table>
<tr>
    <td align="center" style="word-wrap: break-word; width: 150.0; height: 150.0">
        <a href="https://github.com/Alncris2">
            <img src="https://avatars.githubusercontent.com/u/51797670?v=4" width="100;" style="border-radius:50%;" alt="Alan Cristian Silva"/>
            <br />
            <sub style="font-size:14px"><b>Alan Cristian Silva</b></sub>
        </a>
    </td>
    <!-- Adicione mais contribuintes aqui -->
</tr>
</table>
