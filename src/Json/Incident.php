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
use Kigkonsult\PhpIncExSdk\Dto\Incident as Dto;

class Incident implements JsonInterface
{
    /**
     * Parse json array to populate new Incident
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     * @throws Exception
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::PURPOSE] )) {
            $dto->setPurpose( $jsonArray[self::PURPOSE] );
        }
        if( isset( $jsonArray[self::EXT_PURPOSE] )) {
            $dto->setExtPurpose( $jsonArray[self::EXT_PURPOSE] );
        }
        if( isset( $jsonArray[self::STATUS] )) {
            $dto->setStatus( $jsonArray[self::STATUS] );
        }
        if( isset( $jsonArray[self::EXT_STATUS] )) {
            $dto->setExtStatus( $jsonArray[self::EXT_STATUS] );
        }
        if( isset( $jsonArray[self::LANG] )) {
            $dto->setLang( $jsonArray[self::LANG] );
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
        if( isset( $jsonArray[self::INCIDENTID] )) {
            $dto->setIncidentID( IncidentID::parse( $jsonArray[self::INCIDENTID] ));
        }
        if( isset( $jsonArray[self::ALTERNATIVEID] )) {
            $dto->setAlternativeID( AlternativeID::parse( $jsonArray[self::ALTERNATIVEID] ));
        }
        if( isset( $jsonArray[self::RELATEDACTIVITY] )) {
            foreach( $jsonArray[self::RELATEDACTIVITY] as $subJsonArray ) {
                $dto->addRelatedActivity( RelatedActivity::parse( $subJsonArray ));
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
        if( isset( $jsonArray[self::GENERATIONTIME] )) {
            $dto->setGenerationTime( $jsonArray[self::GENERATIONTIME] );
        }
        if( isset( $jsonArray[self::DESCRIPTION] )) {
            foreach( $jsonArray[self::DESCRIPTION] as $subJsonArray ) {
                $dto->addDescription( MLStringType::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::DISCOVERY] )) {
            foreach( $jsonArray[self::DISCOVERY] as $subJsonArray ) {
                $dto->addDiscovery( Discovery::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::ASSESSMENT] )) {
            foreach( $jsonArray[self::ASSESSMENT] as $subJsonArray ) {
                $dto->addAssessment( Assessment::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::METHOD] )) {
            foreach( $jsonArray[self::METHOD] as $subJsonArray ) {
                $dto->addMethod( Method::parse( $subJsonArray ) );
            }
        }
        if( isset( $jsonArray[self::CONTACT] )) {
            foreach( $jsonArray[self::CONTACT] as $subJsonArray ) {
                $dto->addContact( Contact::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::EVENTDATA] )) {
            foreach( $jsonArray[self::EVENTDATA] as $subJsonArray ) {
                $dto->addEventData( EventData::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::INDICATOR] )) {
            foreach( $jsonArray[self::INDICATOR] as $subJsonArray ) {
                $dto->addIndicator( Indicator::parse( $subJsonArray ) );
            }
        }
        if( isset( $jsonArray[self::HISTORY] )) {
            $dto->setHistory( History::parse( $jsonArray[self::HISTORY] ));
        }
        if( isset( $jsonArray[self::ADDITIONALDATA] )) {
            foreach( $jsonArray[self::ADDITIONALDATA] as $subJsonArray ) {
                $dto->addAdditionalData( ExtensionType::parse( $subJsonArray ));
            }
        }

        return $dto;
    }

    /**
     * Write Incident Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isPurposeSet()) {
            $jsonArray[self::PURPOSE] = $dto->getPurpose();
        }
        if( $dto->isExtPurposeSet()) {
            $jsonArray[self::EXT_PURPOSE] = $dto->getExtPurpose();
        }
        if( $dto->isStatusSet()) {
            $jsonArray[self::STATUS] = $dto->getStatus();
        }
        if( $dto->isExtStatusSet()) {
            $jsonArray[self::EXT_STATUS] = $dto->getExtStatus();
        }
        if( $dto->isLangSet()) {
            $jsonArray[self::LANG] = $dto->getLang();
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
        if( $dto->isIncidentIDSet()) {
            $jsonArray[self::INCIDENTID] = IncidentID::write( $dto->getIncidentID());
        }
        if( $dto->isAlternativeIDSet()) {
            $jsonArray[self::ALTERNATIVEID] = AlternativeID::write( $dto->getAlternativeID());
        }
        if( $dto->isRelatedActivitySet()) {
            $jsonArray[self::RELATEDACTIVITY] = [];
            foreach( $dto->getRelatedActivity() as $item ) {
                $jsonArray[self::RELATEDACTIVITY][] = RelatedActivity::write( $item );
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
        if( $dto->isGenerationTimeSet()) {
            $jsonArray[self::GENERATIONTIME] = $dto->getGenerationTime();
        }
        if( $dto->isDescriptionSet()) {
            $jsonArray[self::DESCRIPTION] = [];
            foreach( $dto->getDescription() as $item ) {
                $jsonArray[self::DESCRIPTION][] = MLStringType::write( $item );
            }
        }
        if( $dto->isDiscoverySet()) {
            $jsonArray[self::DISCOVERY] = [];
            foreach( $dto->getDiscovery() as $item ) {
                $jsonArray[self::DISCOVERY][] = Discovery::write( $item );
            }
        }
        if( $dto->isAssessmentSet()) {
            $jsonArray[self::ASSESSMENT] = [];
            foreach( $dto->getAssessment() as $item ) {
                $jsonArray[self::ASSESSMENT][] = Assessment::write( $item );
            }
        }
        if( $dto->isMethodSet()) {
            $jsonArray[self::METHOD] = [];
            foreach( $dto->getMethod() as $item ) {
                $jsonArray[self::METHOD][] = Method::write( $item );
            }
        }
        if( $dto->isContactSet()) {
            $jsonArray[self::CONTACT] = [];
            foreach( $dto->getContact() as $item ) {
                $jsonArray[self::CONTACT][] = Contact::write( $item );
            }
        }
        if( $dto->isEventDataSet()) {
            $jsonArray[self::EVENTDATA] = [];
            foreach( $dto->getEventData() as $item ) {
                $jsonArray[self::EVENTDATA][] = EventData::write( $item );
            }
        }
        if( $dto->isIndicatorSet()) {
            $jsonArray[self::INDICATOR] = [];
            foreach( $dto->getIndicator() as $item ) {
                $jsonArray[self::INDICATOR][] = Indicator::write( $item );
            }
        }
        if( $dto->isHistorySet()) {
            $jsonArray[self::HISTORY] = History::write( $dto->getHistory());
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
