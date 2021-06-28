NOTE D'INTENTION
================

1.Create le project :
---------------------
composer create-project symfony/website-skeleton my_project_name 

----------------------------------------------------------------------

2.Add le webserver : 
---------------------
composer require symfony/web-server-bundle --dev ^4.4.2

----------------------------------------------------------------------

3.Run le webserver : 
---------------------
php bin/console server:start

----------------------------------------------------------------------

4.Add bdd dans le fichier.env :
-------------------------------
DATABASE_URL="mysql://user:mdp@127.0.0.1:3306/BDD?serverVersion=mariadb-10.3.25"

------------------------------------------------------------------------------------

5.Doctrine introspecte la base de données et généres les Entity avec les métadonnées:
------------------------------------------------------------------------------------
php bin/console doctrine:mapping:import "App\Entity" annotation --path=src/Entity

----------------------------------------------------------------------
****6.Create espace Admin , avec le bundle esayAdmin:*****
------------------------------------------------------------------------------------
composer require admin

composer require easycorp/easyadmin-bundle

php bin/console make:admin:dashboard

-------------------------------------------------------------------------------------
7.Sécuriser:
------------
composer require security annotations doctrine 

composer require symfony/security-bundle

-------------------------------------------------------------------------------------
8.Profiler :
-------------
composer require --dev web-profiler

composer require --dev symfony/profiler-pack

-------------------------------------------------------------------------------------
9.Require maker :
-----------------
composer require maker

-------------------------------------------------------------------------------------
10.Create User :
----------------
symfony console make:user

symfony console make:auth

-------------------------------------------------------------------------------------
11.Create Form :
----------------
composer require validator

composer require symfony/form
 
composer require symfonycasts/verify-email-bundle symfony/mailer

-------------------------------------------------------------------------------------
12.Reset Password :
-------------------
 composer require symfonycasts/reset-password-bundle

 symfony console make:reset-password

-------------------------------------------------------------------------------------
13.Créer une pagination:
------------------------
composer require knplabs/knp-paginator-bundle

-------------------------------------------------------------------------------------
14.La gestion d'envois d'email:
-------------------------------
composer require symfony/mailer

-------------------------------------------------------------------------------------
15.Upload Image avec VichYploaderBundle:
----------------------------------------
composer require vich/uploader-bundle

-------------------------------------------------------------------------------------
16.Créer et Use symfony form:
-----------------------------
composer require symfony/form

------------------------------------------------------------------------------------

