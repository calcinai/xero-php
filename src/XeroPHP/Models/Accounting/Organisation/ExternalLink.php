<?php

namespace XeroPHP\Models\Accounting\Organisation;

use XeroPHP\Remote;


class ExternalLink extends Remote\Object {

    /**
     * See External link types
     *
     * @property string LinkType
     */

    /**
     * URL for service e.g. http://twitter.com/xeroapi
     *
     * @property string URL
     */


    const EXTERNAL_LINK_TYPE_FACEBOOK   = 'Facebook'; 
    const EXTERNAL_LINK_TYPE_GOOGLEPLUS = 'GooglePlus'; 
    const EXTERNAL_LINK_TYPE_LINKEDIN   = 'LinkedIn'; 
    const EXTERNAL_LINK_TYPE_TWITTER    = 'Twitter'; 
    const EXTERNAL_LINK_TYPE_WEBSITE    = 'Website'; 


    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return null;
    }


    /*
    * Get the root node name.  Just the unqualified classname
    */
    public static function getRootNodeName(){
        return 'ExternalLink';
    }


    /*
    * Get the guid property
    */
    public static function getGUIDProperty(){
        return '';
    }


    /*
    * Get the stem of the API (core.xro) etc
    */
    public static function getAPIStem(){
        return Remote\URL::API_CORE;
    }


    /*
    * Get the supported methods
    */
    public static function getSupportedMethods(){
        return array(
        );
    }

    public static function getProperties(){
        return array(
            'LinkType',
            'URL'
        );
    }


    /**
     * @return string
     */
    public function getLinkType(){
        return $this->_data['LinkType'];
    }

    /**
     * @param string $value
     * @return ExternalLink
     */
    public function setLinkType($value){
        $this->_data['LinkType'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getURL(){
        return $this->_data['URL'];
    }

    /**
     * @param string $value
     * @return ExternalLink
     */
    public function setURL($value){
        $this->_data['URL'] = $value;
        return $this;
    }


}