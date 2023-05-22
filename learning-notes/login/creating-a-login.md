# Creating a Login

Symfony has a built-in authenticator for authenticing users which is the `AuthenticationUtils` class.
This class is a part of the Security bundle, which you an get from the following:
`composer require symfony/symfony-bundle`

A controller can then be created through `php bin/console make:controller <controller_name>`
this will then make the controller and a twig template file.

In the LoginController, there is a couple of things that will need to be done, the first thing
is to as a parameter of `$authenticationUtils` and type hint it to `AuthenticationUtils` this is
where Symfony will do all the authentication work.

```
public function indexAction(AuthenticationUtils $authenticationUtil)
{
    //get the login error if there is one
    $error = $authenticationUtil->getLastAuthenticationError();
    
    //get the last username of the user
    $lastUsername = $authenticationUtil->getLastUserName();
    
    retun $this->render(
        'login/index.html.twig', [
            'last_username' => $lastUserName,
            'error' => $error,
        ]
    );
}
```

The only job of this controller is to render the login template. The authenticator will
handle the form submission automatically, if the user does enter an invalid password or username,
the authenticator will redirect the request back to the controller.

# CSRF Protection in Login Forms

Other security measures can be done by protecting our login form from Cross-site 
Request Forgery. This can be done with within the `security.yaml` file.

Under the firewalls key, we need to look for `secured_area` and then enter they key of
`form_login`, after that has been entered, simply create another key under it called `enable_csrf` 
and set its value to `true`.

```
firewalls:
    secured_area:
        form_login:
            enable_csrf: true
```

Within the login template, we require to output it to the form with a hidden field:
```
<input type="hidden" name="_csrf_token" value="{{ csrf_token('authenticate') }}" />
```
