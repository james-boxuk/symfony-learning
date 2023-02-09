# Twig Templating Language

<p>
    The twig templating language allows you to write concise, readable templates that
    are more friendly to web designers and in several ways more powerful than PHP templates.
</p>

 # Markup With Twig Example

```
   <!DOCTYPE html>
    <html>
        <head>
            <title>Welcome to Syfmony!</title>
        </head>
        <body>
            <h1>{{ page_title }}</h1>
            
            {% if user.isLoggedIn %}
                Hello {{ user.name }}!
            {% endif %}
            
            {# #}
        </body>
   </html> 
```

<h3>Twig Syntax</h3>
`{{ ... }}` is used to display the content of a variable or the result of evaluating and epxression

`{% ... %}` is used to run logic, with conditionals or a loop.

`{# ... #}` is used to add a comment, these are the equivalent of a PHP comment.

<h6 style="color: red;">Note</h6>
 You cannot run PHP syntax within a twig file. Twig provides utilities to run some logic on templates.
 For example `{{ title|upper }}` this will uppercase the title string.

# Template Variables

A common need for templates is to print the values stored in the templates passed from the controller or service.
Variables usually store array or objects instead of strings, numbers and boolean values.
That is why Twig provides quick access to complex PHP variables.
   
#Example

```
<p>{{ user.name }} added this comment on {{ comment.publishedAt|date }}</p>
```
            
The `user.name` notation means that I want to print out the `name` string of the `user` object, it does not matter if 
the `user` is an array or object in Twig.

