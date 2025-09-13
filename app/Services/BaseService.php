<?php

namespace App\Services;

abstract class BaseService
{
    protected function handle(callable $callback)
    {
        try {
            return $callback();
        } catch (\Exception $e) {
            // İleride loglama yapılacak
            throw $e;
        }
    }
}
