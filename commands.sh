sudo mkdir -m 755 -p /run/postgres && sudo chown postgres.postgres /run/postgres
sudo su postgres -c "cd && pg_ctl -D /var/lib/postgres/data -l /var/lib/postgres/db.log start"
sudo su postgres -c psql