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

use Intacct\Xml\XMLWriter;

/**
 * Represents an AR Advance Item
 */
class ArAdvanceItem
{
    /** @var string */
    private $accountLabel;

    /** @var string */
    private $accountNumber;

    /** @var float */
    private $transactionAmount;

    /** @var string */
    private $locationId;

    /**
     * @return string
     */
    public function getAccountLabel()
    {
        return $this->accountLabel;
    }

    /**
     * @param string $accountLabel
     */
    public function setAccountLabel($accountLabel)
    {
        $this->accountLabel = $accountLabel;
    }

    /**
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * @return string
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * @return float
     */
    public function getTransactionAmount()
    {
        return $this->transactionAmount;
    }

    /**
     * @param float $transactionAmount
     */
    public function setTransactionAmount($transactionAmount)
    {
        $this->transactionAmount = $transactionAmount;
    }

    /**
     * @param XMLWriter $xml
     */
    public function writeXml(XMLWriter &$xml)
    {
        $xml->startElement('ARADVANCEITEM');

        if ($this->getAccountLabel()) {
            $xml->writeElement('ACCOUNTLABEL', $this->getAccountLabel());
        }

        if ($this->getAccountNumber()) {
            $xml->writeElement('ACCOUNTNO', $this->getAccountNumber());
        }

        if ($this->getLocationId()) {
            $xml->writeElement('LOCATIONID', $this->getLocationId());
        }

        if ($this->getTransactionAmount()) {
            $xml->writeElement('TRX_AMOUNT', $this->getTransactionAmount());
        }

        $xml->endElement(); // ARADVANCEITEM
    }
}