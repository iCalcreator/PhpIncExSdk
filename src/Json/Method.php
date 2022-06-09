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

use Kigkonsult\PhpIncExSdk\Dto\Method as Dto;

class Method implements JsonInterface
{
    /**
     * Parse json array to populate new Method
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::RESTRICTION] )) {
            $dto->setRestriction( $jsonArray[self::RESTRICTION] );
        }
        if( isset( $jsonArray[self::EXT_RESTRICTION] )) {
            $dto->setExtRestriction( $jsonArray[self::EXT_RESTRICTION] );
        }
        if( isset( $jsonArray[self::REFERENCE] )) {
            foreach( $jsonArray[self::REFERENCE] as $subJsonArray ) {
                $dto->addReference( Reference::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::DESCRIPTION] )) {
            foreach( $jsonArray[self::DESCRIPTION] as $subJsonArray ) {
                $dto->addDescription( MLStringType::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::ATTACKPATTERN] )) {
            foreach( $jsonArray[self::ATTACKPATTERN] as $subJsonArray ) {
                $dto->addAttackPattern( AttackPattern::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::VULNERABILITY] )) {
            foreach( $jsonArray[self::VULNERABILITY] as $subJsonArray ) {
                $dto->addVulnerability( Vulnerability::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::WEAKNESS] )) {
            foreach( $jsonArray[self::WEAKNESS] as $subJsonArray ) {
                $dto->addWeakness( Weakness::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::ADDITIONALDATA] )) {
            foreach( $jsonArray[self::ADDITIONALDATA] as $subJsonArray ) {
                $dto->addAdditionalData( ExtensionType::parse( $subJsonArray ));
            }
        }

        return $dto;
    }

    /**
     * Write Method Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isRestrictionSet()) {
            $jsonArray[self::RESTRICTION] = $dto->getRestriction();
        }
        if( $dto->isExtRestrictionSet()) {
            $jsonArray[self::EXT_RESTRICTION] = $dto->getExtRestriction();
        }
        if( $dto->isReferenceSet()) {
            $jsonArray[self::REFERENCE] = [];
            foreach( $dto->getReference() as $item ) {
                $jsonArray[self::REFERENCE][] = Reference::write( $item );
            }
        }
        if( $dto->isDescriptionSet()) {
            $jsonArray[self::DESCRIPTION] = [];
            foreach( $dto->getDescription() as $item ) {
                $jsonArray[self::DESCRIPTION][] = MLStringType::write( $item );
            }
        }
        if( $dto->isAttackPatternSet()) {
            $jsonArray[self::ATTACKPATTERN] = [];
            foreach( $dto->getAttackPattern() as $item ) {
                $jsonArray[self::ATTACKPATTERN][] = AttackPattern::write( $item );
            }
        }
        if( $dto->isVulnerabilitySet()) {
            $jsonArray[self::VULNERABILITY] = [];
            foreach( $dto->getVulnerability() as $item ) {
                $jsonArray[self::VULNERABILITY][] = Vulnerability::write( $item );
            }
        }
        if( $dto->isWeaknessSet()) {
            $jsonArray[self::WEAKNESS] = [];
            foreach( $dto->getWeakness() as $item ) {
                $jsonArray[self::WEAKNESS][] = Weakness::write( $item );
            }
        }
        if( $dto->isAdditionalDataSet()) {
            $jsonArray[self::ADDITIONALDATA] = [];
            foreach( $dto->getAdditionalData() as $item ) {
                $jsonArray[self::ADDITIONALDATA][] = ExtensionType::write( $item );
            }
        }

        return (object) $jsonArray;
    }
}
