# Racing: Horses & Betters 
### Laravel project

* Only logged in users can view the tables. 
* Add new horse, edit it and delete it. 
* Add new better, edit it and delete it. 

## How to start the project:
1. Open command line and go to the webroot where you will launch this repository.
2. Do git a clone code where you can launch php web app.
3. In command line run ``composer install``.
4. Run ``npm install``.
5. Generate an app encryption key ``php artisan key:generate``.
6. Create an empty database in your preffered database (eg. "Mysql workbench).
7. Copy the ``.env.example`` file in the directory and rename it to ``.env``. In the ``.env`` file fill in the ``DB_HOST``, ``DB_PORT``, ``DB_DATABASE``, ``DB_USERNAME``, ``and DB_PASSWORD`` options to match the credentials of the database you just created. 
8. Execute ``php artisan migrate``.
9. Run ``php artisan db:seed``.
10. Run ``php artisan serve``.
11. Open ``http://127.0.0.1:8000/`` in the browser to check out the project

## Author
[Vilija](https://github.com/vikontrimaite)