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
namespace Kigkonsult\PhpIncExSdk\Validate;

use Kigkonsult\PhpIncExSdk\Dto\Incident as Dto;

class Incident extends ValidateBase
{
    /**
     * Incident
     *
     * @param Dto $dto
     * @param array|null $result
     * @param string|null $upper
     * @return bool
     */
    public static function check( Dto $dto, ?array & $result = [], ?string $upper = '' ) : bool
    {
        $return = true;
        $upper  = self::getClassUpper( $upper );

        if( ! $dto->isRequiredSet()) {
            $return = false;
            if( ! $dto->isPurposeSet()) {
                self::updResultWithReqPropname( $upper, self::PURPOSE, $result );
            }
            if( ! $dto->isIncidentIDSet()) {
                self::updResultWithReqPropname( $upper, self::INCIDENTID, $result );
            }
            if( ! $dto->isGenerationTimeSet()) {
                self::updResultWithReqPropname( $upper, self::GENERATIONTIME, $result );
            }
            if( ! $dto->isContactSet()) {
                self::updResultWithReqPropname( $upper, self::CONTACT, $result );
            }
        }
        if( ! self::extAttrOk( $dto->getPurpose(), $dto->isExtPurposeSet(), $errExt )) {
            $return = false;
            self::updResultWithErrExtUse( $upper, self::PURPOSE, $errExt, $result );
        }
        if( ! self::extAttrOk( $dto->getStatus(), $dto->isExtStatusSet(), $errExt )) {
            $return = false;
            self::updResultWithErrExtUse( $upper, self::STATUS, $errExt, $result );
        }
        if( ! self::extAttrOk( $dto->getRestriction(), $dto->isExtRestrictionSet(), $errExt )) {
            $return = false;
            self::updResultWithErrExtUse( $upper, self::RESTRICTION, $errExt, $result );
        }

        if( $dto->isIncidentIDSet() &&
            ( false === IncidentID::check(
                $dto->getIncidentID(),
                $result,
                self::getKey(  $upper, self::INCIDENTID )))) {
            $return = false;
        }

        if( $dto->isAlternativeIDSet() &&
            ( false === AlternativeID::check(
                $dto->getAlternativeID(),
                $result,
                self::getKey(  $upper, self::ALTERNATIVEID )))) {
            $return = false;
        }

        if( $dto->isRelatedActivitySet()) {
            $key    = self::getKey(  $upper, self::RELATEDACTIVITY );
            foreach( $dto->getRelatedActivity() as $x => $item ) {
                if( false === RelatedActivity::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( ! $dto->isGenerationTimeSet()) {
            $return = false;
            self::updResultWithReqPropname( $upper, self::GENERATIONTIME, $result );
        }

        if( $dto->isDescriptionSet()) {
            $key    = self::getKey(  $upper, self::DESCRIPTION );
            foreach( $dto->getDescription() as $x => $item ) {
                if( false === MLStringType::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isDiscoverySet()) {
            $key    = self::getKey(  $upper, self::DISCOVERY );
            foreach( $dto->getDiscovery() as $x => $item ) {
                if( false === Discovery::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isAssessmentSet()) {
            $key    = self::getKey(  $upper, self::ASSESSMENT );
            foreach( $dto->getAssessment() as $x => $item ) {
                if( false === Assessment::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isMethodSet()) {
            $key    = self::getKey(  $upper, self::METHOD );
            foreach( $dto->getMethod() as $x => $item ) {
                if( false === Method::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isContactSet()) {
            $key    = self::getKey(  $upper, self::CONTACT );
            foreach( $dto->getContact() as $x => $item ) {
                if( false === Contact::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isEventDataSet()) {
            $key    = self::getKey(  $upper, self::EVENTDATA );
            foreach( $dto->getEventData() as $x => $item ) {
                if( false === EventData::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isIndicatorSet()) {
            $key    = self::getKey(  $upper, self::INDICATOR );
            foreach( $dto->getIndicator() as $x => $item ) {
                if( false === Indicator::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isHistorySet() &&
            ( false === History::check(
                $dto->getHistory(),
                $result,
                self::getKey(  $upper, self::HISTORY )))) {
            $return = false;
        }

        if( $dto->isAdditionalDataSet()) {
            $key    = self::getKey(  $upper, self::ADDITIONALDATA );
            foreach( $dto->getAdditionalData() as $x => $item ) {
                if( false === ExtensionType::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        return $return;
    }
}
