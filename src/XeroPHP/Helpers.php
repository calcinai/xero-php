<?php

namespace XeroPHP;

/**
 * Unfortunate class for methods that don't really have a home.  This is to avoid external dependencies.
 *
 * Class Helpers
 * @package XeroPHP
 */
class Helpers {

    /**
     * Convert a multi-d assoc array into an xml representation.  Straightforward <key>val</key> unless there are numeric keys,
     * in which case, the parent key is singularised and used.
     *
     * @param array $array
     * @param int $depth
     * @param string $singular_parent_key
     * @return string
     */
    public static function arrayToXML(array $array, $depth = 0, $singular_parent_key = ''){

        $xml = '';
        foreach($array as $key => $element){
            if(is_array($element)){
                //recurse and replace.
                $element = self::arrayToXML($element, $depth +1, self::singularize($key));
            } else {
                //sanitise
                $element = htmlentities($element);
            }

            if(is_numeric($key))
                $key = $singular_parent_key;

            $xml .= sprintf('<%1$s>%2$s</%1$s>', $key, $element);
        }
        return $xml;
    }


    /**
     * This function is based on Wave\Inflector::singularize().
     * It only contains a fraction of the rules from its predecessor, so only good for a quick basic singularisation.
     *
     * @param $string
     * @return mixed
     */
    public static function singularize($string){
        $singular = array(
            '/([^aeiouy]|qu)ies$/i' => "$1y",
            '/([^s])s$/i'           => "$1"
        );

        // check for matches using regular expressions
        foreach($singular as $pattern => $result){
            if(preg_match($pattern, $string))
                return preg_replace($pattern, $result, $string);
        }

        //Else return
        return $string;
    }

    /**
     * Generic function to flatten an associative array into an arbitrarily delimited string.
     *
     * @param array $array
     * @param string $format
     * @param string|null $glue
     * @param bool $escape
     * @return string|array If no glue provided, it won't be imploded.
     */
    public static function flattenAssocArray(array $array, $format, $glue = null, $escape = false){

        $pairs = array();
        foreach($array as $key => $val){
            if($escape){
                $key = self::escape($key);
                $val = self::escape($val);
            }
            $pairs[] = sprintf($format, $key, $val);
        }

        //Return array if no glue provided
        if($glue === null)
            return $pairs;
        else
            return implode($glue, $pairs);
    }

    /**
     * OAuth compliant escaping functions.  In php, as simple as rawurlencode().
     * There were a lot more seemingly redundant transformations in the SimpleOAuth class..
     *
     * @param $string
     * @return string
     */
    public static function escape($string) {
        return rawurlencode($string);
    }

}