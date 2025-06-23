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
use InvalidArgumentException;

/**
 * Create a new accounts receivable advance record
 */
class ArAdvanceCreate extends AbstractArAdvance
{
    /**
     * @param XMLWriter $xml
     */
    public function writeXml(XMLWriter &$xml)
    {
        $xml->startElement('function');
        $xml->writeAttribute('controlid', $this->getControlId());

        $xml->startElement('create');

        $xml->startElement('ARADVANCE');

        if (!$this->getCustomerId()) {
            throw new InvalidArgumentException('Customer ID is required for create');
        }
        $xml->writeElement('CUSTOMERID', $this->getCustomerId(), true);

        if (!$this->getPaymentDate()) {
            throw new InvalidArgumentException('Payment Date is required for create');
        }
        $xml->writeElement('PAYMENTDATE', $this->getPaymentDate()->format('m/d/Y'), true);

        if (!$this->getReceiptDate()) {
            throw new InvalidArgumentException('Receipt Date is required for create');
        }
        $xml->writeElement('RECEIPTDATE', $this->getReceiptDate()->format('m/d/Y'), true);

        if (!$this->getPaymentMethod()) {
            throw new InvalidArgumentException('Payment Method is required for create');
        }
        $xml->writeElement('PAYMENTMETHOD', $this->getPaymentMethod(), true);

        if ($this->getDescription()) {
            $xml->writeElement('DESCRIPTION', $this->getDescription());
        }

        if ($this->getUndepositedAccountNo()) {
            $xml->writeElement('UNDEPOSITEDACCOUNTNO', $this->getUndepositedAccountNo());
        }

        if ($this->getBankAccountId()) {
            $xml->writeElement('FINANCIALENTITY', $this->getBankAccountId());
        }

        if (count($this->getArAdvanceItems()) > 0) {
            $xml->startElement('ARADVANCEITEMS');
            foreach ($this->getArAdvanceItems() as $arAdvanceItem) {
                $arAdvanceItem->writeXml($xml);
            }
            $xml->endElement(); // ARADVANCEITEMS
        }

        $xml->endElement(); // ARADVANCE

        $xml->endElement(); // create

        $xml->endElement(); // function
    }
}