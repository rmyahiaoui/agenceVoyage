# agenceVoyage
1-composer install
2-php bin/console doctrine:database:create
3-php bin/console doctrine:migrations:migrate
4-php bin/console doctrine:fixtures:load

5-installé le vhost vhostagencevoyage.conf
http://local.agencevoyage.com

6-execution phpunit:
php bin/phpunit
