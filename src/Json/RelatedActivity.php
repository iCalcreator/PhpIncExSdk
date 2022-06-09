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

use Kigkonsult\PhpIncExSdk\Dto\RelatedActivity as Dto;

class RelatedActivity implements JsonInterface
{
    /**
     * Parse json array to populate new RelatedActivity
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
        if( isset( $jsonArray[self::INCIDENTID] )) {
            foreach( $jsonArray[self::INCIDENTID] as $subJsonArray ) {
                $dto->addIncidentID( IncidentID::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::URL] )) {
            foreach( $jsonArray[self::URL] as $sub ) {
                $dto->addUrl( $sub );
            }
        }
        if( isset( $jsonArray[self::THREATACTOR] )) {
            foreach( $jsonArray[self::THREATACTOR] as $subJsonArray ) {
                $dto->addThreatActor( ThreatActor::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::CAMPAIGN] )) {
            foreach( $jsonArray[self::CAMPAIGN] as $subJsonArray ) {
                $dto->addCampaign( Campaign::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::INDICATORID] )) {
            foreach( $jsonArray[self::INDICATORID] as $subJsonArray ) {
                $dto->addIndicatorID( IndicatorID::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::CONFIDENCE] )) {
            $dto->setConfidence( Confidence::parse( $jsonArray[self::CONFIDENCE] ));
        }
        if( isset( $jsonArray[self::DESCRIPTION] )) {
            foreach( $jsonArray[self::DESCRIPTION] as $subJsonArray ) {
                $dto->addDescription( MLStringType::parse( $subJsonArray ));
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
     * Write RelatedActivity Dto properties to json array
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
        if( $dto->isIncidentIDSet()) {
            $jsonArray[self::INCIDENTID] = [];
            foreach( $dto->getIncidentID() as $item ) {
                $jsonArray[self::INCIDENTID][] = IncidentID::write( $item );
            }
        }
        if( $dto->isUrlSet()) {
            $jsonArray[self::URL] = [];
            foreach( $dto->getUrl() as $item ) {
                $jsonArray[self::URL][] = $item;
            }
        }
        if( $dto->isThreatActorSet()) {
            $jsonArray[self::THREATACTOR] = [];
            foreach( $dto->getThreatActor() as $item ) {
                $jsonArray[self::THREATACTOR][] = ThreatActor::write( $item );
            }
        }
        if( $dto->isCampaignSet()) {
            $jsonArray[self::CAMPAIGN] = [];
            foreach( $dto->getCampaign() as $item ) {
                $jsonArray[self::CAMPAIGN][] = Campaign::write( $item );
            }
        }
        if( $dto->isIndicatorIDSet()) {
            $jsonArray[self::INDICATORID] = [];
            foreach( $dto->getIndicatorID() as $item ) {
                $jsonArray[self::INDICATORID][] = IndicatorID::write( $item );
            }
        }
        if( $dto->isConfidenceSet()) {
            $jsonArray[self::CONFIDENCE] = $dto->getConfidence();
        }
        if( $dto->isDescriptionSet()) {
            $jsonArray[self::DESCRIPTION] = [];
            foreach( $dto->getDescription() as $item ) {
                $jsonArray[self::DESCRIPTION][] = MLStringType::write( $item );
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
