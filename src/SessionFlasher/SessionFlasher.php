<?php

namespace Fungku\SweetFlasher\SessionFlasher;

interface SessionFlasher
{
    /**
     * Flash a message to the session.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function flash($key, $value);
}
