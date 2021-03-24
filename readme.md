# Avaliação para vaga de DEV VX CASE

## Stack de Tecnologia:  
Laravel  
Vue/Vuex  
Bulma  

## Instalação
 1. Clone este repositório  
 ` git clone https://github.com/eufelpsdev/avaliacao-vx-backend.git`  
 `cd sale-system`  
 2. Instale as dependencias  
 ` composer install`  
 3. Configure o ambiente  
 `cp .env.example .env`  
 `php artisan key:generate`  
    - Popule o banco de dados mysql, lembre-se que antes de rodar o comando você deve verificar a host e porta local do mysql e definir no arquivo de configuração. 
 `php artisan migrate --seed`
 4. Adicione o Webhook URL do Slack no arquivo de configuração  
 5. Rode o servidor  
 `php artisan serve`  

 ## Observação
 Ao rodar as migrations a dependendo das configurações da máquina e do docker pode ocorrer o erro "SQLSTATE[HY000] [2002] php_network_getaddresses: getaddrinfo failed: No such host is known.", nesse caso será necessário definir a host do banco de dados utilizando o ip local. Para verificar a porta associada do mysql ao IP local utilize o comando "docker ps".


## Respondendo a prova

- Para realizar a avaliação, siga os passos acima. 
- Após conseguir colocar o projeto para rodar, realize as tarefas disponibilizadas na aba (issues). 
- Não é obrigatrio responder todas as atividades, quanto mais atividades você responder, melhor será avaliado.
- Após ter respondido as issues, disponibilize o projeto no seu github contendo essas atualizações.
- Informe-nos quais issues você realizou.
