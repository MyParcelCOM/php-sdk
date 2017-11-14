<?php

namespace MyParcelCom\Sdk\Tests\Unit;

use MyParcelCom\Sdk\Resources\ServiceOption;
use PHPUnit\Framework\TestCase;

class ServiceOptionTest extends TestCase
{
    /** @test */
    public function testId()
    {
        $option = new ServiceOption();
        $this->assertEquals('service-option-id', $option->setId('service-option-id')->getId());
    }

    /** @test */
    public function testType()
    {
        $option = new ServiceOption();
        $this->assertEquals('service-options', $option->getType());
    }

    /** @test */
    public function testName()
    {
        $option = new ServiceOption();
        $this->assertEquals('Sign on delivery', $option->setName('Sign on delivery')->getName());
    }

    /** @test */
    public function testPrice()
    {
        $option = new ServiceOption();
        $this->assertEquals(55, $option->setPrice(55)->getPrice());
    }

    /** @test */
    public function testCurrency()
    {
        $option = new ServiceOption();
        $this->assertEquals('NOK', $option->setCurrency('NOK')->getCurrency());
    }

    /** @test */
    public function testJsonSerialize()
    {
        $option = (new ServiceOption())
            ->setId('service-option-id')
            ->setName('Sign on delivery')
            ->setPrice(55)
            ->setCurrency('NOK');

        $this->assertEquals([
            'id'         => 'service-option-id',
            'type'       => 'service-options',
            'attributes' => [
                'name'  => 'Sign on delivery',
                'price' => [
                    'amount'   => 55,
                    'currency' => 'NOK',
                ],
            ],
        ], $option->jsonSerialize());
    }
}