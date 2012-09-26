<?php

namespace Isics\FlatPageBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class FlatPageType extends AbstractType
{
    /**
     * @see Symfony\Component\Form\AbstractType
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('url', 'text')
            ->add('title', 'text')
            ->add('metaDescription', 'textarea', array('required' => false, 'label' => 'META Description'))
            ->add('metaKeywords', 'textarea', array('required' => false, 'label' => 'META Keywords'))
            ->add('content', 'textarea')
            ->add('templateName', 'text', array('label' => 'Template name'))
            ->add('isPublished', 'checkbox', array('required' => false, 'label' => 'Published?'));
    }

    /**
     * @see Symfony\Component\Form\AbstractType
     */
    public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'Isics\FlatPageBundle\Entity\FlatPage');
    }

    public function getName()
    {
        return 'isics_flat_page';
    }
}
