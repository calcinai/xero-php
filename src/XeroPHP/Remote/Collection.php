<?php

namespace XeroPHP\Remote;

class Collection extends \ArrayObject
{
    /**
     * Holds a list of objects that hold child references to the collection.
     * todo - 2.x make this more elegant.
     *
     * @var Model[]
     */
    protected $_associated_objects;

    public function addAssociatedObject($parent_property, Model $object)
    {
        $this->_associated_objects[$parent_property] = $object;
    }

    /**
     * Return whether or not the Collection is 0
     *
     * @return bool
     */
    public function empty()
    {
        return !count($this);
    }

    /**
     * Remove an item at a specific index.
     *
     * @param $index
     */
    public function removeAt($index)
    {
        if (isset($this[$index])) {
            foreach ($this->_associated_objects as $parent_property => $object) {
                /**
                 * @var Model
                 */
                $object->setDirty($parent_property);
            }
            unset($this[$index]);
        }
    }

    /**
     * Remove a specific object from the collection.
     *
     * @param Model $object
     */
    public function remove(Model $object)
    {
        foreach ($this as $index => $item) {
            if ($item === $object) {
                $this->removeAt($index);
            }
        }
    }

    /**
     *  Remove all of the values int he collection.
     */
    public function removeAll()
    {
        foreach ($this->_associated_objects as $parent_property => $object) {
            /**
             * @var Model
             */
            $object->setDirty($parent_property);
        }
        $this->exchangeArray([]);
    }

    public function first()
    {
        return $this->offsetExists(0) ? $this->offsetGet(0) : null;
    }

    public function last()
    {
        $last = $this->count() - 1;

        return $this->offsetExists($last) ? $this->offsetGet($last) : null;
    }
}
