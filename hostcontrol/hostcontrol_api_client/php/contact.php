<?php


class Contact extends ResourceWrapper
{
    protected $paths = array(
        'collection' => '/contact',
        'single' => '/contact/%s',
        'lookup' => '/contact?customer=%s',
    );

    public function get($contact_id)
    {
        $path = $this->get_request_path('single', array($contact_id));
        return $this->apiclient->get($path);
    }

    public function update($contact_id, $options)
    {
        $path = $this->get_request_path('single', array($contact_id));
        return $this->apiclient->put($path, array($options));
    }

    public function lookup($customer_id)
    {
        $path = $this->get_request_path('lookup', array($customer_id));
        return $this->apiclient->get($path);
    }

    public function create($contact_id)
    {
        return $this->apiclient->post($this->get_request_path('collection'), $contact_id);
    }
}
