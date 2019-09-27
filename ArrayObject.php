<?php
/**
 * @package Array Object
 * @license MIT
 * @author denis909
 */
namespace denis909\ArrayObject;

use ArrayAccess;
use Exception;

class ArrayObject implements ArrayAccess
{

    protected $_undefinedOffsetError = 'Undefined offset: {class}::${offset}';

    protected $_data = [];

    public function __construct(array $params = [])
    {
        $this->_data = $params;
    }

    protected function getUndefinedOffsetError($offset)
    {
        return strtr($this->_undefinedOffsetError, [
            '{offset}' => $offset,
            '{class}' => get_called_class()
        ]);
    }

    public function __isset($offset)
    {
        return isset($this->_data[$offset]);
    }

    public function __unset($offset)
    {
        unset($this->_data[$offset]);
    }

    public function __get($offset)
    {
        if (!array_key_exists($offset, $this->_data))
        {
            throw new Exception($this->getUndefinedOffsetError($offset));
        }

        return $this->_data[$offset];
    }

    public function __set($offset, $value)
    {
        if (!array_key_exists($offset, $this->_data))
        {
            throw new Exception($this->getUndefinedOffsetError($offset));
        }

        $this->_data[$offset] = $value;
    }

    public function getProperty($offset, $default = null)
    {
        if (array_key_exists($offset, $this->_data))
        {
            return $this->_data[$offset];
        }

        return $default;
    }

    public function setProperty($offset, $value)
    {
        $this->_data[$offset] = $value;
    }

    public function offsetSet($offset, $value)
    {
        if (!array_key_exists($offset, $this->_data))
        {
            throw new Exception($this->getUndefinedOffsetError($offset));
        }

        $this->_data[$offset] = $value;
    }

    public function offsetExists($offset)
    {
        return isset($this->_data[$offset]);
    }

    public function offsetUnset($offset)
    {
        if (!array_key_exists($offset, $this->_data))
        {
            throw new Exception($this->getUndefinedOffsetError($offset));
        }

        unset($this->_data[$offset]);
    }

    public function offsetGet($offset)
    {
        if (!array_key_exists($offset, $this->_data))
        {
            throw new Exception($this->getUndefinedOffsetError($offset));
        }

        return $this->_data[$offset];
    }

}