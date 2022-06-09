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

use Kigkonsult\PhpIncExSdk\Dto\Counter as Dto;

class Counter implements JsonInterface
{
    /**
     * Parse json array to populate new Counter
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
        if( isset( $jsonArray[self::UNIT] )) {
            $dto->setUnit( $jsonArray[self::UNIT] );
        }
        if( isset( $jsonArray[self::EXT_UNIT] )) {
            $dto->setExtUnit( $jsonArray[self::EXT_UNIT] );
        }
        if( isset( $jsonArray[self::MEANING] )) {
            $dto->setMeaning( $jsonArray[self::MEANING] );
        }
        if( isset( $jsonArray[self::DURATION] )) {
            $dto->setDuration( $jsonArray[self::DURATION] );
        }
        if( isset( $jsonArray[self::EXT_DURATION] )) {
            $dto->setExtDuration( $jsonArray[self::EXT_DURATION] );
        }
        if( isset( $jsonArray[self::VALUE] )) {
            $dto->setValue((float) $jsonArray[self::VALUE] );
        }

        return $dto;
    }

    /**
     * Write Counter Dto properties to json array
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
        if( $dto->isUnitSet()) {
            $jsonArray[self::UNIT] = $dto->getUnit();
        }
        if( $dto->isExtUnitSet()) {
            $jsonArray[self::EXT_UNIT] = $dto->getExtUnit();
        }
        if( $dto->isMeaningSet()) {
            $jsonArray[self::MEANING] = $dto->getMeaning();
        }
        if( $dto->isDurationSet()) {
            $jsonArray[self::DURATION] = $dto->getDuration();
        }
        if( $dto->isExtDurationSet()) {
            $jsonArray[self::EXT_DURATION] = $dto->getExtDuration();
        }
        if( $dto->isValueSet()) {
            $jsonArray[self::VALUE] = $dto->getValue();
        }

        return (object) $jsonArray;
    }
}
