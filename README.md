# Teste Devmaker - Luis Phelipe   

## Hospedado em: https://devmaker.luisphelipe.me    

## Instrucoes para usar em localhost    
    
git clone https://github.com/luisphelipe/devmaker    
cd devmaker    
    
abrir mysql e criar database para ser usada    
copiar .env.example para .env (copy .env.example .env) e configurar valores referente a database    
   
### Executar os comandos      
   
1. php composer install
2. php artisan migrate:fresh   
3. php artisan db:seed   
4. php artisan passport:install   
5. php artisan key:generate   
6. php artisan serve   
    
    
## Instrucoes para usar Postman    
    
1. Importe o projeto no postman [Link do projeto Postman](../blob/master/devmaker-luis.postman_collection.json)
2. Apos cadastrar usando o POST SIGNUP, pegue o JWT pelo POST LOGIN.    
3. Entao insira-o na aba de autenticaçao no request que quiser fazer.    
    
    
## Consideracoes   
    
Eu comecei o projeto usando laravel e sessoes, mas depois de implementar o Passport alterei os controllers pra retornar json e os views para os consumir, menos na parte de autenticacao, que manti o scaffolding do Laravel. API de autenticação esta disponivel e foi demonstrada no Postman.
