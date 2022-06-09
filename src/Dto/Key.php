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

use Kigkonsult\PhpIncExSdk\Dto\Traits\ObservableIdTrait;

/**
 * The Key class describes a Windows operating system registry key name and value pair,
 * as well as the operation performed on it.
 *
 * Key MUST have at least one instance of KeyName
 */
class Key extends DtoBase
{
    /**
     * Factory method with required property KeyName
     *
     * @param string $keyName
     * @return static
     */
    public static function factoryKeyName( string $keyName ) : static
    {
        return parent::factory()
            ->setKeyName( $keyName );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return $this->isKeyNameSet();
    }

    /**
     * ATTRIBUTE  registryaction
     *
     * Optional.  ENUM.
     * The type of action taken on the registry key.
     * These values are maintained in the "Key-registryaction" IANA registry per Section 10.2.
     *    1.  add-key.  Registry key added.
     *    2.  add-value.  Value added to a registry key.
     *    3.  delete-key.  Registry key deleted.
     *    4.  delete-value.  Value deleted from a registry key.
     *    5.  modify-key.  Registry key modified.
     *    6.  modify-value.  Value modified in a registry key.
     *    7.  ext-value.  A value used to indicate that this attribute is extended and the actual value
     *                    is provided using the corresponding ext-* attribute.  See (rfc7970) Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $registryaction = null;

    /**
     * @return string|null
     */
    public function getRegistryaction() : ? string
    {
        return $this->registryaction;
    }

    /**
     * Return bool true if registryaction is set
     *
     * @return bool
     */
    public function isRegistryactionSet() : bool
    {
        return ( null !== $this->registryaction );
    }

    /**
     * @param string|null $registryaction
     * @return static
     */
    public function setRegistryaction( ? string $registryaction = null ) : static
    {
        $this->registryaction = $registryaction;
        return $this;
    }

    /**
     * ATTRIBUTE ext-registryaction
     *
     * Optional.  STRING.
     * A means by which to extend the registryaction attribute.  See (rfc7970) Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $extRegistryaction = null;

    /**
     * @return string|null
     */
    public function getExtRegistryaction() : ? string
    {
        return $this->extRegistryaction;
    }

    /**
     * Return bool true if extRegistryaction is set
     *
     * @return bool
     */
    public function isExtRegistryactionSet() : bool
    {
        return ( null !== $this->extRegistryaction );
    }

    /**
     * @param string|null $extRegistryaction
     * @return static
     */
    public function setExtRegistryaction( ? string $extRegistryaction = null ) : static
    {
        $this->extRegistryaction = $extRegistryaction;
        return $this;
    }

    /**
     * ATTRIBUTE observable-id
     *
     * Optional.  ID.
     * See (rfc7970) Section 3.3.2.
     */
    use ObservableIdTrait;

    /**
     * KeyName
     *
     * One.  STRING.
     * The name of a Windows operating system registry key (e.g., [HKEY_LOCAL_MACHINE\SoftwareType\Test\KeyName]).
     *
     * @var string|null
     */
    private ? string $keyName = null;

    /**
     * @return string|null
     */
    public function getKeyName() : ? string
    {
        return $this->keyName;
    }

    /**
     * Return bool true if keyName is set
     *
     * @return bool
     */
    public function isKeyNameSet() : bool
    {
        return ( null !== $this->keyName );
    }

    /**
     * @param string|null $keyName
     * @return static
     */
    public function setKeyName( ? string $keyName = null ) : static
    {
        $this->keyName = $keyName;
        return $this;
    }

    /**
     * KeyValue
     *
     * Zero or one.  STRING.
     * The value of the registry key identified in the KeyName class encoded per the .reg file format [KB310516].
     *
     * @var string|null
     */
    private ? string $keyValue = null;

    /**
     * @return string|null
     */
    public function getKeyValue() : ? string
    {
        return $this->keyValue;
    }

    /**
     * Return bool true if keyValue is set
     *
     * @return bool
     */
    public function isKeyValueSet() : bool
    {
        return ( null !== $this->keyValue );
    }

    /**
     * @param string|null $keyValue
     * @return static
     */
    public function setKeyValue( ? string $keyValue = null ) : static
    {
        $this->keyValue = $keyValue;
        return $this;
    }
}
