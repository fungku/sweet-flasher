<?php

namespace Fungku\SweetFlasher\SessionFlasher;

use Symfony\HttpFoundation\Session\SessionInterface;

class SymfonySessionFlasher implements SessionFlasher
{
    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function flash($key, $value)
    {
        $this->session->getFlashBag()->add($key, $value);
    }
}
