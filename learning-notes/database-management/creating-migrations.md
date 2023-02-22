# Creating Migrations

In the console we can simply generate a migration by use the `make:migration` command
this generates a migration such as:

```
 migrations/Version20211116204726.php
```

In that file, it will contain the sql needed to update the database.

To run the migration we can use

```
php bin/console doctrine:migrations:migrate
```
# Auto Generated SQL
When the migrations are created, if an `Entity` class is created and Doctrine will auto generate
the SQL based on the annotations above the properties and class name.

But we can also change the SQL to suit our needs.

#Adding more fields

If we need to add new columns to a table, we can simply do this through another 
`make:migration`. Then if we need to add the properties to our `Entity` classes we 
can simply do `make:entity` again, this will add the properties for us.

Then to run the update `php bin/console doctrine:migrations:migrate`.

Doctrine will only run the migration if the file is a new migration, the `DoctrineMigrationsBundle` knows that the first
migrations was already executed earlier, behind the scenes it manages a `migration_versions`
table to track things.
