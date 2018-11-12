<?php

namespace App\Ecommerce\Tests;

use Melisa\Laravel\Tests\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    
    protected $bootstrapFile = 'ecommerce';
    protected $connectionsToTransact = [
        'core', 
        'ecommerce'
    ];
    
}
