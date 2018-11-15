<?php

namespace MyParcelCom\ApiSdk\Resources\Interfaces;

interface ServiceContractInterface extends ResourceInterface
{
    /**
     * @param string $id
     * @return $this
     */
    public function setId($id);

    /**
     * @param ServiceInterface $service
     * @return $this
     */
    public function setService(ServiceInterface $service);

    /**
     * @return ServiceInterface
     */
    public function getService();

    /**
     * @param ContractInterface $contract
     * @return $this
     */
    public function setContract(ContractInterface $contract);

    /**
     * @return ContractInterface
     */
    public function getContract();

    /**
     * @param ServiceGroupInterface[] $groups
     * @return $this
     */
    public function setServiceGroups(array $groups);

    /**
     * @param ServiceGroupInterface $group
     * @return $this
     */
    public function addServiceGroup(ServiceGroupInterface $group);

    /**
     * @return ServiceGroupInterface[]
     */
    public function getServiceGroups();

    /**
     * @param ServiceOptionPriceInterface[] $options
     * @return $this
     */
    public function setServiceOptionPrices(array $options);

    /**
     * @param ServiceOptionPriceInterface $option
     * @return $this
     */
    public function addServiceOptionPrice(ServiceOptionPriceInterface $option);

    /**
     * @return ServiceOptionPriceInterface[]
     */
    public function getServiceOptionPrices();
}
