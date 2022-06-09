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

use Kigkonsult\PhpIncExSdk\Dto\BasicStructure as Dto;

/**
 *
 */
class BasicStructure implements JsonInterface
{
    /**
     * Parse json array to populate new BasicStructure
     *
     * @param Dto $dto
     * @param string[]|string[][] $jsonArray
     * @return void
     */
    public static function parse( Dto $dto, array $jsonArray ) : void
    {
        if( isset( $jsonArray[self::SPECID] )) {
            $dto->setSpecId( $jsonArray[self::SPECID] );
        }
        if( isset( $jsonArray[self::EXT_SPECID] )) {
            $dto->setExtSpecId( $jsonArray[self::EXT_SPECID] );
        }
        if( isset( $jsonArray[self::CONTENTID] )) {
            $dto->setContentID( $jsonArray[self::CONTENTID] );
        }
        if( isset( $jsonArray[self::RAWDATA] )) {
            foreach( $jsonArray[self::RAWDATA] as $sub ) {
                $dto->addRawData( $sub );
            }
        }
        if( isset( $jsonArray[self::REFERENCE] )) {
            foreach( $jsonArray[self::REFERENCE] as $subJsonArray ) {
                $dto->addReference( Reference::parse( $subJsonArray ));
            }
        }
    }

    /**
     * Write Weakness Dto properties to json array
     *
     * @param Dto $dto
     * @param string[]|string[][] $jsonArray
     * @return void
     */
    public static function write( Dto $dto, array & $jsonArray ) : void
    {
        if( $dto->isSpecIdSet()) {
            $jsonArray[self::SPECID] = $dto->getSpecId();
        }
        if( $dto->isExtSpecIdSet()) {
            $jsonArray[self::EXT_SPECID] = $dto->getExtSpecId();
        }
        if( $dto->isContentIDSet()) {
            $jsonArray[self::CONTENTID] = $dto->getContentID();
        }
        if( $dto->isRawDataSet()) {
            $jsonArray[self::RAWDATA] = [];
            foreach( $dto->getRawData() as $item ) {
                $jsonArray[self::RAWDATA][] = $item;
            }
        }
        if( $dto->isReferenceSet()) {
            $jsonArray[self::REFERENCE] = [];
            foreach( $dto->getReference() as $item ) {
                $jsonArray[self::REFERENCE][] = Reference::write( $item );
            }
        }
    }
}
