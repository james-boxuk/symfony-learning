# Understanding Symfony Routing

In Symfony, there are a couple of ways to define routes. Routes can be done through attributes or even in the routes.yaml file.

# With Attributes

Attributes is a way of adding configuration above your controller method, defining a route using PHP 8 attributes;

To have the ability to use attributes in our controllers, we will require to import the `Symfony\Component\Routing\Annotation\Route`

```
#[Route('/blog', name='blog_list')]
public function indexAction()
{
    //some controller to render some view
}
```
That is the gist of attributes to add our routes, but to then get them to work, we must configure them within our application
by jumping into the `config/routes/attributes.yaml`. 

In the following yaml file, we will need to define the following:

```
controllers:
    resources:
        path: ../../src/Controller/
        namespace: App\Controller
    type: attribute

kernel:
    resource: App\Kernel
    type: attribute
```

This configuration tells Symfony to look for attributes defined in the namespace of `App\Controllers` which is stored in
`src/Controller/` directory. The kernel can also act as a controller, which is useful for small applications such as a
microframework.


# With a yaml file

The yaml file is the preferred convention as it provides a convenient way of showing all the routes, and you can use different
yaml files to split them up.

Routing within a yaml file can be found within `config/routes.yaml` and an example of defining a route below:

```
blog_list:
    path: /blog
    controller: App\Controller\BlogController::list
```

We can define parameters in our routes by simply doing the following

```
blog_list:
    path: /blog/{blodId}
    controller: App\Controller\BlogController::list
```

Whenever we define the `blog_list` when using the twig function `path()` we will be required to supply a blogId for the
function to build the url.

In the controller, we can then simply get the parameter by simply calling the `$request->get('blodId')`. The parameter, we
define in the route, we can then call upon that name in the `get()` method of the request object.
