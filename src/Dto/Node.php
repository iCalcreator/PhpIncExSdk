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

use Kigkonsult\PhpIncExSdk\Dto\Traits\AddressManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\CounterManyTrait;

/**
 * The Node class identifies a system, asset, or network and its location.
 *
 * If a DomainData is not provided, at least one Address MUST be specified
 * If an Address is not provided, at least one DomainData MUST be specified.
 */
class Node extends DtoBase
{
    /**
     * Factory method with property Address
     *
     * @param Address $address
     * @return static
     */
    public static function factoryAddress( Address $address ) : static
    {
        return parent::factory()
            ->addAddress( $address );
    }

    /**
     * Factory method with property DomainData
     *
     * @param DomainData $domainData
     * @return static
     */
    public static function factoryDomainData( DomainData $domainData ) : static
    {
        return parent::factory()
            ->addDomainData( $domainData );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isDomainDataSet() || $this->isAddressSet());
    }

    /**
     * DomainData
     *
     * Zero or more.
     * The domain (DNS) information associated with this node.
     * If an Address is not provided, at least one DomainData MUST be specified.
     * See Section 3.19.
     *
     * @var DomainData[]
     */
    private array $domainData = [];

    /**
     * @return DomainData[]
     */
    public function getDomainData() : array
    {
        return $this->domainData;
    }

    /**
     * Return bool true if domainData is set
     *
     * @return bool
     */
    public function isDomainDataSet() : bool
    {
        return ! empty( $this->domainData );
    }

    /**
     * @param DomainData $domainData
     * @return static
     */
    public function addDomainData( DomainData $domainData ) : static
    {
        $this->domainData[] = $domainData;
        return $this;
    }

    /**
     * @param null|DomainData[] $domainData
     * @return static
     */
    public function setDomainData( ? array $domainData = [] ) : static
    {
        $this->domainData = [];
        foreach( $domainData as $theDomainData ) {
            $this->addDomainData( $theDomainData );
        }
        return $this;
    }

    /**
     * Address
     *
     * Zero or more.
     * The hardware, network, or application address of the node.
     * If a DomainData is not provided, at least one Address MUST be specified.  See Section 3.18.1.
     */
    use AddressManyTrait;

    /**
     * PostalAddress
     *
     * Zero or one.  POSTAL.
     * The postal address of the node.
     * The POSTAL data type is implemented in the data model as an "iodef:MLStringType" type.
     *
     */
    /**
     * @var MLStringType|null
     */
    private ? MLStringType $postalAddress = null;

    /**
     * @return MLStringType|null
     */
    public function getPostalAddress() : ? MLStringType
    {
        return $this->postalAddress;
    }

    /**
     * Return bool true if postalAddress is set
     *
     * @return bool
     */
    public function isPostalAddressSet() : bool
    {
        return ( null !== $this->postalAddress );
    }

    /**
     * @param MLStringType|null $postalAddress
     * @return static
     */
    public function setPostalAddress( ? MLStringType $postalAddress ) : static
    {
        $this->postalAddress = $postalAddress;
        return $this;
    }

    /**
     * Location
     *
     * Zero or more.  ML_STRING.
     * A free-form text description of the physical location of the node.
     * This description may provide a more detailed description of where at the address specified by the
     * PostalAddress class this node is found (e.g., room number, rack number, or slot number in a chassis).
     *
     * @var MLStringType[]
     */
    protected array $location = [];

    /**
     * @return MLStringType[]
     */
    public function getLocation() : array
    {
        return $this->location;
    }

    /**
     * Return bool true if location is not empty
     *
     * @return bool
     */
    public function isLocationSet() : bool
    {
        return ! empty( $this->location );
    }

    /**
     * @param MLStringType $location
     * @return static
     */
    public function addLocation( MLStringType $location ) : static
    {
        $this->location[] = $location;
        return $this;
    }

    /**
     * @param null|MLStringType[] $location
     * @return static
     */
    public function setLocation( ? array $location = [] ) : static
    {
        $this->location = [];
        foreach( $location as $theLocation) {
            $this->addLocation( $theLocation );
        }
        return $this;
    }

    /**
     * Counter
     *
     * Zero or more.
     * A counter with which to summarize properties of this host or network.
     * See Section 3.18.3.
     */
    use CounterManyTrait;
}
