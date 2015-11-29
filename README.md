# Symfony Forms Fieldset Type

Adds a fieldset type to a symfony project.

## Installation

Install via composer from `adamquaile/symfony-fieldset-bundle`.

Register in `app/AppKernel.php`:

```php
public function registerBundles()
{
    $bundles = array(
        // ...
        new AdamQuaile\Bundle\FieldsetBundle\AdamQuaileFieldsetBundle(),
    );

    //...
}
```
## Usage

Use with normal form builder methods:

```php
// A fieldset with your fields defined in a callback function
$builder->add('my_group_example_one', 'fieldset', [
    'label' => false, // You probably don't want a label as well as a legend.
    'legend' => 'Your fieldset legend',
    'fields' => function(FormBuilderInterface $builder) {
        $builder->add('first_name', 'text', [
            'label' => 'First Name'
        ]);
        $builder->add('last_name', 'text', [
            'required'  => false,
            'label'     => 'Surname'
        ]);
    }
]);

// A fieldset with your fields defined in an array
$builder->add('my_group_example_two', 'fieldset', [
    'label' => false,
    'legend' => 'Your fieldset legend',
    'fields' => [
        [
            'name'  => 'first_name',
            'type'  => 'text',
            'attr'  => [
                'label' => 'First Name'
            ]
        ],
        [
            'name'  => 'last_name',
            'type'  => 'text',
            'attr'  => [
                'required'  => false,
                'label'     => 'Surname'
            ]
        ]
    ]
]);
```
