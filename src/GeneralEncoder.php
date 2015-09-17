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
 * @copyright 2015 ClaudioCardinale
 * @version 1.0.0
 */
abstract class GeneralEncoder
{

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
    {}
}