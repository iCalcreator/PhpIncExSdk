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

use Kigkonsult\PhpIncExSdk\Dto\ExtensionType as Dto;

class ExtensionType implements JsonInterface
{
    /**
     * Parse json array to populate new ExtensionType
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::LCNAME] )) {
            $dto->setName( $jsonArray[self::LCNAME] );
        }
        if( isset( $jsonArray[self::DTYPE] )) {
            $dto->setDtype( $jsonArray[self::DTYPE] );
        }
        if( isset( $jsonArray[self::EXT_DTYPE] )) {
            $dto->setExtDtype( $jsonArray[self::EXT_DTYPE] );
        }
        if( isset( $jsonArray[self::MEANING] )) {
            $dto->setMeaning( $jsonArray[self::MEANING] );
        }
        if( isset( $jsonArray[self::FORMATID] )) {
            $dto->setFormatid( $jsonArray[self::FORMATID] );
        }
        if( isset( $jsonArray[self::RESTRICTION] )) {
            $dto->setRestriction( $jsonArray[self::RESTRICTION] );
        }
        if( isset( $jsonArray[self::EXT_RESTRICTION] )) {
            $dto->setExtRestriction( $jsonArray[self::EXT_RESTRICTION] );
        }
        if( isset( $jsonArray[self::OBSERVABLE_ID] )) {
            $dto->setObservableId( $jsonArray[self::OBSERVABLE_ID] );
        }
        if( isset( $jsonArray[self::VALUE] )) {
            $dto->setValue( $jsonArray[self::VALUE] );
        }

        return $dto;
    }

    /**
     * Write ExtensionType Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isNameSet()) {
            $jsonArray[self::LCNAME] = $dto->getName();
        }
        if( $dto->isDtypeSet()) {
            $jsonArray[self::DTYPE] = $dto->getDtype();
        }
        if( $dto->isExtDtypeSet()) {
            $jsonArray[self::EXT_DTYPE] = $dto->getExtDtype();
        }
        if( $dto->isMeaningSet()) {
            $jsonArray[self::MEANING] = $dto->getMeaning();
        }
        if( $dto->isFormatidSet()) {
            $jsonArray[self::FORMATID] = $dto->getFormatid();
        }
        if( $dto->isRestrictionSet()) {
            $jsonArray[self::RESTRICTION] = $dto->getRestriction();
        }
        if( $dto->isExtRestrictionSet()) {
            $jsonArray[self::EXT_RESTRICTION] = $dto->getExtRestriction();
        }
        if( $dto->isObservableIdSet()) {
            $jsonArray[self::OBSERVABLE_ID] = $dto->getObservableId();
        }
        if( $dto->isValueSet()) {
            $jsonArray[self::VALUE] = $dto->getValue();
        }

        return (object) $jsonArray;
    }
}
