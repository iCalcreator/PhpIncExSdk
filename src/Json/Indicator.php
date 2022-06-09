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
use Kigkonsult\PhpIncExSdk\Dto\Indicator as Dto;

class Indicator implements JsonInterface
{
    /**
     * Parse json array to populate new Indicator
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     * @throws Exception
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
        if( isset( $jsonArray[self::INDICATORID] )) {
            $dto->setIndicatorID( IndicatorID::parse( $jsonArray[self::INDICATORID] ));
        }
        if( isset( $jsonArray[self::ALTERNATIVEINDICATORID] )) {
            foreach( $jsonArray[self::ALTERNATIVEINDICATORID] as $subJsonArray ) {
                $dto->addAlternativeIndicatorID( AlternativeIndicatorID::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::DESCRIPTION] )) {
            foreach( $jsonArray[self::DESCRIPTION] as $subJsonArray ) {
                $dto->addDescription( MLStringType::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::STARTTIME] )) {
            $dto->setStartTime( $jsonArray[self::STARTTIME] );
        }
        if( isset( $jsonArray[self::ENDTIME] )) {
            $dto->setEndTime( $jsonArray[self::ENDTIME] );
        }
        if( isset( $jsonArray[self::CONFIDENCE] )) {
            $dto->setConfidence( Confidence::parse( $jsonArray[self::CONFIDENCE] ));
        }
        if( isset( $jsonArray[self::CONTACT] )) {
            foreach( $jsonArray[self::CONTACT] as $subJsonArray ) {
                $dto->addContact( Contact::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::OBSERVABLE] )) {
            $dto->setObservable( Observable::parse( $jsonArray[self::OBSERVABLE] ));
        }
        if( isset( $jsonArray[self::UID_REF] )) {
            $dto->setUidRef( $jsonArray[self::UID_REF] );
        }
        if( isset( $jsonArray[self::INDICATOREXPRESSION] )) {
            $dto->setIndicatorExpression( IndicatorExpression::parse( $jsonArray[self::INDICATOREXPRESSION] ));
        }
        if( isset( $jsonArray[self::INDICATORREFERENCE] )) {
            $dto->setIndicatorReference( IndicatorReference::parse( $jsonArray[self::INDICATORREFERENCE] ));
        }
        if( isset( $jsonArray[self::NODEROLE] )) {
            foreach( $jsonArray[self::NODEROLE] as $subJsonArray ) {
                $dto->addNodeRole( NodeRole::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::ATTACKPHASE] )) {
            foreach( $jsonArray[self::ATTACKPHASE] as $subJsonArray ) {
                $dto->addAttackPhase( AttackPhase::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::REFERENCE] )) {
            foreach( $jsonArray[self::REFERENCE] as $subJsonArray ) {
                $dto->addReference( Reference::parse( $subJsonArray ));
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
     * Write Indicator Dto properties to json array
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
        if( $dto->isIndicatorIDSet()) {
            $jsonArray[self::INDICATORID] = IndicatorID::write( $dto->getIndicatorID());
        }
        if( $dto->isAlternativeIndicatorIDSet()) {
            $jsonArray[self::ALTERNATIVEINDICATORID] = [];
            foreach( $dto->getAlternativeIndicatorID() as $item ) {
                $jsonArray[self::ALTERNATIVEINDICATORID][] = AlternativeIndicatorID::write( $item );
            }
        }
        if( $dto->isDescriptionSet()) {
            $jsonArray[self::DESCRIPTION] = [];
            foreach( $dto->getDescription() as $item ) {
                $jsonArray[self::DESCRIPTION][] = MLStringType::write( $item );
            }
        }
        if( $dto->isStartTimeSet()) {
            $jsonArray[self::STARTTIME] = $dto->getStartTime();
        }
        if( $dto->isEndTimeSet()) {
            $jsonArray[self::ENDTIME] = $dto->getEndTime();
        }
        if( $dto->isConfidenceSet()) {
            $jsonArray[self::CONFIDENCE] = Confidence::write( $dto->getConfidence());
        }
        if( $dto->isContactSet()) {
            $jsonArray[self::CONTACT] = [];
            foreach( $dto->getContact() as $item ) {
                $jsonArray[self::CONTACT][] = Contact::write( $item );
            }
        }
        if( $dto->isObservableSet()) {
            $jsonArray[self::OBSERVABLE] = Observable::write( $dto->getObservable());
        }
        if( $dto->isUidRefSet()) {
            $jsonArray[self::UID_REF] = $dto->getUidRef();
        }
        if( $dto->isIndicatorExpressionSet()) {
            $jsonArray[self::INDICATOREXPRESSION] = IndicatorExpression::write( $dto->getIndicatorExpression());
        }
        if( $dto->isIndicatorReferenceSet()) {
            $jsonArray[self::INDICATORREFERENCE] = IndicatorReference::write( $dto->getIndicatorReference());
        }
        if( $dto->isNodeRoleSet()) {
            $jsonArray[self::NODEROLE] = [];
            foreach( $dto->getNodeRole() as $item ) {
                $jsonArray[self::NODEROLE][] = NodeRole::write( $item );
            }
        }
        if( $dto->isAttackPhaseSet()) {
            $jsonArray[self::ATTACKPHASE] = [];
            foreach( $dto->getAttackPhase() as $item ) {
                $jsonArray[self::ATTACKPHASE][] = AttackPhase::write( $item );
            }
        }
        if( $dto->isReferenceSet()) {
            $jsonArray[self::REFERENCE] = [];
            foreach( $dto->getReference() as $item ) {
                $jsonArray[self::REFERENCE][] = Reference::write( $item );
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
