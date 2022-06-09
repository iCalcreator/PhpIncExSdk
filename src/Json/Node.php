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
namespace Kigkonsult\PhpIncExSdk\Json;

use Exception;
use Kigkonsult\PhpIncExSdk\Dto\Node as Dto;

class Node implements JsonInterface
{
    /**
     * Parse json array to populate new Node
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     * @throws Exception
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::DOMAINDATA] )) {
            foreach( $jsonArray[self::DOMAINDATA] as $subJsonArray ) {
                $dto->addDomainData( DomainData::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::ADDRESS] )) {
            foreach( $jsonArray[self::ADDRESS] as $subJsonArray ) {
                $dto->addAddress( Address::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::POSTALADDRESS] )) {
            $dto->setPostalAddress( MLStringType::parse( $jsonArray[self::POSTALADDRESS] ));
        }
        if( isset( $jsonArray[self::LOCATION] )) {
            foreach( $jsonArray[self::LOCATION] as $subJsonArray ) {
                $dto->addLocation( MLStringType::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::COUNTER] )) {
            foreach( $jsonArray[self::COUNTER] as $subJsonArray ) {
                $dto->addCounter( Counter::parse( $subJsonArray ));
            }
        }
        return $dto;
    }

    /**
     * Write Node Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isDomainDataSet()) {
            $jsonArray[self::DOMAINDATA] = [];
            foreach( $dto->getDomainData() as $item ) {
                $jsonArray[self::DOMAINDATA][] = DomainData::write( $item );
            }
        }
        if( $dto->isAddressSet()) {
            $jsonArray[self::ADDRESS] = [];
            foreach( $dto->getAddress() as $item ) {
                $jsonArray[self::ADDRESS][] = Address::write( $item );
            }
        }
        if( $dto->isPostalAddressSet()) {
            $jsonArray[self::POSTALADDRESS] = MLStringType::write( $dto->getPostalAddress());
        }
        if( $dto->isLocationSet()) {
            $jsonArray[self::LOCATION] = [];
            foreach( $dto->getLocation() as $item ) {
                $jsonArray[self::LOCATION][] = MLStringType::write( $item );
            }
        }
        if( $dto->isCounterSet()) {
            $jsonArray[self::COUNTER] = [];
            foreach( $dto->getCounter() as $item ) {
                $jsonArray[self::COUNTER][] = Counter::write( $item );
            }
        }

        return (object) $jsonArray;
    }
}
