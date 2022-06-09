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

use Kigkonsult\PhpIncExSdk\Dto\IndicatorReference as Dto;

class IndicatorReference implements JsonInterface
{
    /**
     * Parse json array to populate new IndicatorReference
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::UID_REF] )) {
            $dto->setUidRef( $jsonArray[self::UID_REF] );
        }
        if( isset( $jsonArray[self::EUID_REF] )) {
            $dto->setEuidRef( $jsonArray[self::EUID_REF] );
        }
        if( isset( $jsonArray[self::VERSION] )) {
            $dto->setVersion( $jsonArray[self::VERSION] );
        }

        return $dto;
    }

    /**
     * Write IndicatorReference Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isUidRefSet()) {
            $jsonArray[self::UID_REF] = $dto->getUidRef();
        }
        if( $dto->isEuidRefSet()) {
            $jsonArray[self::EUID_REF] = $dto->getEuidRef();
        }
        if( $dto->isVersionSet()) {
            $jsonArray[self::VERSION] = $dto->getVersion();
        }

        return (object) $jsonArray;
    }
}
