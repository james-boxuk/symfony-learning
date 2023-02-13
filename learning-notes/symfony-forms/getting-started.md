# Symfony Forms

Symfony forms allow you to create forms server side and output the form in
a twig template.

As forms do not come pre-installed with Symfony, we will require composer to require
the package and install it.

> `composer require symfony/form`

This command will install the form package, to create a form we then have further symfony make commands to hand.

> `php bin/console make:form <name-of-form>`

This will create a form for us, this also allows us to bind the form to an entity (Database Table)
which would be an interactive question to type in the table if we need to bind it to one. However, we do get
the option to leave blank, and by pressing enter will continue to create the form.
