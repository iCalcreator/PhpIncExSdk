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

use Kigkonsult\PhpIncExSdk\Dto\RecordPattern as Dto;

class RecordPattern implements JsonInterface
{
    /**
     * Parse json array to populate new RecordPattern
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::TYPE] )) {
            $dto->setType( $jsonArray[self::TYPE] );
        }
        if( isset( $jsonArray[self::EXT_TYPE] )) {
            $dto->setExtType( $jsonArray[self::EXT_TYPE] );
        }
        if( isset( $jsonArray[self::OFFSET] )) {
            $dto->setOffset((int) $jsonArray[self::OFFSET] );
        }
        if( isset( $jsonArray[self::OFFSETUNIT] )) {
            $dto->setOffsetunit( $jsonArray[self::OFFSETUNIT] );
        }
        if( isset( $jsonArray[self::EXT_OFFSETUNIT] )) {
            $dto->setExtOffsetunit( $jsonArray[self::EXT_OFFSETUNIT] );
        }
        if( isset( $jsonArray[self::INSTANCE] )) {
            $dto->setInstance((int) $jsonArray[self::INSTANCE] );
        }
        if( isset( $jsonArray[self::VALUE] )) {
            $dto->setValue( $jsonArray[self::VALUE] );
        }
// 	value

        return $dto;
    }

    /**
     * Write RecordPattern Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isTypeSet()) {
            $jsonArray[self::TYPE] = $dto->getType();
        }
        if( $dto->isExtTypeSet()) {
            $jsonArray[self::EXT_TYPE] = $dto->getExtType();
        }
        if( $dto->isOffsetSet()) {
            $jsonArray[self::OFFSET] = $dto->getOffset();
        }
        if( $dto->isOffsetunitSet()) {
            $jsonArray[self::OFFSETUNIT] = $dto->getOffsetunit();
        }
        if( $dto->isExtOffsetunitSet()) {
            $jsonArray[self::EXT_OFFSETUNIT] = $dto->getExtOffsetunit();
        }
        if( $dto->isInstanceSet()) {
            $jsonArray[self::INSTANCE] = $dto->getInstance();
        }
        if( $dto->isValueSet()) {
            $jsonArray[self::VALUE] = $dto->getValue();
        }

        return (object) $jsonArray;
    }
}
