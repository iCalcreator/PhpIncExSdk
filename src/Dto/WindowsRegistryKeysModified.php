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
 * The WindowsRegistryKeysModified class describes Windows operating system registry keys
 * and the operations that were performed on them.
 * This class was derived from [RFC5901].
 *
 * WindowsRegistryKeysModified MUST have at least one instance of Key
 */
class WindowsRegistryKeysModified extends DtoBase
{
    /**
     * Factory method with required property (one) key
     *
     * @param Key $key
     * @return static
     */
    public static function factoryKey( Key $key ) : static
    {
        return parent::factory()
            ->addKey( $key );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return $this->isKeySet();
    }

    /**
     * ATTRIBUTE
     *
     * Optional.  ID.
     * See Section 3.3.2.
     */
    use ObservableIdTrait;

    /**
     * Key
     *
     * One or more.
     * The Windows registry key.
     * See Section 3.23.1.
     *
     * @var Key[]
     */
    private array $key = [];

    /**
     * @return Key[]
     */
    public function getKey() : array
    {
        return $this->key;
    }

    /**
     * Return bool true if key is set
     *
     * @return bool
     */
    public function isKeySet() : bool
    {
        return ! empty( $this->key );
    }

    /**
     * @param Key $key
     * @return static
     */
    public function addKey( Key $key ) : static
    {
        $this->key[] = $key;
        return $this;
    }

    /**
     * @param null|Key[] $key
     * @return static
     */
    public function setKey( ? array $key = [] ) : static
    {
        $this->key = [];
        foreach( $key as $theKey ) {
            $this->addKey( $theKey );
        }
        return $this;
    }
}
