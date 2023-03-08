# The User (providers)

Any secured section of your application needs some concept of a user. The user provider
loads users from any storage (e.g. te database) based on a "user identifier"
(e.g. the user's emails address);

------------------

Permissions in Symfony are always linked to a user object. If you need to secure (parts of)
your application, you need to create a user class. This is a class that
implements <a href="https://github.com/symfony/symfony/blob/6.2/src/Symfony/Component/Security/Core/User/UserInterface.php">UserInterface</a>
This is often a doctrine entity, but you can also use a dedicated Security user class.

The easiest way to generate a user class is using the `make:user` command from the
MakerBundle.

This command will then create a `User` entity class.

To make a migration, run `php bin/console make:migration`
then run `php bin/console doctrine:migrations:migrate` to run create the Users table.

#Loading the user: The User Provider

When the command of `make:user` is run the command also adds config for a user provider in your
security configuration.

```
 providers:
        app_user_provider:
            entity:
                class: App\Entity\User
                property: email
```

This user provider knows how to (re)load users from a storage (e.g. database) based
on a "user identifier" a users email or username. The configuration above uses
Doctrine to load the `User` entity using the `email` property as "user identifier".

User providers are used in a couple of places during the security lifecycle:

1. Load the User based on an identifier.
During login (or any other authenticator), the provider loads the user based on
the user identifier. Some other features, like <a href="https://symfony.com/doc/current/security/impersonating_user.html">user impersonation</a>
and <a href="https://symfony.com/doc/current/security/remember_me.html">Remember Me</a> also use this.

2. Reload the User from the session
At the beginning of each request, the user is loaded from the session (unless your firewall is stateless).
The provider "refreshes" the user (e.g. the data is queried again for fresh data) to make sure all
user information is upto date (and if necessary, the user is de-authenticated/logged out if something changed)
See <a href="https://symfony.com/doc/current/security.html#user_session_refresh">Security</a> for more information about this process.


