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
namespace Kigkonsult\PhpIncExSdk\Dto\Traits;

use Kigkonsult\PhpIncExSdk\Dto\Address;

trait AddressManyTrait
{
    /**
     * @var Address[]
     */
    private array $address = [];

    /**
     * @return Address[]
     */
    public function getAddress() : array
    {
        return $this->address;
    }

    /**
     * Return bool true if address is set
     *
     * @return bool
     */
    public function isAddressSet() : bool
    {
        return ! empty( $this->address );
    }

    /**
     * @param Address $address
     * @return static
     */
    public function addAddress( Address $address ) : static
    {
        $this->address[] = $address;
        return $this;
    }

    /**
     * @param Address[] $address
     * @return static
     */
    public function setAddress( ? array $address = [] ) : static
    {
        $this->address = [];
        foreach( $address as $theAddress ) {
            $this->addAddress( $theAddress );
        }
        return $this;
    }
}
