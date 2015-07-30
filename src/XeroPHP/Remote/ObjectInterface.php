<?php


namespace XeroPHP\Remote;


interface ObjectInterface {

    /**
     * Get the GUID Property if it exists
     *
     * @return string|null
     */
    static function getGUIDProperty();

    /**
     * Get a list of properties
     *
     * @return array
     */
    static function getProperties();

    /**
     * Get a list of the supported HTTP Methods
     *
     * @return array
     */
    static function getSupportedMethods();

    /**
     * return the URI of the resource (if any)
     *
     * @return string
     */
    static function getResourceURI();

    static function isPageable();

}