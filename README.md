# Symfony Forms Fieldset Type

Adds a fieldset type to a symfony project.

## Installation

Install via composer from `adamquaile/symfony-fieldset-bundle`.

Register in `app/AppKernel.php`:

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new AdamQuaile\Bundle\FieldsetBundle\AdamQuaileFieldsetBundle(),
        );

        //...
    }

## Usage

Use with normal form builder methods:

    $builder->add('my_group', 'fieldset', [

        'label' => false, // You probably don't want a label as well as a legend.
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
