<?php

namespace Omnipay\Api;

use Requests;

class Payment extends Entity
{
    /**
     * @param $id Payment id
     */
    public function retriveTransaction($transactionID)
    {
        $relativeUrl = $this->getEntityUrl() . 'transaction/'.$transactionID;

        return $this->request('GET', $relativeUrl);
    }

    public function transactionList($attributes = array())
    {
        $relativeUrl = $this->getEntityUrl() . 'transaction-list';

        return $this->request('POST', $relativeUrl, $attributes);
    }  

   

    /**
     * @param $id Payment id
     */
    public function capture($attributes = array())
    {
        $relativeUrl = $this->getEntityUrl() . $this->id . '/capture';

        return $this->request('POST', $relativeUrl, $attributes);
    }

    public function transfer($attributes = array())
    {
        $relativeUrl = $this->getEntityUrl() . $this->id . '/transfers';

        return $this->request('POST', $relativeUrl, $attributes);
    }

    public function refund($attributes = array())
    {

        $relativeUrl = $this->getEntityUrl() . 'refund';

        return $this->request('PUT', $relativeUrl, $attributes);
    }

    public function transfers()
    {
        $transfer = new Transfer();

        $transfer->payment_id = $this->id;

        return $transfer->all();
    }

    public function bankTransfer()
    {
        $relativeUrl = $this->getEntityUrl() . $this->id . '/bank_transfer';

        return $this->request('GET', $relativeUrl);
    }

    public function fetchMultipleRefund($options = array())
    {
        $relativeUrl = $this->getEntityUrl() . $this->id . '/refunds';

        return $this->request('GET', $relativeUrl, $options);
    }

    public function fetchRefund($refundId)
    {
        $relativeUrl = $this->getEntityUrl() . $this->id . '/refunds/'.$refundId;

        return $this->request('GET', $relativeUrl);
    } 
    

    /**
     * payment create
     *
     * @param string $encrypted string
     */
    public function createPayment($string = array())
    {
        $relativeUrl = $this->getEntityUrl(). 'pay';

        return $this->request('PUT', $relativeUrl, $string);
    }

}
