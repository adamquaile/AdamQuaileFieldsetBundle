<?php

namespace AdamQuaile\Bundle\FieldsetBundle;

use AdamQuaile\Bundle\FieldsetBundle\DependencyInjection\Compiler\FieldsetCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AdamQuaileFieldsetBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new FieldsetCompilerPass());

    }

}
