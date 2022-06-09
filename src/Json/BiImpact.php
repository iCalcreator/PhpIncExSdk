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

use Kigkonsult\PhpIncExSdk\Dto\BiImpact as Dto;

class BiImpact implements JsonInterface
{
    /**
     * Parse json array to populate new BusinessBiImpact or IntendedBiImpact
     *
     * @param Dto $dto
     * @param string[]|string[][] $jsonArray
     * @return void
     */
    public static function parse( Dto $dto, array $jsonArray ) : void
    {
        if( isset( $jsonArray[self::SEVERITY] )) {
            $dto->setSeverity( $jsonArray[self::SEVERITY] );
        }
        if( isset( $jsonArray[self::EXT_SEVERITY] )) {
            $dto->setExtSeverity( $jsonArray[self::EXT_SEVERITY] );
        }
        if( isset( $jsonArray[self::TYPE] )) {
            $dto->setType( $jsonArray[self::TYPE] );
        }
        if( isset( $jsonArray[self::EXT_TYPE] )) {
            $dto->setExtType( $jsonArray[self::EXT_TYPE] );
        }
        if( isset( $jsonArray[self::DESCRIPTION] )) {
            foreach( $jsonArray[self::DESCRIPTION] as $subJsonArray ) {
                $dto->addDescription( MLStringType::parse( $subJsonArray ));
            }
        }
    }

    /**
     * Write BusinessBiImpact Dto properties to json array
     *
     * @param Dto $dto
     * @param string[]|string[][] $jsonArray
     * @return void
     */
    public static function write( Dto $dto, array & $jsonArray ) : void
    {
        if( $dto->isSeveritySet()) {
            $jsonArray[self::SEVERITY] = $dto->getSeverity();
        }
        if( $dto->isExtSeveritySet()) {
            $jsonArray[self::EXT_SEVERITY] = $dto->getExtSeverity();
        }
        if( $dto->isTypeSet()) {
            $jsonArray[self::TYPE] = $dto->getType();
        }
        if( $dto->isExtTypeSet()) {
            $jsonArray[self::EXT_TYPE] = $dto->getExtType();
        }
        if( $dto->isDescriptionSet()) {
            $jsonArray[self::DESCRIPTION] = [];
            foreach( $dto->getDescription() as $item ) {
                $jsonArray[self::DESCRIPTION][] = MLStringType::write( $item );
            }
        }
    }
}
