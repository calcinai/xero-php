<?php

namespace XeroPHP;

use XeroPHP\Models\Accounting\TrackingCategory;
use XeroPHP\Models\PayrollAU\Payslip\TimesheetEarningsLine;

/**
 * Unfortunate class for methods that don't really have a home.
 * This is to avoid external dependencies.
 *
 * Class Helpers
 */
class Helpers
{
    const PACKAGE_NAME         = 'calcinai/xero-php';
    const DEFAULT_VERSION      = 'v2.2.4';

    /**
     * Convert a multi-d assoc array into an xml representation.
     * Straightforward <key>val</key> unless there are numeric keys,
     * in which case, the parent key is singularised and used.
     *
     * @param array $array
     * @param null $key_override
     *
     * @return string
     */
    public static function arrayToXML(array $array, $key_override = null)
    {
        $xml = '';
        foreach ($array as $key => $element) {
            if (is_array($element)) {
                //recurse and replace.
                if (self::isAssoc($element)) {
                    $element = self::arrayToXML($element);
                } else {
                    //Dirty dirty hack to make the 1.x branch work for tracking categories
                    //This is the only instance in the whole app of 'Tracking' so should be ok for BC.
                    if ($key === 'Tracking') {
                        $element = self::arrayToXML($element, 'TrackingCategory');
                    } else {
                        $element = self::arrayToXML($element, self::singularize($key));
                    }
                }
            } else {
                //Element escaping for the http://www.w3.org/TR/REC-xml/#sec-predefined-ent
                //Full DOMDocument not really necessary as we don't use attributes (which are more strict)
                $element = strtr(
                    $element,
                    [
                        '<' => '&lt;',
                        '>' => '&gt;',
                        '"' => '&quot;',
                        "'" => '&apos;',
                        '&' => '&amp;',
                    ]
                );
            }

            if ($key_override !== null) {
                $key = $key_override;
            }
            $xml .= sprintf('<%1$s>%2$s</%1$s>', $key, $element);
        }

        return $xml;
    }

    public static function XMLToArray(\SimpleXMLElement $sxml)
    {
        $output = [];
        $singular_node_name = self::singularize($sxml->getName());

        foreach ($sxml->children() as $child_name => $child) {
            /**
             * @var \SimpleXMLElement
             */
            if ($child->count() > 0) {
                $node = self::XMLToArray($child);
            } else {
                $node = (string)$child;
            }

            //don't make it assoc, as the keys will all be the same
            if ($child_name === $singular_node_name ||
                //Handle strange XML
                ($singular_node_name === 'Tracking' && $child_name === TrackingCategory::getRootNodeName()) ||
                ($singular_node_name == TimesheetEarningsLine::getRootNodeName() && $child_name == 'EarningsLine')) {
                $output[] = $node;
            } else {
                $output[$child_name] = $node;
            }
        }

        return $output;
    }

    /**
     * This function is based on Wave\Inflector::singularize().
     * It only contains a fraction of the rules from its predecessor,
     * so only good for a quick basic singularisation.
     *
     * @param $string
     *
     * @return mixed
     */
    public static function singularize($string)
    {
        $singular = [
            '/(vert|ind)ices$/i' => '$1ex',
            '/(alias)es$/i' => '$1',
            '/(x|ch|ss|sh)es$/i' => '$1',
            '/(s)eries$/i' => '$1eries',
            '/(s)tatus$/i' => '$1tatus',
            '/([^aeiouy]|qu)ies$/i' => '$1y',
            '/([lr])ves$/i' => '$1f',
            '/([ti])a$/i' => '$1um',
            '/(us)es$/i' => '$1',
            '/(basis)$/i' => '$1',
            '/([^s])s$/i' => '$1',
        ];

        // check for matches using regular expressions
        foreach ($singular as $pattern => $result) {
            if (preg_match($pattern, $string)) {
                return preg_replace($pattern, $result, $string);
            }
        }

        //Else return
        return $string;
    }

    public static function pluralize($string)
    {
        $plural = [
            '/(quiz)$/i' => '$1zes',
            '/(matr|vert|ind)ix|ex$/i' => '$1ices',
            '/(x|ch|ss|sh)$/i' => '$1es',
            '/([^aeiouy]|qu)y$/i' => '$1ies',
            '/(hive)$/i' => '$1s',
            '/(?:([^f])fe|([lr])f)$/i' => '$1$2ves',
            '/(shea|lea|loa|thie)f$/i' => '$1ves',
            '/sis$/i' => 'ses',
            '/([ti])um$/i' => '$1a',
            '/(tomat|potat|ech|her|vet)o$/i' => '$1oes',
            '/(bu)s$/i' => '$1ses',
            '/(alias)$/i' => '$1es',
            '/(ax|test)is$/i' => '$1es',
            '/(us)$/i' => '$1es',
            '/s$/i' => 's',
            '/$/' => 's',
        ];

        // check for matches using regular expressions
        foreach ($plural as $pattern => $result) {
            if (preg_match($pattern, $string)) {
                return preg_replace($pattern, $result, $string);
            }
        }

        return $string;
    }

    public static function isAssoc(array $array)
    {
        return (bool)count(array_filter(array_keys($array), 'is_string'));
    }

    /**
     * Generic function to flatten an associative array into an arbitrarily
     * delimited string.
     *
     * @param array $array
     * @param string $format
     * @param string|null $glue
     * @param bool $escape
     *
     * @return array|string if no glue provided, it won't be imploded
     */
    public static function flattenAssocArray(
        array $array,
        $format,
        $glue = null,
        $escape = false
    ) {
        $pairs = [];
        foreach ($array as $key => $val) {
            if ($escape) {
                $key = self::escape($key);
                $val = self::escape($val);
            }
            $pairs[] = sprintf($format, $key, $val);
        }

        //Return array if no glue provided
        if ($glue === null) {
            return $pairs;
        }

        return implode($glue, $pairs);
    }

    /**
     * OAuth compliant escaping functions.
     * In php, as simple as rawurlencode().
     * There were a lot more seemingly redundant transformations in
     * the SimpleOAuth class.
     *
     * @param $string
     *
     * @return string
     */
    public static function escape($string)
    {
        return rawurlencode($string);
    }

    /**
     * @param $knownString string
     * @param $userInput string
     *
     * @return bool
     *
     * @see https://github.com/symfony/polyfill-php56
     */
    public static function hashEquals($knownString, $userInput)
    {
        if (PHP_VERSION_ID >= 50600) {
            return hash_equals($knownString, $userInput);
        }

        if (!is_string($knownString)) {
            trigger_error('Expected known_string to be a string, ' . gettype($knownString) . ' given', E_USER_WARNING);

            return false;
        }

        if (!is_string($userInput)) {
            trigger_error('Expected user_input to be a string, ' . gettype($userInput) . ' given', E_USER_WARNING);

            return false;
        }

        if (extension_loaded('mbstring')) {
            $knownLen = mb_strlen($knownString, '8bit');
            $userLen = mb_strlen($userInput, '8bit');
        } else {
            $knownLen = strlen($knownString);
            $userLen = strlen($userInput);
        }

        if ($knownLen !== $userLen) {
            return false;
        }

        $result = 0;

        for ($i = 0; $i < $knownLen; ++$i) {
            $result |= ord($knownString[$i]) ^ ord($userInput[$i]);
        }

        return $result === 0;
    }


    /**
     * @return string
     */
    public static function getPackageVersion()
    {
        if (!is_callable('\\Composer\\InstalledVersions::getPrettyVersion')) {
            return self::DEFAULT_VERSION;
        }

        return \Composer\InstalledVersions::getPrettyVersion(self::PACKAGE_NAME);
    }
}
