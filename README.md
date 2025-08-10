# karnaval

## Database setup

Run `php db/init_db.php` to create the SQLite database at `db/database.sqlite` with the tables and sample data defined in `db/schema.sql`.

To use MySQL instead, set the environment variables `DB_TYPE=mysql`, `DB_HOST`, `DB_NAME`, `DB_USER`, and `DB_PASS` before running the script.
