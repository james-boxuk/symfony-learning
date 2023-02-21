# Creating Entity Classes

An entity class is where we can bind a database row to an object. 
So we can create an enity class that will do that for us.

`php bin/console make:entity`

This will then ask questions on the database table we want to bind the data against.
Each property in the entity class will have attribute notations above it, this helps doctrine to map the data.

```
#[ORM\Column(type: "string", nullable: true)]
private ?string $name = null;

```

Every php object that you wnt to save in the database is called an entity. 

We can mark an entity class through the Attribute syntax, this will tell Doctrine
that it is an entity.

```
 <?php
 
 use Doctrine\ORM\Mapping\Entity;
 
 
 #[Entity]
 class Message
 {
    //...
 }
```

With no additional information, Doctrine will expect the entity to be saved into the
table with the same name as the class. But if its not the same name as the class, we
can add an additional attribute:

```
<?php
 
 use Doctrine\ORM\Mapping\Entity;
 
 
 #[Entity]
 #[Table(name: "message")]
 class Message
 {
    //...
 }

```

# Property Mapping

This is where we can map properties to columns in a table.

To configure a property to a column, we can simply use the attribute of `Column`
above the property. If no `type` is specified then it will default to string.

```
<?php
 
 use Doctrine\ORM\Mapping\Entity;
 
 
 #[Entity]
 #[Table(name: "message")]
 class Message
 {
    #[Column]
    private ?string $name;
 }
```
