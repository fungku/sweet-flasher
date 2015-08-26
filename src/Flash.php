<?php

namespace Fungku\SweetFlasher;

use Fungku\SweetFlasher\SessionFlasher\SessionFlasher;

class Flash
{
    /**
     * @var SessionFlasher
     */
    private $session;

    /**
     * @param SessionFlasher $session
     */
    public function __construct(SessionFlasher $session)
    {
        $this->session = $session;
    }

    /**
     * @param string $message
     * @param string $status
     * @param string $title
     * @param string $confirmButton
     */
    public function message($message, $status = null, $title = null, $confirmButton = null)
    {
        if (is_null($status)) {
            $status = 'info';
            $confirmButton = 'Okay';
        }

        $this->session->flash('flash_message', [
            'message'       => $message,
            'title'         => $title,
            'status'        => $status,
            'confirmButton' => $confirmButton,
        ]);
    }

    /**
     * @param string $message
     * @param string $title
     * @param string $confirmButton
     */
    public function success($message, $title = null, $confirmButton = 'Okay!')
    {
        $this->message($message, 'success', $title, $confirmButton);
    }

    /**
     * @param string $message
     * @param string $title
     * @param string $confirmButton
     */
    public function error($message, $title = null, $confirmButton = 'Okay')
    {
        $this->message($message, 'error', $title, $confirmButton);
    }

    /**
     * @param string $message
     * @param string $title
     * @param string $confirmButton
     */
    public function info($message, $title = null, $confirmButton = 'Okay')
    {
        $this->message($message, 'info', $title, $confirmButton);
    }

    /**
     * @param string $message
     * @param string $title
     * @param string $confirmButton
     */
    public function warning($message, $title = null, $confirmButton = 'Okay')
    {
        $this->message($message, 'warning', $title, $confirmButton);
    }

    /**
     * @param string $message
     * @param string $title
     */
    public function overlay($message, $title = null)
    {
        $this->message($message, 'overlay', $title);
    }
}
