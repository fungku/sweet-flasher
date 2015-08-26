<?php

use Fungku\SweetFlasher\FlashMessage;
use Fungku\SweetFlasher\SessionFlasher\SessionFlasher;
use Mockery as m;

class FlashMessageTest extends PHPUnit_Framework_TestCase
{
    protected $session;
    protected $flash;

    /**
     * The default message titles by type.
     *
     * @var array
     */
    protected $defaultTitles = [
        'info'    => null,
        'success' => null,
        'error'   => null,
        'warning' => null,
        'overlay' => null,
    ];

    /**
     * The default confirmation texts by type.
     *
     * @var array
     */
    protected $defaultConfirmText = [
        'info'    => 'Okay',
        'success' => 'Okay!',
        'error'   => 'Okay',
        'warning' => 'Okay',
    ];

    public function setUp()
    {
        $this->session = m::mock(SessionFlasher::class);
        $this->flash = new FlashMessage($this->session);
    }

    /** @test */
    public function it_displays_default_flash_messages()
    {
        $this->session->shouldReceive('flash')->with('flash_message', [
            'message'       => 'poo',
            'title'         => $this->defaultTitles['info'],
            'status'        => 'info',
            'confirmButton' => $this->defaultConfirmText['info'],
        ]);

        $this->flash->message('poo');
    }

    /** @test */
    public function it_displays_info_flash_messages()
    {
        $this->session->shouldReceive('flash')->with('flash_message', [
            'message'       => 'Welcome Aboard',
            'title'         => $this->defaultTitles['info'],
            'status'        => 'info',
            'confirmButton' => $this->defaultConfirmText['info'],
        ]);

        $this->flash->info('Welcome Aboard');
    }

    /** @test */
    public function it_displays_success_flash_messages()
    {
        $this->session->shouldReceive('flash')->with('flash_message', [
            'message'       => 'Welcome Aboard',
            'title'         => $this->defaultTitles['success'],
            'status'        => 'success',
            'confirmButton' => $this->defaultConfirmText['success'],
        ]);

        $this->flash->success('Welcome Aboard');
    }

    /** @test */
    public function it_displays_error_flash_messages()
    {
        $this->session->shouldReceive('flash')->with('flash_message', [
            'message'       => 'There was a problem',
            'title'         => $this->defaultTitles['error'],
            'status'        => 'error',
            'confirmButton' => $this->defaultConfirmText['error'],
        ]);

        $this->flash->error('There was a problem');
    }

    /** @test */
    public function it_displays_warning_flash_messages()
    {
        $this->session->shouldReceive('flash')->with('flash_message', [
            'message'       => 'You should know about this',
            'title'         => $this->defaultTitles['warning'],
            'status'        => 'warning',
            'confirmButton' => $this->defaultConfirmText['warning'],
        ]);

        $this->flash->warning('You should know about this');
    }

    /** @test */
    public function it_displays_custom_message_titles()
    {
        $this->session->shouldReceive('flash')->with('flash_message', [
            'message'       => 'You are now signed up.',
            'title'         => 'Great!',
            'status'        => 'success',
            'confirmButton' => $this->defaultConfirmText['success'],
        ]);

        $this->flash->success('You are now signed up.', 'Great!');
    }

    /** @test */
    public function it_displays_custom_confirmation_button_text()
    {
        $this->session->shouldReceive('flash')->with('flash_message', [
            'message'       => 'You are now signed up.',
            'title'         => 'Great!',
            'status'        => 'success',
            'confirmButton' => 'Alrighty!',
        ]);

        $this->flash->success('You are now signed up.', 'Great!', 'Alrighty!');
    }

    /** @test */
    public function it_displays_flash_overlay_notifications()
    {
        $this->session->shouldReceive('flash')->with('flash_message', [
            'message'       => 'Overlay Message',
            'title'         => $this->defaultTitles['overlay'],
            'status'        => 'overlay',
            'confirmButton' => null,
        ]);

        $this->flash->overlay('Overlay Message');
    }
}
