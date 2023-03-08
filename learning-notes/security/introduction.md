# Security

Symfony comes with some security by default like the <a href="https://symfony.com/doc/current/session.html">secure session cookies</a>
and <a href="https://symfony.com/doc/current/security/csrf.html">CSRF protection</a>.

However there is a symfony bundle that you will require to install via composer.
The SecurityBundle, this provides authentication and authorisation needed to secure the application.

# Installation

```
composer require symfony/security-bundle
```

If symfony flex is installed, then you will have a `security.yaml` already created.

That is it, in the next segments there will be discussion on the three main elements
of the `security.yaml` file. Please check out The User first.
