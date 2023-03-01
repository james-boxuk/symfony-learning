# Doctrine Query Builder

<a href="https://www.doctrine-project.org/projects/doctrine-dbal/en/current/reference/query-builder.html">Further Information</a>

Doctrine features a powerful query builder for the SQL language. The QueryBuilder has
methods to add parts to an SQL statement.

When the state has been built, you can then execute it using the connection it was
generated from. (The API is roughly the same as the DQL Query Builder).

# Security - Safely Preventing SQL Injection
Its important to understand how the query builder works, as in SQL it allows expressions in almost
every clause and position, the Doctrine query builder can only prevent SQL injection
for calls to the methods `setFirstResult()` and `setMaxResults()`.

The other query builder methods cannot distinguish between user and developer input and therefore
subject to the possibility of SQL injection.

To work with the QueryBuilder you should never pass user input to any of the methods
and use the placeholder `?` or `:name` syntax in combination with 
`$queryBuilder->setParameter($placeholder, $value)` instead.


```
<?php

$queryBuilder
    ->select('id', 'name')
    ->from('users')
    ->where('email = ?')
    ->setParameter(0, $userInputEmail)
;
```

# Building a Query

The QueryBuilder supports building of `SELECT`, `INSERT`, `UPDATE` and `DELETE` queries.

# `select()` Method

To start with the select query, we start by invoking the `select()` method of the QueryBuilder:

```
$queryBuilder
->select('id','name')
->from('users');
```

to select `*` you would need to add an alias into the `select()` method after adding
a second parameter to of `alias`, the alias can then be used to select `*` from that table.

```
    $queryBuilder->select('u')->from('users', 'u');
```

# `update()`, `insert()` and `delete()` methods:

With the following methods we pass the `$tableName` into the methods

```
//update method
$queryBuilder->update('users');

//delete method
$queryBuilder->delete('users');

//insert method
$queryBuilder->insert('users');
```
