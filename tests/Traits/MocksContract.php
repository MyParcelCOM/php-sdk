<?php

namespace MyParcelCom\ApiSdk\Tests\Traits;

use MyParcelCom\ApiSdk\Resources\Interfaces\ContractInterface;
use MyParcelCom\ApiSdk\Resources\Interfaces\PhysicalPropertiesInterface;
use MyParcelCom\ApiSdk\Resources\Interfaces\ServiceInterface;
use MyParcelCom\ApiSdk\Resources\Interfaces\ServiceOptionInterface;
use MyParcelCom\ApiSdk\Resources\Interfaces\ServiceRateInterface;
use MyParcelCom\ApiSdk\Resources\Interfaces\ShipmentInterface;

trait MocksContract
{
    /**
     * @param ServiceOptionInterface[] $serviceOptions
     * @param int|null                 $price
     * @param int|null                 $weightMin
     * @param int|null                 $weightMax
     * @param int|null                 $fuelSurcharge
     * @return ServiceRateInterface
     */
    protected function getMockedServiceRate(
        array $serviceOptions = [],
        $price = null,
        $weightMin = null,
        $weightMax = null,
        $fuelSurcharge = null
    ) {
        $mock = $this->getMockBuilder(ServiceRateInterface::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();
        $mock
            ->method('getPrice')
            ->willReturn($price);
        $mock
            ->method('getFuelSurchargeAmount')
            ->willReturn($fuelSurcharge);
        $mock
            ->method('getServiceOptions')
            ->willReturn($serviceOptions);
        $mock
            ->method('getWeightMin')
            ->willReturn($weightMin);
        $mock
            ->method('getWeightMax')
            ->willReturn($weightMax);

        return $mock;
    }

    /**
     * @param int                      $weight
     * @param ServiceInterface|null    $service
     * @param ServiceOptionInterface[] $serviceOptions
     * @param null|int                 $volumetricWeight
     * @return ShipmentInterface
     */
    protected function getMockedShipment($weight = 5000, ServiceInterface $service = null, array $serviceOptions = [], $volumetricWeight = null)
    {
        $physicalPropertiesMock = $this->getMockBuilder(PhysicalPropertiesInterface::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();
        $physicalPropertiesMock->method('getWeight')->willReturn($weight);
        $physicalPropertiesMock->method('getVolumetricWeight')->willReturn($volumetricWeight);

        $contractMock = $this->getMockBuilder(ContractInterface::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();

        $shipment = $this->getMockBuilder(ShipmentInterface::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();

        $shipment->method('getPhysicalProperties')->willReturn($physicalPropertiesMock);
        $shipment->method('getContract')->willReturn($contractMock);
        $shipment->method('getServiceOptions')->willReturn($serviceOptions);
        if ($service) {
            $shipment->method('getService')->willReturn($service);
        }

        return $shipment;
    }

    /**
     * @param string   $id
     * @param int|null $price
     * @return ServiceOptionInterface
     */
    protected function getMockedServiceOption($id, $price = 0)
    {
        $mock = $this->getMockBuilder(ServiceOptionInterface::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();

        $mock
            ->method('getId')
            ->willReturn($id);
        $mock
            ->method('getPrice')
            ->willReturn($price);

        return $mock;
    }

    /**
     * @param ServiceRateInterface[] $serviceRates
     * @param string|null            $deliveryMethod
     * @param bool                   $usesVolumetricWeight
     * @return ServiceInterface
     */
    protected function getMockedService(array $serviceRates = [], $deliveryMethod = null, $usesVolumetricWeight = false)
    {
        $mock = $this->getMockBuilder(ServiceInterface::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();
        $mock
            ->method('getServiceRates')
            ->willReturn($serviceRates);
        $mock
            ->method('getDeliveryMethod')
            ->willReturn($deliveryMethod);
        $mock->method('usesVolumetricWeight')
            ->willReturn($usesVolumetricWeight);

        return $mock;
    }
}
