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

use Kigkonsult\PhpIncExSdk\Dto\HashData as Dto;

class HashData implements JsonInterface
{
    /**
     * Parse json array to populate new HashData
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::SCOPE] )) {
            $dto->setScope( $jsonArray[self::SCOPE] );
        }
        if( isset( $jsonArray[self::HASHTARGETID] )) {
            $dto->setHashTargetID( $jsonArray[self::HASHTARGETID] );
        }
        if( isset( $jsonArray[self::HASH] )) {
            foreach( $jsonArray[self::HASH] as $subJsonArray ) {
                $dto->addHash( Hash::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::FUZZYHASH] )) {
            foreach( $jsonArray[self::FUZZYHASH] as $subJsonArray ) {
                $dto->addFuzzyHash( FuzzyHash::parse( $subJsonArray ));
            }
        }

        return $dto;
    }

    /**
     * Write AleHashDatart Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isScopeSet()) {
            $jsonArray[self::SCOPE] = $dto->getScope();
        }
        if( $dto->isHashTargetIDSet()) {
            $jsonArray[self::HASHTARGETID] = $dto->getHashTargetID();
        }
        if( $dto->isHashSet()) {
            $jsonArray[self::HASH] = [];
            foreach( $dto->getHash() as $item ) {
                $jsonArray[self::HASH][] = Hash::write( $item );
            }
        }
        if( $dto->isFuzzyHashSet()) {
            $jsonArray[self::FUZZYHASH] = [];
            foreach( $dto->getFuzzyHash() as $item ) {
                $jsonArray[self::FUZZYHASH][] = FuzzyHash::write( $item );
            }
        }

        return (object) $jsonArray;
    }
}
