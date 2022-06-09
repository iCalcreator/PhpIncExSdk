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

/**
 * The Nameservers class describes the nameservers associated with a given domain.
 *
 * Nameservers MUST have at least one instance of Server and Address
 */
class Nameservers extends DtoBase
{
    /**
     * Factory method with required properties Server and (one) Address
     *
     * @param string $server
     * @param Address $address
     * @return static
     */
    public static function factoryServerAddress( string $server, Address $address ) : static
    {
        return parent::factory()
            ->setServer( $server )
            ->addAddress( $address );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isServerSet() && $this->isAddressSet());
    }
    /**
     * Server
     *
     * One.  STRING.
     * The domain name of the nameserver.
     *
     * @var string|null
     */
    private ? string $server = null;

    /**
     * @return string|null
     */
    public function getServer() : ? string
    {
        return $this->server;
    }

    /**
     * Return bool true if server is set
     *
     * @return bool
     */
    public function isServerSet() : bool
    {
        return ( null !== $this->server );
    }

    /**
     * @param string|null $server
     * @return static
     */
    public function setServer( ? string $server = null ) : static
    {
        $this->server = $server;
        return $this;
    }

    /**
     * Address
     *
     * One or more.
     * The address of the nameserver.
     * The value of the category attribute MUST be either "ipv4-addr" or "ipv6-addr".
     * See (rfc7970) Section 3.18.1.
     */
    use AddressManyTrait;
}
