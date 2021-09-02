Clone the repository

    git clone  https://github.com/dionis1/deliveries.git

Switch to the repo folder

    cd deliveries

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run Seed
    
    php artisan db:seed --class=RoutesTableSeeder

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


App:


 Deliveries:
 
    Index -> (GET) http://127.0.0.1:8000/api/deliveries
    
    Show  -> (GET) http://127.0.0.1:8000/api/deliveries/1
    
    Create -> (POST) http://127.0.0.1:8000/api/deliveries
          Input:
                title:test244
                date:2021-09-24
                route_id:4
                deliveries[0][id]:null
                deliveries[0][position]:2
                
    Update -> (POST) http://127.0.0.1:8000/api/deliveries/1
          Input:
                title:33333fgff
                date:21.09.2021
                _method:PUT
                deliveries[0][id]:1
                deliveries[0][position]:2
                route_id:4
                deliveries[1][id]:1
                deliveries[1][position]:1
                
    Delete -> (POST) http://127.0.0.1:8000/api/deliveries/1
          Input: 
                _method:DELETE
                
                
 Route: 
 
      Index -> (GET) http://127.0.0.1:8000/api/routes
      
      Show -> (GET) http://127.0.0.1:8000/api/routes/1
   
