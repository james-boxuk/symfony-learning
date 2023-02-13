# Symfony Console Commands

In Laravel we have the `artisan` command in symfony we have `symfony` alias which we can run
in the console (terminal). Will need to look into why the alias `symfony` is not being noticed.

# Example

`php bin/console <command>`

For example:

`php bin/console list`

This will show us a list of all available commands within symfony, new ones we've created will require to be registered,
to show in this list.

# Common Useful Commands

1. Clear Cache: `php bin/console cache:clear`

2. New Controller (`composer require symfony/maker-bundle`): 
`php bin/console make:controller <controller-name>`



