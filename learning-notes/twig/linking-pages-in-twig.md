# Linking to Pages

Instead of writing the link URLs by hand, you can use the `path()` function in twig to generate a URL based on the
<a href="https://symfony.com/doc/current/routing.html#routing-creating-routes">routing configurations</a>.

`<a href="{{ path('blog_post') }}">{{ post.title }}</a>`


The `path()` function generates relative URLs. This will then generate a url that is local to the projects url.

The `url()` function takes the same arguments as `path()` but this will generate an absolute url, if we require
generating links in an email.


