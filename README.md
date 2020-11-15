# agenceVoyage
composer install
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load

installé le vhost vhostagencevoyage.conf
http://local.agencevoyage.com

execution phpunit:
php bin/phpunit
