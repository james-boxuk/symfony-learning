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
and use the place holder `?` or `:name` syntax in combination with 
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

