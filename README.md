# Exercícios — Complemento do projeto atual e PRD do zero (SRP em PHP) 

## Projetos Incluídos

1.  **`solid-srp` (Com pasta nomeada Exercicio_1)**: Um sistema simples de **listagem de usuários**. Foca em estabelecer a base da arquitetura em camadas para um caso de uso de leitura de dados.
2.  **`products-srp` (Com pasta nomeada Exercicio_2)**: Uma evolução do primeiro, implementando um sistema de **cadastro e listagem de produtos**. Aprofunda a aplicação do SRP ao isolar as responsabilidades de Validação, Orquestração e Persistência.

## Arquitetura Comum

Ambos os projetos seguem a mesma estrutura de quatro camadas lógicas:

| Camada | Diretório (Exemplo) | Responsabilidade Principal |
| :--- | :--- | :--- |
| **Apresentação** | `public/` | Recebe requisições HTTP e renderiza a resposta ao usuário (UI). |
| **Aplicação** | `src/Application/` | Orquestra os casos de uso e a lógica da aplicação (fluxos de negócio). |
| **Domínio** | `src/Domain/` ou `src/Contracts/` | Define as regras de negócio centrais, entidades e os contratos (interfaces). |
| **Infraestrutura**| `src/Infra/` | Implementa os detalhes técnicos e externos, como acesso a arquivos e bancos de dados. |

## Como Executar os Projetos

### Pré-requisitos
* Um ambiente de desenvolvimento local (XAMPP, WAMP, etc.).
* PHP 8.1 ou superior.
* Composer 2.x instalado globalmente.
* Git.

### Passos para Instalação

1.  **Clonar o repositório:**
    ```bash
    git clone <https://github.com/AnthonyPiovanFourteen/Projeto_3.git>
    cd Projeto_3-main
    ```

2.  **Navegar para o diretório do projeto desejado:**
    ```bash
    # Para a Atividade 1
    cd Exercicio_1

    # Ou para a Atividade 2
    cd Exercicio_2
    ```

3.  **Instalar dependências (gerar o autoloader):**
    Este comando é essencial para que o autoloading de classes PSR-4 funcione.
    ```bash
    composer install
    ```

4.  **Configurar o Servidor Web:**
    Configure o `DocumentRoot` do seu servidor web (Apache, Nginx) para apontar para o diretório `public/` dentro da pasta do projeto escolhido.
    * Exemplo de URL de acesso para o index.php da Atividade 1: `http://localhost/Projeto_3-main/Exercicio_1/public/index.php`
    * Exemplo de URL de acesso para o index.php da Atividade 2: `http://localhost/Projeto_3-main/Exercicio_2/public/index.php`

5.  **Acessar a tela de listagem, após cadastro:**
    * Exemplo de URL de acesso para a Atividade 1: `http://localhost/Projeto_3-main/Exercicio_1/public/users.php`
    * Exemplo de URL de acesso para a Atividade 1: `http://localhost/Projeto_3-main/Exercicio_2/public/create.php`

## Conclusão

Estes projetos demonstram que a complexidade de uma funcionalidade não está apenas no seu código, mas na forma como ele se integra a uma arquitetura coesa. Ao seguir rigorosamente a separação de responsabilidades, o resultado é um sistema resiliente a mudanças, mais fácil de entender e de manter a longo prazo.
