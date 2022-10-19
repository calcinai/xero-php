<?php

namespace XeroPHP\Remote;

interface ObjectInterface
{
    /**
     * Get the GUID Property if it exists.
     *
     * @return string|null
     */
    public static function getGUIDProperty();

    /**
     * Get a list of properties.
     *
     * @return array
     */
    public static function getProperties();

    /**
     * Get a list of the supported HTTP Methods.
     *
     * @return array
     */
    public static function getSupportedMethods();

    /**
     * return the URI of the resource (if any).
     *
     * @return string
     */
    public static function getResourceURI();

    /**
     * Get the root node element
     *
     * @return string
     */
    public static function getRootNodeName();

    /**
     * Get the API stem
     *
     * @return string
     */
    public static function getAPIStem();

    /**
     * Is pageable
     *
     * @return boolean
     */
    public static function isPageable();
}
