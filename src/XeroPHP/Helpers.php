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
    public static function arrayToXML(array $array, $key_override = null) {

        $xml = '';
        foreach($array as $key => $element) {
            if(is_array($element)) {

                //recurse and replace.
                if(self::isAssoc($element))
                    $element = self::arrayToXML($element);
                else
                    $element = self::arrayToXML($element, self::singularize($key));

            } else {
                //Element escaping for the http://www.w3.org/TR/REC-xml/#sec-predefined-ent
                //Full DOMDocument not really necessary as we don't use attributes (which are more strict)
                $element = strtr(
                    $element,
                    array(
                        '<' => '&lt;',
                        '>' => '&gt;',
                        '"' => '&quot;',
                        "'" => '&apos;',
                        '&' => '&amp;',
                    )
                );
            }

            if($key_override !== null)
                $key = $key_override;

            $xml .= sprintf('<%1$s>%2$s</%1$s>', $key, $element);
        }

        return $xml;
    }

    public static function XMLToArray(\SimpleXMLElement $sxml) {

        $output = array();
        $singular_node_name = self::singularize($sxml->getName());

        foreach($sxml->children() as $child_name => $child) {
            if($child->count() > 0) {
                $node = self::XMLToArray($child);
            } else {
                $node = (string) $child;
            }

            //don't make it assoc, as the keys will all be the same
            if($child_name === $singular_node_name) {
                $output[] = $node;
            } else {
                $output[$child_name] = $node;
            }
        }

        return $output;
    }


    /**
     * This function is based on Wave\Inflector::singularize().
     * It only contains a fraction of the rules from its predecessor, so only good for a quick basic singularisation.
     *
     * @param $string
     * @return mixed
     */
    public static function singularize($string) {
        $singular = array(
            '/(vert|ind)ices$/i'    => "$1ex",
            '/(alias)es$/i'         => "$1",
            '/(x|ch|ss|sh)es$/i'    => "$1",
            '/(s)eries$/i'          => "$1eries",
            '/(s)tatus$/i'          => "$1tatus",
            '/([^aeiouy]|qu)ies$/i' => "$1y",
            '/([lr])ves$/i'         => "$1f",
            '/([ti])a$/i'           => "$1um",
            '/(us)es$/i'            => "$1",
            '/(basis)$/i'           => "$1",
            '/([^s])s$/i'           => "$1"
        );

        // check for matches using regular expressions
        foreach($singular as $pattern => $result) {
            if(preg_match($pattern, $string))
                return preg_replace($pattern, $result, $string);
        }

        //Else return
        return $string;
    }

    public static function pluralize($string) {

        $plural = array(
            '/(quiz)$/i'                     => "$1zes",
            '/(matr|vert|ind)ix|ex$/i'       => "$1ices",
            '/(x|ch|ss|sh)$/i'               => "$1es",
            '/([^aeiouy]|qu)y$/i'            => "$1ies",
            '/(hive)$/i'                     => "$1s",
            '/(?:([^f])fe|([lr])f)$/i'       => "$1$2ves",
            '/(shea|lea|loa|thie)f$/i'       => "$1ves",
            '/sis$/i'                        => "ses",
            '/([ti])um$/i'                   => "$1a",
            '/(tomat|potat|ech|her|vet)o$/i' => "$1oes",
            '/(bu)s$/i'                      => "$1ses",
            '/(alias)$/i'                    => "$1es",
            '/(ax|test)is$/i'                => "$1es",
            '/(us)$/i'                       => "$1es",
            '/s$/i'                          => "s",
            '/$/'                            => "s"
        );

        // check for matches using regular expressions
        foreach($plural as $pattern => $result) {
            if(preg_match($pattern, $string))
                return preg_replace($pattern, $result, $string);
        }

        return $string;
    }


    public static function isAssoc(array $array) {
        return (bool) count(array_filter(array_keys($array), 'is_string'));
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
    public static function flattenAssocArray(array $array, $format, $glue = null, $escape = false) {

        $pairs = array();
        foreach($array as $key => $val) {
            if($escape) {
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