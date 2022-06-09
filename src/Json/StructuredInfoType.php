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

use Kigkonsult\PhpIncExSdk\Dto\StructuredInfoType as Dto;

class StructuredInfoType implements JsonInterface
{
    /**
     * Parse json array to populate new StructuredInfoType
     *
     * @param Dto $dto
     * @param string[]|string[][] $jsonArray
     * @return void
     */
    public static function parse( Dto $dto, array $jsonArray ) : void
    {
        BasicStructure::parse( $dto, $jsonArray );

        if( isset( $jsonArray[self::PLATFORM] )) {
            foreach( $jsonArray[self::PLATFORM] as $subJsonArray ) {
                $dto->addPlatform( Platform::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::SCORING] )) {
            foreach( $jsonArray[self::SCORING] as $subJsonArray ) {
                $dto->addScoring( Scoring::parse( $subJsonArray ));
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
        BasicStructure::write( $dto, $jsonArray );

        if( $dto->isPlatformSet()) {
            $jsonArray[self::PLATFORM] = [];
            foreach( $dto->getPlatform() as $item ) {
                $jsonArray[self::PLATFORM][] = Platform::write( $item );
            }
        }
        if( $dto->isScoringSet()) {
            $jsonArray[self::SCORING] = [];
            foreach( $dto->getScoring() as $item ) {
                $jsonArray[self::SCORING][] = Scoring::write( $item );
            }
        }
    }
}
