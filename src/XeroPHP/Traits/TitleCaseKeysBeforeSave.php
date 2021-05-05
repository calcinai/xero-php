<?php
namespace XeroPHP\Traits;

trait TitleCaseKeysBeforeSave
{
    /**
     * Transform all property keys
     *
     * @return array
     */
    public function transformKeysBeforeSave()
    {
        $properties = $this->getProperties();
        $data = [];

        foreach ($properties as $key => $value) {
            $data[ $key ] = ucfirst($key);
        }

        return $data;
    }
}
