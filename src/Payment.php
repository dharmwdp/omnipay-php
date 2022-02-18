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

    
    public function refund($attributes = array())
    {

        $relativeUrl = $this->getEntityUrl() . 'refund';

        return $this->request('PUT', $relativeUrl, $attributes);
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

    /**
     * subscription payment
     *
     * @param string $encrypted string
     */
    public function subscription($string = array())
    {
        $relativeUrl = $this->getEntityUrl(). 'subscription';

        return $this->request('PUT', $relativeUrl, $string);
    }

    /**
     * subscription cancel
     *
     * @param string $encrypted string
     */
    public function cancelSubscription($customerId=null)
    {
        $relativeUrl = $this->getEntityUrl(). 'cancelSubscription/'.$customerId;

        return $this->request('GET', $relativeUrl);
    }

    /**
     * subscription cancel
     *
     * @param string $encrypted string
     */
    public function subscriptionDetail($customerId=null)
    {
        $relativeUrl = $this->getEntityUrl(). 'subscriptionDetail/'.$customerId;
        
        return $this->request('GET', $relativeUrl);
    }

}
