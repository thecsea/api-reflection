<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 17/09/15
 * Time: 14.44
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
 * Class JsonDecoder
 * @package it\thecsea\api_reflection
 * @author Claudio Cardinale <cardi@thecsea.it>
 * @copyright 2015 Claudio Cardinale
 * @version 1.0.0
 */
class JsonDecoder extends GeneralDecoder
{
    /**
     * Decode the data into a standard array that contains apiKey, class and method name and array of paramters
     * @param mixed $data
     * @return array
     */
    public function decodeData($data)
    {
        $decoded = json_decode($data, true);
        if(!self::isValid($decoded))
            throw new ApiReflectionException("Decode error (data)");
        return $decoded;
    }
}