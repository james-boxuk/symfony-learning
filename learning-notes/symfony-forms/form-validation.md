# Form Validation

Symfony forms are created using a Symfony Forms which extend the `AbstractType`, they are
mapped to an `Entity` class which on times will mirror a database table.

The goal with validation is to tell you the data the object holds is valid. For this to
work we need to configure a list of rules
(called <a href="https://symfony.com/doc/current/validation.html#validation-constraints">contraints</a>)

Validation can be configured in many ways with annotations or with PHP inside of the
controller.

Before we can use the validation, need to make sure that we have to make sure that we install a Symfony package
`composer require symfony/validator`. We have the ability to then add validation to our `Entity` classes.

As mentioned above, Symfony validation, allows you to add validation a couple of ways, through
annotations, XML, YAML or PHP.

As it down to personal / team preference on configuring validation in Symfony, I have chosen
annotations.

To start using annotations, we will have to update the `validator.yaml` file. Under the key
of `framework` there will be a `validation` key, under this key we need to add another key
of `enable_annotations` and set its value to true.

```
framework:
    validator:
        enable_annotations: true
```

Configuration reference please see <a href="https://symfony.com/doc/current/reference/configuration/framework.html#reference-validation">Validation configuration reference</a>

# Annotations

As we've now enabled annotations in our config file, we can then start to use the markup in
our `Entity` classes.

You will require importing `use Symfony\Component\Validator\Constraints as Assert;` into the `Entity` class.
We have the ability to access the `Assert` methods within the validator class.

Annotations are used above the `Entity` properties:

```
<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    #[Assert\NotBlank]
     private string name;
} 
```

When we bind the `Entity` class to a `Form` type the validation is conducted against the
information we have above our properties with the reflection class.

This will then run our validation against the form data.

# Callbacks

We can however decide to run a method within our `Entity` class where we run a callback to
perform the checks, this is where we can apply custom validation.

To configure, just apply the `Assert\Callback` above a `validate()` method:

```
#[Assert\Callback]
public function validate(ExecutionContextInterface $context, $payload)
{
    if ($this->title === 'other' && is_null($this->otherTitle)) {
        $context->buildViolation('Need to specify a title, if other is selected')
            ->addViolation();
    }
}
```

We can assign the validation errors to a specific fields in the object, where this would
display the error next to the field. This is done through applying the `atPath()` method,
all you require doing is pass the name of the property as a string.

We can also add the following to the top of the `Entity` class which will then run the validator:

This will invoke the validator,

```
// src/Entity/Author.php
namespace App\Entity;

use Acme\Validator;
use Symfony\Component\Validator\Constraints as Assert;

#[Assert\Callback([Validator::class, 'validate'])]
class Author
{
}

```




