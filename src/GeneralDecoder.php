<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 17/09/15
 * Time: 14.43
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

namespace it\thecsea\api_reflection;

/**
 * Class GeneralDecoder
 * @package it\thecsea\api_reflection
 * @author Claudio Cardinale <cardi@thecsea.it>
 * @copyright 2015 Claudio Cardinale
 * @version 1.0.0
 */
class GeneralDecoder
{
    /**
     * standard keys, the type is indicated as value
     * @var string[]
     */
    static private $keys = array('apiKey'=>"string", "class"=>"string", "method"=>"string", "parameters"=>"array");

    /**
     * get the array of return keys
     * @return \string[]
     */
    final static protected function getKeys()
    {
        return self::$keys;
    }

    /**
     * Decode the data into a standard array that contains apiKey, class and method name and array of paramters
     * @param mixed $data
     * @return array
     * @throws ApiReflectionException
     */
    public function decodeData($data)
    {
        if(is_array($data) || $data == "")
            throw new ApiReflectionException("Decode error (data)");
        return array('apiKey'=>"", "class"=>"", "method"=>$data, "parameters" =>array());
    }


    /**
     * check if the keys of an array for return is valid
     * @param array $data
     * @return bool true if and only if the array is standard
     */
    protected static function isValid($data)
    {
        return self::arrayEquals(array_keys($data),array_keys(self::getKeys())) && self::checkTypes($data, self::$keys);
    }

    /**
     * check if two array are equals even if the elements order is different
     * @param array $a
     * @param array $b
     * @return bool true if the two array are equals
     */
    final protected static function arrayEquals($a, $b) {
        return (is_array($a) && is_array($b) && array_diff($a, $b) === array_diff($b, $a));
    }

    /**
     * check if data follow the types indicated in $types
     * @param array $data
     * @param array $types
     * @return bool true if the check is ok
     */
    final protected static function checkTypes($data, $types)
    {
        foreach($data as $key=>$value) {
            if ($types[$key] == "array") {
                if (!is_array($value)) {
                    return false;
                }
            } else {
                if (is_array($value)) {
                    return false;
                }
            }
        }
        return true;
    }
}