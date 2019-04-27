to get this working:

create a Homestead box and insert the attached files (vagrant + homestead recommended, also make sure to use php 7.2, since 7.3 is a little buggy at the moment on vagrant with laravel)

once you are in, SSH into the box and go to the project home directory and type in:

composer install
(no need for npm install since this demo isnt using any node modules)
php artisan migrate

once that is done you can simply use POSTMAN to api into each of the calls (located in /routes/api.php). they also exist for non api use in /routes/web.php

the migration is created in /database/migrations named 2019_04_02_165059_suppression_lists.php

the model is in /app named suppressionList.php

the controller is in /app/Http/Controllers named SuppressionListController.php

also when you update your Homestead.yaml file, make sure the database is the default
(database: homestead, username: homestead, password:secret)

also remember, with laravel to use the api make sure to add /api to your calls (such as yoururl/api/getAll)

for creating new/test suppressed numbers, just post with these params:
phone (go ahead and add as many symbols etc as you like to test the functionality)
type (sms, voice mail, or both.  will default to both if left blank)

if you have any questions please let me know!