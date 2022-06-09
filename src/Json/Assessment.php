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

use Kigkonsult\PhpIncExSdk\Dto\Assessment as Dto;

class Assessment implements JsonInterface
{
    /**
     * Parse json array to populate new Assessment
     *
     * @param string[]|string[][] $jsonArray
     * @return Dto
     */
    public static function parse( array $jsonArray ) : Dto
    {
        $dto = new Dto();

        if( isset( $jsonArray[self::OCCURRENCE] )) {
            $dto->setOccurrence( $jsonArray[self::OCCURRENCE] );
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
        if( isset( $jsonArray[self::INCIDENTCATEGORY] )) {
            foreach( $jsonArray[self::INCIDENTCATEGORY] as $subJsonArray ) {
                $dto->addIncidentCategory( MLStringType::parse( $subJsonArray ));
            }
        }

        if( isset( $jsonArray[self::IMPACT] )) {
            foreach( $jsonArray[self::IMPACT] as $subJsonArray ) {
                foreach( $subJsonArray as $impactKey => $impactArray ) {
                    switch( $impactKey ){
                        case self::SYSTEMIMPACT :
                            $dto->addSystemImpact( SystemImpact::parse( $impactArray ));
                            break;
                        case self::BUSINESSIMPACT :
                            $dto->addBusinessImpact( BusinessImpact::parse( $impactArray ));
                            break;
                        case self::TIMEIMPACT :
                            $dto->addTimeImpact( TimeImpact::parse( $impactArray ));
                            break;
                        case self::MONETARYIMPACT :
                            $dto->addMonetaryImpact( MonetaryImpact::parse( $impactArray ));
                            break;
                        case self::INTENDEDIMPACT :
                            $dto->addIntendedImpact( IntendedImpact::parse( $impactArray ));
                            break;
                    } // end switch

                    /*
                    if( isset( $jsonArray[self::SYSTEMIMPACT] ) ) {
                        foreach( $jsonArray[self::SYSTEMIMPACT] as $subJsonArray ) {
                            $dto->addSystemImpact( SystemImpact::parse( $subJsonArray ) );
                        }
                    }
                    if( isset( $jsonArray[self::BUSINESSIMPACT] ) ) {
                        foreach( $jsonArray[self::BUSINESSIMPACT] as $subJsonArray ) {
                            $dto->addBusinessImpact( BusinessImpact::parse( $subJsonArray ) );
                        }
                    }
                    if( isset( $jsonArray[self::TIMEIMPACT] ) ) {
                        foreach( $jsonArray[self::TIMEIMPACT] as $subJsonArray ) {
                            $dto->addTimeImpact( TimeImpact::parse( $subJsonArray ) );
                        }
                    }
                    if( isset( $jsonArray[self::MONETARYIMPACT] ) ) {
                        foreach( $jsonArray[self::MONETARYIMPACT] as $subJsonArray ) {
                            $dto->addMonetaryImpact( MonetaryImpact::parse( $subJsonArray ) );
                        }
                    }
                    if( isset( $jsonArray[self::INTENDEDIMPACT] ) ) {
                        foreach( $jsonArray[self::INTENDEDIMPACT] as $subJsonArray ) {
                            $dto->addIntendedImpact( IntendedImpact::parse( $subJsonArray ) );
                        }
                    }
                    */
                } // end foreach
            } // end foreach
        }// end if

        if( isset( $jsonArray[self::COUNTER] )) {
            foreach( $jsonArray[self::COUNTER] as $subJsonArray ) {
                $dto->addCounter( Counter::parse( $subJsonArray ));
            }
        }
        if( isset( $jsonArray[self::MITIGATINGFACTOR] )) {
            foreach( $jsonArray[self::MITIGATINGFACTOR] as $sub ) {
                $dto->addMitigatingFactor( MLStringType::parse( $sub ));
            }
        }
        if( isset( $jsonArray[self::CAUSE] )) {
            foreach( $jsonArray[self::CAUSE] as $sub ) {
                $dto->addCause( MLStringType::parse( $sub ));
            }
        }
        if( isset( $jsonArray[self::CONFIDENCE] )) {
            $dto->setConfidence( Confidence::parse( $jsonArray[self::CONFIDENCE] ));
        }
        if( isset( $jsonArray[self::ADDITIONALDATA] )) {
            foreach( $jsonArray[self::ADDITIONALDATA] as $subJsonArray ) {
                $dto->addAdditionalData( ExtensionType::parse( $subJsonArray ));
            }
        }

        return $dto;
    }

    /**
     * Write Assessment Dto properties to json array
     *
     * @param Dto $dto
     * @return object
     */
    public static function write( Dto $dto ) : object
    {
        $jsonArray = [];

        if( $dto->isOccurrenceSet()) {
            $jsonArray[self::OCCURRENCE] = $dto->getOccurrence();
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
        if( $dto->isIncidentCategorySet()) {
            $jsonArray[self::INCIDENTCATEGORY] = [];
            foreach( $dto->getIncidentCategory() as $item ) {
                $jsonArray[self::INCIDENTCATEGORY][] = MLStringType::write( $item );
            }
        }
        if( $dto->isRequiredSet()) {
            $jsonArray[self::IMPACT] = [];
            if( $dto->isSystemImpactSet() ) {
                foreach( $dto->getSystemImpact() as $item ) {
                    $jsonArray[self::IMPACT][] = (object) [ self::SYSTEMIMPACT => SystemImpact::write( $item ) ];
                }
            }
            if( $dto->isBusinessImpactSet() ) {
                foreach( $dto->getBusinessImpact() as $item ) {
                    $jsonArray[self::IMPACT][] = (object) [ self::BUSINESSIMPACT => BusinessImpact::write( $item ) ];
                }
            }
            if( $dto->isTimeImpactSet() ) {
                foreach( $dto->getTimeImpact() as $item ) {
                    $jsonArray[self::IMPACT][] = (object) [ self::TIMEIMPACT => TimeImpact::write( $item ) ];
                }
            }
            if( $dto->isMonetaryImpactSet() ) {
                foreach( $dto->getMonetaryImpact() as $item ) {
                    $jsonArray[self::IMPACT][] = (object) [ self::MONETARYIMPACT => MonetaryImpact::write( $item ) ];
                }
            }
            if( $dto->isIntendedImpactSet() ) {
                foreach( $dto->getIntendedImpact() as $item ) {
                    $jsonArray[self::IMPACT][] = (object) [ self::INTENDEDIMPACT => IntendedImpact::write( $item ) ];
                }
            }
        } // end if

        if( $dto->isCounterSet()) {
            $jsonArray[self::COUNTER] = [];
            foreach( $dto->getCounter() as $item ) {
                $jsonArray[self::COUNTER][] = Counter::write( $item );
            }
        }
        if( $dto->isMitigatingFactorSet()) {
            $jsonArray[self::MITIGATINGFACTOR] = [];
            foreach( $dto->getMitigatingFactor() as $item ) {
                $jsonArray[self::MITIGATINGFACTOR][] = MLStringType::write( $item );
            }
        }
        if( $dto->isCauseSet()) {
            $jsonArray[self::CAUSE] = [];
            foreach( $dto->getCause() as $item ) {
                $jsonArray[self::CAUSE][] = MLStringType::write( $item );
            }
        }
        if( $dto->isConfidenceSet()) {
            $jsonArray[self::CONFIDENCE] = Confidence::write( $dto->getConfidence());
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
