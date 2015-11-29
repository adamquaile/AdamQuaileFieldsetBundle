<?php

namespace AdamQuaile\Bundle\FieldsetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FieldsetType extends AbstractType {

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions ( OptionsResolverInterface $resolver )
    {
        $resolver->setDefaults(array(
            'legend'    => '',
            'virtual'   => true,
            'options'   => array(),
            'fields'    => array(),
            'label'     => false,
        ))
        ->addAllowedTypes(array(
            'fields' => array('array', 'callable'),
        ));
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm ( FormBuilderInterface $builder, array $options )
    {
        if ( !empty($options['fields']) ) {
            if ( is_callable($options['fields']) ) {
                $options['fields']($builder);
            }
            elseif ( is_array($options['fields']) ) {
                foreach ( $options['fields'] as $field ) {
                    $builder->add($field['name'], $field['type'], $field['attr']);
                }
            }
        }
    }

    /**
     * @param FormView $view
     * @param FormInterface $form
     * @param array $options
     */
    public function buildView ( FormView $view, FormInterface $form, array $options )
    {
        if (false !== $options['legend']) {
            $view->vars['legend'] = $options['legend'];
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fieldset';
    }
}
