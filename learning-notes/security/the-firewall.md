# The Firewall

the `firewalls` section of `config/packages/security.yaml` is the most important
section.

A "firewall" is your authentication system: the firewall defines which parts of your applications 
are secured and how your users will be able to authenticate (e.g. login form, API token).

```
# config/packages/security.yaml
security:
    # ...
    firewalls:
        dev:
            pattern: ^/(_(profiler|wdt)|css|images|js)/
            security: false
        main:
            lazy: true
            # provider that you set earlier inside providers
            provider: app_user_provider

            # activate different ways to authenticate
            # https://symfony.com/doc/current/security.html#firewalls-authentication

            # https://symfony.com/doc/current/security/impersonating_user.html
            # switch_user: true
```

Only one firewall is active on each request. Symfony uses the `pattern` key to find the
first match (you can also <a href="https://symfony.com/doc/current/security/firewall_restriction.html">match by host or other things</a>).

The `dev` firewall is a fake firewall, it makes sure that you don't accidently block
symfony dev tools which they live under Urls like `/_profiler` and `/_wdt`.

Often, the user is unknown (not logged in) when they first visit the website. If
you visit your homepage right, you will have access and you'll see that your 
visiting a page behind the firewall in the toolbar.

![img.png](img.png)

Visiting a URL under a firewall does not require you to be authenticated, for example
a login form, as it has to be accessible to the public.

We can look to restrict access to URL's, controllers or anything else within your
firewall in the <a href="https://symfony.com/doc/current/security.html#security-access-control">access control</a> section.

The `lazy` key in the security.yaml file is used to prevent the session from being
started if there is no need for authorisation. This is important to keep requests cacheable.

# Fetching the Firewall Configuration for a Request

# Authenticating Users

During authentication, the system tried to find a matching user for the visitor of the webpage.
Traditionally, this was done using a login form or a http basic dialog in the browser.
However, the SecurityBundle comes with many other authenticators:

- <a href="https://symfony.com/doc/current/security.html#form-login">Form Login</a>
- <a href="https://symfony.com/doc/current/security.html#json-login">JSON Login</a>
- <a href="https://symfony.com/doc/current/security.html#http-basic">HTTP Basic</a>
- <a href="https://symfony.com/doc/current/security.html#login-link">Login Link</a>
- <a href="https://symfony.com/doc/current/security.html#x-509-client-certificates">X.509 Client Certificates</a>
- <a href="https://symfony.com/doc/current/security.html#remote-users">Remote Users</a>
- <a href="https://symfony.com/doc/current/security/custom_authenticator.html">Custom Authentication</a>

