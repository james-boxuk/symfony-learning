# Configuring the Database

The database connection information is stored as an environment
variable called `DATABASE_URL`.

For development, you can find the and customise ths within the `.env` file.

>
> Example
> `DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"`

Within Symfony once doctrine is installed, a doctrine.yaml file will then be created, we can list the database parameters under the `doctrine` key:

```
doctrine:
    dbal:
       dbname: <database_name>
       charset: utf8
       port: 3306
       user: root
       host: <docker_container_name>
       unix_socket: /var/lib/mysql/mysql.sock
       server_version: '8.0'
       password: root
       driver: pdo_mysql
```

We can also configure the database with credentials in the `.env` file.


