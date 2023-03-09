# Form Login

Most websites have a login form where users authenticate using an identifier
(e.g. email address or username) and a password.

This functionality is provided by the form login authenticator.


First, create a controller for the login form:

```
php bin/console make:controller Login
```

When the controller is created, it will also create a twig file.

In the `security.yaml` file we can then add the following under `firewalls:`


```
   firewalls:
        main:
            # ...
            form_login:
                # "app_login" is the name of the route created previously
                login_path: app_login
                check_path: app_login
```

The `login_path` and `check_path` support URLs and route names, but cannot have
mandatory wildcards for example `/login/{foo}`

The controller's sole purpose is to display the login form, the `form_login` authenticator
will handle the form submission automatically. If there are invalid password or
username the authenticator will store the error and redirect back to this controller.
This is where we can read the error message using `AuthenticationUtils` so it can be displayed
back to the user.
