SlyRelationBundle
====================

# Installation

## 1. Get it!

# Installation

### Via Deps

Add this to your deps file:

```
[RelationBundle]
    git=git://github.com/Ph3nol/RelationBundle
    target=/bundles/Sly/RelationBundle
```

Then run vendors installation:

```
php bin/vendors install
```

### Via Composer

Add this package to your `composer.json` file:

```
"sly/relation-bundle": "dev-master"
```

Then make a Composer vendors installation/update:

```
php composer.phar install # or update
```

### Via Git SubModule

```
git submodule add git://github.com/Ph3nol/RelationBundle vendor/bundles/Sly/RelationBundle
git submodule update --init
```


## 2. Add Sly namespace to your Autoload

```php
<?php
// app/autoload.php

$loader->registerNamespaces(array(
    // ...
    'Sly' => __DIR__.'/../vendor/bundles',
));
```

## 3. Enable the bundle from your AppKernel file

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Sly\RelationBundle\SlyRelationBundle(),
    );
}
```

## 4. Generate Database Schema

Finally, you have to generate your database schema with this Symfony command:

```php app/console doctrine:schema:update --force```

## 5. Let's go!

Now, take a look at the [usage part](https://github.com/Ph3nol/RelationBundle/blob/master/Resources/doc/usage.markdown) of this bundle.
