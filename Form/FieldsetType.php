<?php

namespace AdamQuaile\Bundle\FieldsetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FieldsetType extends AbstractType {

    public function setDefaultOptions ( OptionsResolverInterface $resolver )
    {
        $resolver->setDefaults([
            'legend'    => '',
            'virtual'   => true,
            'options'   => array(),
            'fields'    => array(),
        ]);
    }

    public function buildForm ( FormBuilderInterface $builder, array $options )
    {
        if ( !empty($options['fields']) ) {

            foreach ( $options['fields'] as $field ) {
                $builder->add($field['name'], $field['type'], $field['attr']);
            }
        }
    }

    public function buildView ( FormView $view, FormInterface $form, array $options )
    {
        if (false !== $options['legend']) {
            $view->vars['legend'] = $options['legend'];
        }
    }

    public function getName()
    {
        return 'fieldset';
    }
}