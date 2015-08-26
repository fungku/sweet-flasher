<?php

namespace Fungku\SweetFlasher\SessionFlasher;

class LaravelSessionFlasher implements SessionFlasher
{
    /**
     * @var \Illuminate\Session\Store
     */
    private $session;

    /**
     * @param \Illuminate\Session\Store $session
     */
    public function __construct(\Illuminate\Session\Store $session)
    {
        $this->session = $session;
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function flash($key, $value)
    {
        $this->session->flash($key, $value);
    }
}
