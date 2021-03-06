<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 17/09/15
 * Time: 14.02
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
 * Class ApiReflection
 * @package it\thecsea\api_reflection
 * @author Claudio Cardinale <cardi@thecsea.it>
 * @copyright 2015 ClaudioCardinale
 * @version 1.0.0
 */
class ApiReflection
{
    /**
     * @var Object
     */
    private $defaultInstance;

    /**
     * ApiReflection constructor.
     * @param Object $defaultInstance instance used as default in every parsing if is not spceified another instance
     */
    public function __construct($defaultInstance = null)
    {
        $this->defaultInstance = $defaultInstance;
    }


    /**
     * @return Object
     */
    public function getDefaultInstance()
    {
        return $this->defaultInstance;
    }

    /**
     * @param Object $defaultInstance
     */
    public function setDefaultInstance($defaultInstance)
    {
        $this->defaultInstance = $defaultInstance;
    }
}