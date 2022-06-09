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

use Kigkonsult\PhpIncExSdk\Dto\Key as Dto;

class Key implements JsonInterface
{
    /**
     * Parse json array to populate new class Key implements JsonInterface

     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::REGISTRYACTION] )) {
            $dto->setRegistryaction( $jsonArray[self::REGISTRYACTION] );
        }
        if( isset( $jsonArray[self::EXT_REGISTRYACTION] )) {
            $dto->setExtRegistryaction( $jsonArray[self::EXT_REGISTRYACTION] );
        }
        if( isset( $jsonArray[self::OBSERVABLE_ID] )) {
            $dto->setObservableId( $jsonArray[self::OBSERVABLE_ID] );
        }
        if( isset( $jsonArray[self::KEYNAME] )) {
            $dto->setKeyName( $jsonArray[self::KEYNAME] );
        }
        if( isset( $jsonArray[self::KEYVALUE] )) {
            $dto->setKeyValue( $jsonArray[self::KEYVALUE] );
        }
        return $dto;
    }

    /**
     * Write Key Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isRegistryactionSet()) {
            $jsonArray[self::REGISTRYACTION] = $dto->getRegistryaction();
        }
        if( $dto->isExtRegistryactionSet()) {
            $jsonArray[self::EXT_REGISTRYACTION] = $dto->getExtRegistryaction();
        }
        if( $dto->isObservableIdSet()) {
            $jsonArray[self::OBSERVABLE_ID] = $dto->getObservableId();
        }
        if( $dto->isKeyNameSet()) {
            $jsonArray[self::KEYNAME] = $dto->getKeyName();
        }
        if( $dto->isKeyValueSet()) {
            $jsonArray[self::KEYVALUE] = $dto->getKeyValue();
        }

        return (object) $jsonArray;
    }
}