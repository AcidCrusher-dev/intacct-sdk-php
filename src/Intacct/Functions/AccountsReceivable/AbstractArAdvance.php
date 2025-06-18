<?php

/**
 * Copyright 2021 Sage Intacct, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"). You may not
 * use this file except in compliance with the License. You may obtain a copy
 * of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "LICENSE" file accompanying this file. This file is distributed on
 * an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Intacct\Functions\AccountsReceivable;

use Intacct\Functions\AbstractFunction;
use DateTime;

abstract class AbstractArAdvance extends AbstractFunction
{
    /** @var string */
    protected $customerId;

    /** @var DateTime */
    protected $paymentDate;

    /** @var DateTime */
    protected $receiptDate;

    /** @var string */
    protected $paymentMethod;

    /** @var string */
    protected $description;

    /** @var string */
    protected $undepositedAccountNo;

    /** @var array */
    protected $arAdvanceItems = [];

    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param string $customerId
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * @return DateTime
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @param DateTime $paymentDate
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;
    }

    /**
     * @return DateTime
     */
    public function getReceiptDate()
    {
        return $this->receiptDate;
    }

    /**
     * @param DateTime $receiptDate
     */
    public function setReceiptDate($receiptDate)
    {
        $this->receiptDate = $receiptDate;
    }

    /**
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getUndepositedAccountNo()
    {
        return $this->undepositedAccountNo;
    }

    /**
     * @param string $undepositedAccountNo
     */
    public function setUndepositedAccountNo($undepositedAccountNo)
    {
        $this->undepositedAccountNo = $undepositedAccountNo;
    }

    /**
     * @return array
     */
    public function getArAdvanceItems()
    {
        return $this->arAdvanceItems;
    }

    /**
     * @param array $arAdvanceItems
     */
    public function setArAdvanceItems($arAdvanceItems)
    {
        $this->arAdvanceItems = $arAdvanceItems;
    }

    /**
     * @param ArAdvanceItem $arAdvanceItem
     */
    public function addArAdvanceItem(ArAdvanceItem $arAdvanceItem)
    {
        $this->arAdvanceItems[] = $arAdvanceItem;
    }
}