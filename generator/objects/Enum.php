<?php

class Enum {

    private $group;
    private $name;
    private $raw_name;
    private $anchor;

    private $values;

    /**
     * @var int Stores the current longest name for outputting padding
     */
    private $longest_name;

    /**
     * @param $group The doc group eg. Organisation
     * @param $name The doc subsection, used for the constant name
     * @param $anchor Any links found in the docs.  Used to track which values are being referred to
     * @param $raw_name Raw name as in docs, used for generating constant name
     */
    public function __construct($group, $name, $anchor, $raw_name){
        $this->group = $group;
        $this->name = $name;
        $this->raw_name = $raw_name;
        $this->anchor = $anchor;

        $this->longest_name = 0;
    }

    /**
     * Add a value to the Enum set.  This requires at least a name
     *
     * @param $name
     * @param $description
     */
    public function addValue($name, $description){
        $this->values[] = array(
            'name' => $name,
            'description' => $description
        );

        $name_length = strlen($name);
        if($name_length > $this->longest_name)
            $this->longest_name = $name_length;
    }

    /**
     * Get an array of arrays representing an enum value.  It contains a precomputed constant name with padding.
     *
     * @return array
     */
    public function getValues(){
        $values = array();
        foreach($this->values as $value){
            $values[] = array(
                'constant_name' => $this->getConstantName($value['name']),
                'value' => $value['name'],
                'description' > $value['description']
            );
        }
        return $values;
    }

    /**
     * Get a constant name for a value (using name of class etc)
     *
     * @param $value
     * @param bool $with_padding
     * @return string
     */
    public function getConstantName($value, $with_padding = true){
        $constant_name = strtoupper(sprintf('%s_%s', preg_replace('/[^a-z0-9]+/i', '_', trim($this->getConstantPrefix())), preg_replace('/[^a-z0-9]+/i', '_', $value)));

        if($with_padding !== true)
            return $constant_name;

        $padding = str_repeat(' ', $this->longest_name - strlen($value));
        return $constant_name.$padding;
    }

    /**
     * Get the prefix for the constant name generation and strip out 'Types'
     * eg. XERO_USER_ROLE
     *
     * @return mixed
     */
    public function getConstantPrefix(){
        return \XeroPHP\Helpers::singularize(preg_replace('/(\btype(s)?)$/', '', $this->raw_name));
    }

    /**
     * Getter for Enum group
     *
     * @return mixed
     */
    public function getGroup(){
        return $this->group;
    }

    /**
     * Getter for Enum name
     *
     * @return mixed
     */
    public function getName(){
        return $this->name;
    }

    /**
     * Getter for Enum anchor
     *
     * @return mixed
     */
    public function getAnchor(){
        return $this->anchor;
    }

} 