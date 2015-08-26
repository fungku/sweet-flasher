<?php

if (class_exists('Illuminate\Container\Container') && !function_exists('flash')) {
    /**
     * Helper function for laravel apps.
     * 
     * @param string $title
     * @param string $message
     * @return mixed
     */
    function flash($title = null, $message = null)
    {
        $flash = \Illuminate\Container\Container::getInstance()
            ->make(\Fungku\SweetFlasher\Flash::class);

        if (func_num_args() == 0) {
            return $flash;
        }

        return $flash->info($title, $message);
    }
}
