# karnaval

## Database setup

Run `php db/init_db.php` to create the tables and sample data defined in `db/schema.sql`.

By default the script connects to the MySQL database `gornichf_karnaval` using the user `gornichf_carnaval_user` and password `Vjybnjh1991` on `localhost`.

Connection settings can be overridden by setting the environment variables `DB_TYPE`, `DB_HOST`, `DB_NAME`, `DB_USER`, and `DB_PASS`. Setting `DB_TYPE` to `sqlite` will instead create a local database at `db/database.sqlite`.
