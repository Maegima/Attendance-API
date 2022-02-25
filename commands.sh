sudo mkdir -m 755 -p /run/postgresql && sudo chown postgres.postgres /run/postgresql
sudo su postgres -c "cd && pg_ctl -D /var/lib/postgres/data -l /var/lib/postgres/db.log start"
sudo su postgres -c psql

php artisan serve
php artisan migrate
php artisan migrate:reset

curl -X POST -H 'Content-type: application/json' \
localhost:8000/api/login -d \
'{"username": "Andre", "password": "12345"}'



curl -X GET -H 'Content-type: application/json' \
-H 'Authorization: Bearer QlcNxVnB4JsoOpI7lsmg7pJgjVPU9juJ2odbsnzYCKbTvIPFkHW5I1ZoPgevDfWdZ8Y4LKcQzXp74YGh0HCzvA5gOVhCPDR7sDUu' \
localhost:8000/api/permissions

