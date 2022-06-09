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

use Exception;
use Kigkonsult\PhpIncExSdk\Dto\Expectation as Dto;

class Expectation implements JsonInterface
{
    /**
     * Parse json array to populate new Expectation
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     * @throws Exception
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::ACTION] )) {
            $dto->setAction( $jsonArray[self::ACTION] );
        }
        if( isset( $jsonArray[self::EXT_ACTION] )) {
            $dto->setExtAction( $jsonArray[self::EXT_ACTION] );
        }
        if( isset( $jsonArray[self::SEVERITY] )) {
            $dto->setSeverity( $jsonArray[self::SEVERITY] );
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
        if( isset( $jsonArray[self::DESCRIPTION] )) {
            foreach( $jsonArray[self::DESCRIPTION] as $subJsonArray ) {
                $dto->addDescription( MLStringType::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::DEFINEDCOA] )) {
            foreach( $jsonArray[self::DEFINEDCOA] as $sub ) {
                $dto->addDefinedCOA( $sub );
            }
        }
        if( isset( $jsonArray[self::STARTTIME] )) {
            $dto->setStartTime( $jsonArray[self::STARTTIME] );
        }
        if( isset( $jsonArray[self::ENDTIME] )) {
            $dto->setEndTime( $jsonArray[self::ENDTIME] );
        }
        if( isset( $jsonArray[self::CONTACT] )) {
            $dto->setContact( Contact::parse( $jsonArray[self::CONTACT] ));
        }

        return $dto;
    }

    /**
     * Write Expectation Dto properties to json array
     *
     * @param Dto $dto
     * @return  object
     */
    public static function write( Dto $dto ) :  object
    {
        $jsonArray = [];

        if( $dto->isActionSet()) {
            $jsonArray[self::ACTION] = $dto->getAction();
        }
        if( $dto->isExtActionSet()) {
            $jsonArray[self::EXT_ACTION] = $dto->getExtAction();
        }
        if( $dto->isSeveritySet()) {
            $jsonArray[self::SEVERITY] = $dto->getSeverity();
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
        if( $dto->isDescriptionSet()) {
            $jsonArray[self::DESCRIPTION] = [];
            foreach( $dto->getDescription() as $item ) {
                $jsonArray[self::DESCRIPTION][] = MLStringType::write( $item );
            }
        }
        if( $dto->isdefinedCOASet()) {
            $jsonArray[self::DEFINEDCOA] = [];
            foreach( $dto->getDefinedCOA() as $item ) {
                $jsonArray[self::DEFINEDCOA][] = $item;
            }
        }
        if( $dto->isStartTimeSet()) {
            $jsonArray[self::STARTTIME] = $dto->getStartTime();
        }
        if( $dto->isEndTimeSet()) {
            $jsonArray[self::ENDTIME] = $dto->getEndTime();
        }
        if( $dto->isContactSet()) {
            $jsonArray[self::CONTACT] = Contact::write( $dto->getContact());
        }

        return (object) $jsonArray;
    }
}