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

use Kigkonsult\PhpIncExSdk\Dto\RelatedActivity as Dto;

class RelatedActivity extends ValidateBase
{
    /**
     * RelatedActivity
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

        if( ! $dto->isRequiredSet()) { // i.e. none set
            $return = false;
            $key    = $upper . self::$PROPLIST;
            static $IMPLODELIST = [
                self::INCIDENTID,
                self::URL,
                self::THREATACTOR,
                self::CAMPAIGN,
                self::DESCRIPTION,
                self::ADDITIONALDATA
            ];
            $result[$key] = sprintf( self::$ONEREQUIRED, self::implodeList( $IMPLODELIST ));
        }
        if( ! self::extAttrOk( $dto->getRestriction(), $dto->isExtRestrictionSet(), $errExt )) {
            $return = false;
            self::updResultWithErrExtUse( $upper, self::RESTRICTION, $errExt, $result );
        }

        if( $dto->isIncidentIDSet()) {
            $key    = self::getKey(  $upper, self::INCIDENTID );
            foreach( $dto->getIncidentID() as $x => $item ) {
                if( false === IncidentID::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isThreatActorSet()) {
            $key    = self::getKey(  $upper, self::THREATACTOR );
            foreach( $dto->getThreatActor() as $x => $item ) {
                if( false === ThreatActor::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isCampaignSet()) {
            $key    = self::getKey(  $upper, self::CAMPAIGN );
            foreach( $dto->getCampaign() as $x => $item ) {
                if( false === Campaign::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isIndicatorIDSet()) {
            $key    = self::getKey(  $upper, self::INDICATORID );
            foreach( $dto->getIndicatorID() as $x => $item ) {
                if( false === IndicatorID::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }

        if( $dto->isConfidenceSet() &&
            ( false === Confidence::check(
                $dto->getConfidence(),
                $result,
                    self::getKey(  $upper, self::CONFIDENCE )))) {
            $return = false;
        }

        if( $dto->isDescriptionSet()) {
            $key    = self::getKey(  $upper, self::DESCRIPTION );
            foreach( $dto->getDescription() as $x => $item ) {
                if( false === MLStringType::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
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
