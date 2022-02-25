sudo mkdir -m 755 -p /run/postgresql && sudo chown postgres.postgres /run/postgresql
sudo su postgres -c "cd && pg_ctl -D /var/lib/postgres/data -l /var/lib/postgres/db.log start"
sudo su postgres -c psql

php artisan serve
php artisan migrate
php artisan migrate:reset

curl -X POST -H 'Content-type: application/json' \
localhost:8000/api/login -d \
'{"username": "Admin", "password": "password"}'

token="ikXWv18W2VTzt1TgK9K5PqwgP81lgBMqSkLYaZKesiNP50Q9mLSbQAxmWZwXrHFoudObGxeAlScDV7jFZCfWeDg9N6vZrozmFQsg"
curl -X GET -H 'Content-type: application/json' \
-H "Authorization: Bearer $token" \
localhost:8000/api/permissions

curl -X GET -H 'Content-type: application/json' \
-H "Authorization: Bearer $token" \
"localhost:8000/api/attendances?begin=2022-01-25&end=2022-01-28"

curl -X POST -H 'Content-type: application/json' \
-H "Authorization: Bearer $token" \
"localhost:8000/api/attendances/checkin" -d \
'{"cpf": "12345678902", "updated_at": "2022-02-25T16:00:00"}'

curl -X POST -H 'Content-type: application/json' \
-H "Authorization: Bearer $token" \
"localhost:8000/api/attendances" -d \
'{"cpf": "12345678902", "created_at": "2022-02-25T16:00:00"}'

