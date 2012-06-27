SlyRelationBundle
====================

# Usage

## 1. Configuration bundle informations

You have to define all your relationships from your project `config.yml` file,
with an associated key. Here is an example with a `friendship` key relation:

```yaml
sly_relation:
    relations:
        friendship:
            entity1: Acme\DemoBundle\Entity\User
            entity2: Acme\DemoBundle\Entity\User
            bidirectional: true
```

Set `bidirectional` to `true` if there is no importance about the two entities
relation order. For example, if `A is in realtion B` equals `B is in relation with A`,
set it to `true`.

## 2. Use the relations manager from your controllers actions

Just use the relations manager as a service, with `$this->container->get('sly_relation')`.

Imagine we have 2 users, `$user1` and `$user2`. Let's define their hypothetic relation,
check if it exists, and create it if not:

```php
<?php

    $relation = $this->container->get('sly_relation');
    $relation->relationShip('friendship', $user1, $user2);

    if (false === $relation->exists()) {
        $relation->create();
    }

    // ...
```

## 3. Get an entity relations

Now imagine we have a `$user` entity and we want to list other users in relation with him:

```php
<?php

    $relation = $this->container->get('sly_relation');
    $relation->relationShip('friendship', $user);

    foreach ($relation->relations() as $friend) {
        // Your own logic, with using $friend entity for example!
    }

    // ...
```

To define a count limit, just set an argument to `relations` method.

The second argument concerns order:

* `last` (default) Last created relations
* `rand`           Random order

Here is an example with listing 10 last relations:

```php
<?php
    // ...

    foreach ($relation->relations(10, 'last') as $friend) {
        // ...
    }
```

## 4. Twig functions and renders

For this example, let's consider we are going to render a `$user` entity profile page.
First, just check if the `$user` and `$anotherUser` relation exists or not.
Then list all `$user` relations.

```php
<?php
// DemoController.php

    /**
     * @Route("/user/profile/{username}.html", name="user_profile")
     * @Template()
     */
    public function userProfileAction(Content $content)
    {
        // ...

        return array(
            'user'        => $user,
            'anotherUser' => $anotherUser,
        );
    }
```

```twig
{# showContent.html.twig #}

<h2>Is {{ user.name }} a {{ anotherUser.name }}'s friend?</h2>

{% if user | relation_exists('friendship', anotherUser) %}
    <p>Of course he is!</p>
{% else %}
    <p>No, no reason to be!</p>
{% endif %}

<h2>Now let's list all {{ user.name }} friends!</h2>

<ul>
    {% for friend in user | relations('friendship') %}
        <li>{{ friend.name }}</li>
    {% endfor %}
</ul>
```

-----

To be continued.