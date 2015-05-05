<?php

namespace XeroPHP;

class Events {

    private $_callbacks = array();

    public function listen($event, $callback)
    {
        if(!isset($this->_callbacks[$event])) {
            $this->_callbacks[$event] = array();
        }

        $this->_callbacks[$event][] = $callback;
    }

    public function fire($event, $args)
    {
        if(isset($this->_callbacks[$event])) {
            foreach ($this->_callbacks[$event] as $callback) {
                $callback($args);
            }
        }
    }

}