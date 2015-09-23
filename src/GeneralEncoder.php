<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 17/09/15
 * Time: 14.42
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
 * Class GeneralEncoder
 * @package it\thecsea\api_reflection
 * @author Claudio Cardinale <cardi@thecsea.it>
 * @copyright 2015 Claudio Cardinale
 * @version 1.0.0
 */
class GeneralEncoder
{
    const MATRIX = "matrix";
    const TEXT = "text";
    const GENERAL_RETURN = "generalReturn";

    /**
     * Encode the return of each method into a string
     * @param mixed $methodReturn return of method called by reflection
     * @return string
     */
    public function stringEncode($methodReturn)
    {
        ob_start();
        print_r($methodReturn);
        return ob_get_clean();
    }

    /**
     * Encode the return of each method into a associative matrix
     * @param mixed $methodReturn return of method called by reflection
     * @return array
     */
    public function matrixEncode($methodReturn)
    {
        return self::encodeData($methodReturn);
    }

    /**
     * Encode a complex/simple data into an array with information for each element
     * @param $data
     * @param $name
     * @return string
     * @see encodeElement
     */
    final static protected function encodeData($data, $name = self::GENERAL_RETURN){
        //encoding
        if(is_array($data)){
            $tmp = array();
            foreach($data as $key=>$value){
                $tmp[] = self::encodeData($value, $key);
            }
            return self::encodeElement($tmp, $name, self::MATRIX);
        }else{
            return self::encodeElement(self::TEXT, $name, $data);
        }
    }

    /**
     * encode an element (can be a complex element such as an array) into a array with name and type information
     * @param mixed $value
     * @param string $name
     * @param string $type
     * @return array
     */
    final static protected function encodeElement($value, $name = "", $type = self::TEXT)
    {
        return array("type"=>$type, "name"=>$name, "value"=>$value);
    }
}