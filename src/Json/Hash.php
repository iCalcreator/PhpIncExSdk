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

use Kigkonsult\PhpIncExSdk\Dto\Hash as Dto;

class Hash implements JsonInterface
{
    /**
     * Parse json array to populate new Hash
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::DIGESTMETHOD] )) {
            $dto->setDigestMethod( $jsonArray[self::DIGESTMETHOD] );
        }
        if( isset( $jsonArray[self::DIGESTVALUE] )) {
            $dto->setDigestValue( $jsonArray[self::DIGESTVALUE] );
        }
        if( isset( $jsonArray[self::CANONICALIZATIONMETHOD] )) {
            $dto->setCanonicalizationMethod( $jsonArray[self::CANONICALIZATIONMETHOD] );
        }
        if( isset( $jsonArray[self::APPLICATION] )) {
            $dto->setApplication( SoftwareType::parse( $jsonArray[self::APPLICATION] ));
        }

        return $dto;
    }

    /**
     * Write Hash Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isDigestMethodSet()) {
            $jsonArray[self::DIGESTMETHOD] = $dto->getDigestMethod();
        }
        if( $dto->isDigestValueSet()) {
            $jsonArray[self::DIGESTVALUE] = $dto->getDigestValue();
        }
        if( $dto->isCanonicalizationMethodSet()) {
            $jsonArray[self::CANONICALIZATIONMETHOD] = $dto->getCanonicalizationMethod();
        }
        if( $dto->isApplicationSet()) {
            $jsonArray[self::APPLICATION] = SoftwareType::write( $dto->getApplication() );
        }

        return (object) $jsonArray;
    }
}
