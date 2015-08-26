<?php

namespace Fungku\SweetFlasher\SessionFlasher;

use Symfony\Component\DependencyInjection\ContainerAware;

class SymfonySessionFlasher extends ContainerAware implements SessionFlasher
{
    /**
     * @param string $key
     * @param mixed $value
     */
    public function flash($key, $value)
    {
        $this->container->get('session')->getFlashBag()->add($key, $value);
    }
}
