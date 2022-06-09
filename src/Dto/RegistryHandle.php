<?php
/**
 * PhpIncExSdk is the PHP SDK implementation of rfc8727,
 *            JSON Binding of the Incident Object Description Exchange Format (rfc7970)
 *
 * This file is a part of PhpIncExSdk.
 *
 * @author    Kjell-Inge Gustafsson, kigkonsult <ical@kigkonsult.se>
 * @copyright 2022 Kjell-Inge Gustafsson, kigkonsult, All rights reserved
 * @link      https://kigkonsult.se
 * @license   Subject matter of licence is the software PhpIncExSdk.
 *            The above copyright, link, package and this licence notice shall
 *            be included in all copies or substantial portions of the PhpIncExSdk.
 *
 *            PhpIncExSdk is free software: you can redistribute it and/or modify
 *            it under the terms of the GNU Lesser General Public License as
 *            published by the Free Software Foundation, either version 3 of
 *            the License, or (at your option) any later version.
 *
 *            PhpIncExSdk is distributed in the hope that it will be useful,
 *            but WITHOUT ANY WARRANTY; without even the implied warranty of
 *            MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *            GNU Lesser General Public License for more details.
 *
 *            You should have received a copy of the GNU Lesser General Public License
 *            along with PhpIncExSdk. If not, see <https://www.gnu.org/licenses/>.
 */
declare( strict_types = 1 );
namespace Kigkonsult\PhpIncExSdk\Dto;

/**
 * The RegistryHandle class represents a handle into an Internet registry or community-specific database.
 *
 * RegistryHandle MUST have ATTRIBUTE(s) registry
 */
class RegistryHandle extends DtoBase
{
    /**
     * Factory method with required property registry
     *
     * @param string $registry
     * @return static
     */
    public static function factoryRegistry( string $registry ) : static
    {
        return parent::factory()
            ->setRegistry( $registry );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return $this->isRegistrySet();
    }

    /**
     * ATTRIBUTE registry
     *
     * Required.  ENUM.
     * The database to which the handle belongs.
     * These values are maintained in the "RegistryHandle-registry" IANA registry per Section 10.2.
     * The possible values are:
     *    1.  internic.  Internet Network Information Center
     *    2.  apnic.  Asia Pacific Network Information Center
     *    3.  arin.  American Registry for Internet Numbers
     *    4.  lacnic.  Latin American and Caribbean Internet Addresses Registry
     *    5.  ripe.  Reseaux IP Europeens
     *    6.  afrinic.  African Network Information Center
     *    7.  local.  A database local to the CSIRT
     *    8.  ext-value.  A value used to indicate that this attribute is extended and the actual value is
     *                    provided using the corresponding ext-* attribute.  See Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $registry = null;

    /**
     * @return string|null
     */
    public function getRegistry() : ? string
    {
        return $this->registry;
    }

    /**
     * Return bool true if registry is set
     *
     * @return bool
     */
    public function isRegistrySet() : bool
    {
        return ( null !== $this->registry );
    }

    /**
     * @param string|null $registry
     * @return static
     */
    public function setRegistry( ? string $registry = null ) : static
    {
        $this->registry = $registry;
        return $this;
    }

    /**
     * ATTRIBUTE ext-registry
     *
     * Optional.  STRING.
     * A means by which to extend the registry attribute.
     * See Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $extRegistry = null;

    /**
     * @return string|null
     */
    public function getExtRegistry() : ? string
    {
        return $this->extRegistry;
    }

    /**
     * Return bool true if extRegistry is set
     *
     * @return bool
     */
    public function isExtRegistrySet() : bool
    {
        return ( null !== $this->extRegistry );
    }

    /**
     * @param string|null $extRegistry
     * @return static
     */
    public function setExtRegistry( ? string $extRegistry = null ) : static
    {
        $this->extRegistry = $extRegistry;
        return $this;
    }

    /**
     * Content
     *
     * The content of the class is a handle into a registry of type STRING.
     */
    /**
     * @var string|null
     */
    private ? string $handle = null;

    /**
     * @return string|null
     */
    public function getHandle() : ? string
    {
        return $this->handle;
    }

    /**
     * Return bool true if handle is set
     *
     * @return bool
     */
    public function isHandleSet() : bool
    {
        return ( null !== $this->handle );
    }

    /**
     * @param string|null $handle
     * @return static
     */
    public function setHandle( ? string $handle = null ) : static
    {
        $this->handle = $handle;
        return $this;
    }
}
