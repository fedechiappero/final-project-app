<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComprobanteProveedorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fechaEmision')->add('letra')->add('numero')->add('puntoVenta')->add('fechaVencimiento')->add('cuentaCorriente')->add('subtotal')->add('descuentoPorcentaje')->add('netoGravado')->add('totalIva')->add('total')->add('idRemito')->add('idProveedor');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ComprobanteProveedor'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_comprobanteproveedor';
    }


}
