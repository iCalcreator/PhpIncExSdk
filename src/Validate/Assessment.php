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

use Kigkonsult\PhpIncExSdk\Dto\Assessment as Dto;

class Assessment extends ValidateBase
{
    /**
     * Assessment
     * At least one instance of the possible five impact classes
     * (i.e., BusinessImpact, IntendedImpact, MonetaryImpact, SystemImpact or TimeImpact) MUST be present.
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
            $key    = self::getKey(  $upper, self::IMPACT );
            static $IMPLODELIST = [
                self::BUSINESSIMPACT,
                self::INTENDEDIMPACT,
                self::MONETARYIMPACT,
                self::SYSTEMIMPACT,
                self::TIMEIMPACT
            ];
            $result[$key] = sprintf( self::$ONEREQUIRED, self::implodeList( $IMPLODELIST ));
        }
        else {
            if( $dto->isBusinessImpactSet()) {
                $key    = self::getKey(  $upper, self::BUSINESSIMPACT );
                foreach( $dto->getBusinessImpact() as $x => $item ) {
                    if( false === BusinessImpact::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                        $return = false;
                    }
                }
            }
            if( $dto->isIntendedImpactSet()) {
                $key    = self::getKey(  $upper, self::INTENDEDIMPACT );
                foreach( $dto->getIntendedImpact() as $x => $item ) {
                    if( false === IntendedImpact::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                        $return = false;
                    }
                }
            }
            if( $dto->isMonetaryImpactSet()) {
                $key    = self::getKey(  $upper, self::MONETARYIMPACT );
                foreach( $dto->getMonetaryImpact() as $x => $item ) {
                    if( false === MonetaryImpact::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                        $return = false;
                    }
                }
            }
            if( $dto->isSystemImpactSet()) {
                $key    = self::getKey(  $upper, self::SYSTEMIMPACT );
                foreach( $dto->getSystemImpact() as $x => $item ) {
                    if( false === SystemImpact::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                        $return = false;
                    }
                }
            }
            if( $dto->isTimeImpactSet()) {
                $key    = self::getKey(  $upper, self::TIMEIMPACT );
                foreach( $dto->getTimeImpact() as $x => $item ) {
                    if( false === TimeImpact::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                        $return = false;
                    }
                }
            }
        } // end else
        if( ! self::extAttrOk( $dto->getRestriction(), $dto->isExtRestrictionSet(), $errExt )) {
            $return = false;
            self::updResultWithErrExtUse( $upper, self::RESTRICTION, $errExt, $result );
        }

        if( $dto->isIncidentCategorySet()) {
            $key    = self::getKey(  $upper, self::INCIDENTCATEGORY );
            foreach( $dto->getIncidentCategory() as $x => $item ) {
                if( false === MLStringType::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }
        if( $dto->isCounterSet()) {
            $key    = self::getKey(  $upper, self::COUNTER );
            foreach( $dto->getCounter() as $x => $item ) {
                if( false === Counter::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }
        if( $dto->isMitigatingFactorSet()) {
            $key    = self::getKey(  $upper, self::MITIGATINGFACTOR );
            foreach( $dto->getMitigatingFactor() as $x => $item ) {
                if( false === MLStringType::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }
        if( $dto->isCauseSet()) {
            $key    = self::getKey(  $upper, self::CAUSE );
            foreach( $dto->getCause() as $x => $item ) {
                if( false === MLStringType::check( $item, $result, self::getKeyIxd( $key, $x ))) {
                    $return = false;
                }
            }
        }
        if( $dto->isConfidenceSet() &&
            ( false === Confidence::check(
                $dto->getConfidence(),
                $result, self::getKey(  $upper, self::CONFIDENCE )))) {
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
