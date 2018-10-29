<?php

namespace framework\base;

class Model
{
    /**
     * Model constructor.
     *
     * @param array $data
     */
    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            if (in_array($key, $this->attributes())) {
                $this->$key = $value;
            }
        }
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [];
    }
}