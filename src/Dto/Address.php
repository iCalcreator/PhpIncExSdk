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

use Kigkonsult\PhpIncExSdk\Dto\Traits\CategoryTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ContentValueTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtCategoryTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ObservableIdTrait;

/**
 * The Address class represents a hardware (Layer 2), network (Layer 3), or application (Layer 7) address.
 *
 * Address MUST have ATTRIBUTE(s) category and value
 */
class Address extends DtoBase
{
    /**
     * Factory method with required properties
     *
     * @param string $category
     * @param string $value
     * @return static
     */
    public static function factoryCategoryValue( string $category, string $value ) : static
    {
        return parent::factory()
            ->setCategory( $category )
            ->setValue( $value );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isCategorySet() && $this->isValueSet());
    }
    /**
     * ATTRIBUTE category
     *
     * Required.  ENUM.
     * The type of address represented.
     * The default value is "ipv6-addr".
     * These values are maintained in the "Address-category" IANA registry per Section 10.2.
     *    1.   asn.  Autonomous System Number.
     *    2.   atm.  Asynchronous Transfer Mode (ATM) address.
     *    3.   e-mail.  Email address, per the EMAIL data type.
     *    4.   ipv4-addr.  IPv4 host address in dotted-decimal notation (i.e., a.b.c.d).
     *    5.   ipv4-net.  IPv4 network address in dotted-decimal notation, slash, significant bits (i.e., a.b.c.d/nn).
     *    6.   ipv4-net-masked.  A sanitized IPv4 address with significant  bits per "ipv4-net"
     *                           but with the character 'x' replacing any digit(s) in the address or prefix.
     *    7.   ipv4-net-mask.  IPv4 network address in dotted-decimal notation, slash, network mask
     *                         in dotted-decimal notation (i.e., a.b.c.d/w.x.y.z).
     *    8.   ipv6-addr.  IPv6 host address per Section 4 of [RFC5952].
     *    9.   ipv6-net.  IPv6 network address, slash, prefix per Section 2.3 of [RFC4291].
     *    10.  ipv6-net-masked.  A sanitized IPv6 address and prefix per "ipv6-net"
     *                           but with the character 'x' replacing any hexadecimal digit(s) in the address or digit(s) in the prefix.
     *    11.  mac.  Media Access Control (MAC) address (i.e., aa:bb:cc:dd:ee:ff).
     *    12.  site-uri.  A URL or URI for a resource, per the URL data type.
     *    13.  ext-value.  A value used to indicate that this attribute is extended
     *                     and the actual value is provided using the corresponding ext-* attribute.  See Section 5.1.1.
     */
    use CategoryTrait;

    /**
     * ATTRIBUTE ext-category
     *
     * Optional.  STRING.
     * A means by which to extend the category attribute.
     * See Section 5.1.1.
     */
    use ExtCategoryTrait;

    /**
     * ATTRIBUTE  vlan-name
     *
     * Optional.  STRING.
     *
     * The name of the Virtual LAN to which the address belongs.
     *
     * @var string|null
     */
    private ? string $vlanName = null;

    /**
     * @return string|null
     */
    public function getVlanName() : ? string
    {
        return $this->vlanName;
    }

    /**
     * Return bool true if vlanName is set
     *
     * @return bool
     */
    public function isVlanNameSet() : bool
    {
        return ( null !== $this->vlanName );
    }

    /**
     * @param string|null $vlanName
     * @return static
     */
    public function setVlanName( ? string $vlanName = null ) : static
    {
        $this->vlanName = $vlanName;
        return $this;
    }

    /**
     * ATTRIBUTE vlan-num
     *
     * Optional.  INTEGER.
     * The number of the Virtual LAN to which the address belongs.
     *
     * @var int|null
     */
    private ? int $vlanNum = null;

    /**
     * @return int|null
     */
    public function getVlanNum() : ?int
    {
        return $this->vlanNum;
    }

    /**
     * Return bool true if vlanNum is set
     *
     * @return bool
     */
    public function isVlanNumSet() : bool
    {
        return ( null !== $this->vlanNum );
    }

    /**
     * @param int|null $vlanNum
     * @return static
     */
    public function setVlanNum( ? int $vlanNum = null ) : static
    {
        $this->vlanNum = $vlanNum;
        return $this;
    }

    /**
     * ATTRIBUTE observable-id
     *
     * Optional.  ID.
     * See Section 3.3.2.
     */
    use ObservableIdTrait;

    /**
     * Content name value
     *
     * The content of the class is an address of type STRING whose semantics are determined by the category attribute.
     */
    use ContentValueTrait;
}
