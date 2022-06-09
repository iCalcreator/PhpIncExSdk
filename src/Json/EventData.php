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
use Kigkonsult\PhpIncExSdk\Dto\EventData as Dto;

class EventData implements JsonInterface
{
    /**
     * Parse json array to populate new EventData
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
        if( isset( $jsonArray[self::OBSERVABLE_ID] )) {
            $dto->setObservableId( $jsonArray[self::OBSERVABLE_ID] );
        }
        if( isset( $jsonArray[self::DESCRIPTION] )) {
            foreach( $jsonArray[self::DESCRIPTION] as $subJsonArray ) {
                $dto->addDescription( MLStringType::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::DETECTTIME] )) {
            $dto->setDetectTime( $jsonArray[self::DETECTTIME] );
        }
        if( isset( $jsonArray[self::STARTTIME] )) {
            $dto->setStartTime( $jsonArray[self::STARTTIME] );
        }
        if( isset( $jsonArray[self::ENDTIME] )) {
            $dto->setEndTime( $jsonArray[self::ENDTIME] );
        }
        if( isset( $jsonArray[self::RECOVERYTIME] )) {
            $dto->setRecoveryTime( $jsonArray[self::RECOVERYTIME] );
        }
        if( isset( $jsonArray[self::REPORTTIME] )) {
            $dto->setReportTime( $jsonArray[self::REPORTTIME] );
        }
        if( isset( $jsonArray[self::CONTACT] )) {
            foreach( $jsonArray[self::CONTACT] as $subJsonArray ) {
                $dto->addContact( Contact::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::DISCOVERY] )) {
            foreach( $jsonArray[self::DISCOVERY] as $subJsonArray ) {
                $dto->addDiscovery( Discovery::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::ASSESSMENT] )) {
            $dto->setAssessment( Assessment::parse( $jsonArray[self::ASSESSMENT] ));
        }
        if( isset( $jsonArray[self::METHOD] )) {
            foreach( $jsonArray[self::METHOD] as $subJsonArray ) {
                $dto->addMethod( Method::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::SYSTEM] )) {
            foreach( $jsonArray[self::SYSTEM] as $subJsonArray ) {
                $dto->addSystem( System::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::EXPECTATION] )) {
            foreach( $jsonArray[self::EXPECTATION] as $subJsonArray ) {
                $dto->addExpectation( Expectation::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::RECORDDATA] )) {
            foreach( $jsonArray[self::RECORDDATA] as $subJsonArray ) {
                $dto->addRecordData( RecordData::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::EVENTDATA] )) {
            foreach( $jsonArray[self::EVENTDATA] as $subJsonArray ) {
                $dto->addEventData( self::parse( $subJsonArray ));
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
     * Write EventData Dto properties to json array
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
        if( $dto->isObservableIdSet()) {
            $jsonArray[self::OBSERVABLE_ID] = $dto->getObservableId();
        }
        if( $dto->isDescriptionSet()) {
            $jsonArray[self::DESCRIPTION] = [];
            foreach( $dto->getDescription() as $item ) {
                $jsonArray[self::DESCRIPTION][] = MLStringType::write( $item );
            }
        }
        if( $dto->isDetectTimeSet()) {
            $jsonArray[self::DETECTTIME] = $dto->getDetectTime();
        }
        if( $dto->isStartTimeSet()) {
            $jsonArray[self::STARTTIME] = $dto->getStartTime();
        }
        if( $dto->isEndTimeSet()) {
            $jsonArray[self::ENDTIME] = $dto->getEndTime();
        }
        if( $dto->isRecoveryTimeSet()) {
            $jsonArray[self::RECOVERYTIME] = $dto->getRecoveryTime();
        }
        if( $dto->isReportTimeSet()) {
            $jsonArray[self::REPORTTIME] = $dto->getReportTime();
        }
        if( $dto->isContactSet()) {
            $jsonArray[self::CONTACT] = [];
            foreach( $dto->getContact() as $item ) {
                $jsonArray[self::CONTACT][] = Contact::write( $item );
            }
        }
        if( $dto->isDiscoverySet()) {
            $jsonArray[self::DISCOVERY] = [];
            foreach( $dto->getDiscovery() as $item ) {
                $jsonArray[self::DISCOVERY][] = Discovery::write( $item );
            }
        }
        if( $dto->isAssessmentSet()) {
            $jsonArray[self::ASSESSMENT] = Assessment::write( $dto->getAssessment());
        }
        if( $dto->isMethodSet()) {
            $jsonArray[self::METHOD] = [];
            foreach( $dto->getMethod() as $item ) {
                $jsonArray[self::METHOD][] = Method::write( $item );
            }
        }
        if( $dto->isSystemSet()) {
            $jsonArray[self::SYSTEM] = [];
            foreach( $dto->getSystem() as $item ) {
                $jsonArray[self::SYSTEM][] = System::write( $item );
            }
        }
        if( $dto->isExpectationSet()) {
            $jsonArray[self::EXPECTATION] = [];
            foreach( $dto->getExpectation() as $item ) {
                $jsonArray[self::EXPECTATION][] = Expectation::write( $item );
            }
        }
        if( $dto->isRecordDataSet()) {
            $jsonArray[self::RECORDDATA] = [];
            foreach( $dto->getRecordData() as $item ) {
                $jsonArray[self::RECORDDATA][] = RecordData::write( $item );
            }
        }
        if( $dto->isEventDataSet()) {
            $jsonArray[self::EVENTDATA] = [];
            foreach( $dto->getEventData() as $item ) {
                $jsonArray[self::EVENTDATA][] = self::write( $item );
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
