<?php
/**
 * Description of Abstract
 *
 * @author Sergio
 */
abstract class Aum_Abstract implements Aum_Interface {
    /**
     * @param array $properties
     * @param array $filter
     * @return array
     */
    protected function filterArray(array $properties, array $filter = array()) {
        return $this->filter($properties, $filter);
    }

    /**
     * @param array $properties
     * @param array $filter
     * @return array
     */
    private function filter(array $properties, array $filter = array()) {
        foreach ($properties as $property => $value) {
            if (!is_numeric($property) && in_array($property, $filter))
                unset($properties[$property]);
            else if (is_object($value) && $value instanceof Aum_Abstract)
                $properties[$property] = $value->toArray();
            else if (is_array($value))
                $properties[$property] = $this->filterArray($value);
        }
        return $properties;
    }
}
?>
