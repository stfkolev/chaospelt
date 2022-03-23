<?php

/**
 * Articulately self-expressive type
 *
 * PHP version 7.4
 *
 * @category Support
 * @package  Chaospelt\Kernel\Support
 *
 * @author  Stf Kolev <inkyzfx@gmail.com>
 * @license BSD-3-Clause https://opensource.org/licenses/BSD-3-Clause
 *
 * @link https://github.com/stfkolev/chaospelt
 */

namespace Chaospelt\Kernel\Support;

use Chaospelt\Kernel\Contracts\Arrayable;
use Chaospelt\Kernel\Contracts\Jsonable;

use ArrayAccess;
use JsonSerializable;

/**
 * Articulately self-expressive type
 *
 * @template TKey of array-key
 * @template TValue
 *
 * @implements \Chaospelt\Kernel\Contracts\Arrayable<TKey, TValue>
 * @implements \ArrayAccess<TKey, TValue>
 *
 * @category Support
 * @package  Chaospelt\Kernel\Support
 *
 * @author  Stf Kolev <inkyzfx@gmail.com>
 * @license BSD-3-Clause https://opensource.org/licenses/BSD-3-Clause
 *
 * @link https://github.com/stfkolev/chaospelt
 */
class Vivid
{
    /**
     * All of the attributes set on the vivid instance.
     *
     * @var array<TKey, TValue>
     */
    protected $attributes = [];

    /**
     * Create a new vivid instance.
     *
     * @param iterable<TKey, TValue> $attributes List of attributes to be passed
     *
     * @return void
     */
    public function __construct($attributes = [])
    {
        foreach ($attributes as $key => $value) {
            $this->attributes[$key] = $value;
        }
    }

    /**
     * Get an attribute from the vivid instance.
     *
     * @param TKey                                  $key     Key of the attribute
     * @param TGetDefault|(\Closure(): TGetDefault) $default Default key parameter
     *
     * @return TValue|TGetDefault
     */
    public function get($key, $default = null)
    {
        if (array_key_exists($key, $this->attributes)) {
            return $this->attributes[$key];
        }

        return value($default);
    }

    /**
     * Get the attributes from the vivid instance.
     *
     * @return array<TKey, TValue>
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Convert the vivid instance to an array.
     *
     * @return array<TKey, TValue>
     */
    public function toArray()
    {
        return $this->attributes;
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array<TKey, TValue>
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * Convert the fluent instance to JSON.
     *
     * @param int $options Options available to pass onto the json serialization
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    /**
     * Determine if the given offset exists.
     *
     * @param TKey $offset Key of the attribute
     *
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->attributes[$offset]);
    }

    /**
     * Get the value for a given offset.
     *
     * @param TKey $offset Key of the attribute
     *
     * @return TValue|null
     */
    public function offsetGet($offset): mixed
    {
        return $this->get($offset);
    }

    /**
     * Set the value at the given offset.
     *
     * @param TKey   $offset Key of the attribute
     * @param TValue $value  Value of the attribute
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        $this->attributes[$offset] = $value;
    }

    /**
     * Unset the value at the given offset.
     *
     * @param TKey $offset Key of the attribute
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->attributes[$offset]);
    }

    /**
     * Handle dynamic calls to the vivid instance to set attributes.
     *
     * @param TKey              $method     Method instance to be called
     * @param array{0: ?TValue} $parameters List of method arguments
     *
     * @return $this
     */
    public function __call($method, $parameters)
    {
        $this->attributes[$method] = count($parameters) > 0 ? $parameters[0] : true;

        return $this;
    }

    /**
     * Dynamically retrieve the value of an attribute.
     *
     * @param TKey $key Key of the attribute
     *
     * @return TValue|null
     */
    public function __get($key)
    {
        return $this->get($key);
    }

    /**
     * Dynamically set the value of an attribute.
     *
     * @param TKey   $key   Key of the attribute
     * @param TValue $value Value of the attribute
     *
     * @return void
     */
    public function __set($key, $value)
    {
        $this->offsetSet($key, $value);
    }

    /**
     * Dynamically check if an attribute is set.
     *
     * @param TKey $key Key of the attribute
     *
     * @return bool
     */
    public function __isset($key)
    {
        return $this->offsetExists($key);
    }

    /**
     * Dynamically unset an attribute.
     *
     * @param TKey $key Key of the attribute
     *
     * @return void
     */
    public function __unset($key)
    {
        $this->offsetUnset($key);
    }
}
