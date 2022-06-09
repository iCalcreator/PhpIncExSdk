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
namespace Kigkonsult\PhpIncExSdk\DtoLoad;

use Exception;
use Faker;
use Kigkonsult\FakerLocRelTypes\Provider\en_US\Rfc7970enums;
use Kigkonsult\PhpIncExSdk\Dto\Observable as Dto;

class Observable extends DtoLoadBase
{
    /**
     * Use faker to populate new Observable
     *
     * @param null|bool $allowSelfInvokes
     * @param int $childClassIndex
     * @return Dto
     * @throws Exception
     */
    public static function load( ? bool $allowSelfInvokes = true, int $childClassIndex = 1 ) : Dto
    {
        $faker = Faker\Factory::create();
        $faker->addProvider( new Rfc7970enums( $faker ));
        $dto   = new Dto();

        $restriction  = ( 2 < $faker->randomDigitNotNull ) ? $faker->rfc7970Restriction() : self::EXT_VALUE;
        $dto->setRestriction( $restriction );
        if( self::EXT_VALUE === $restriction ) {
            $dto->setExtRestriction( $faker->word());
        }

        /*
         * The Observable class MUST have exactly one of the possible child classes.
         * System, Address, DomainData, Service, EmailData, WindowsRegistryKeysModified, FileData,
         * CertificateData, RegistryHandle, RecordData, EventData, Incident, Expectation, Reference,
         * Assessment, DetectionPattern, HistoryItem, BulkObservable, AdditionalData
         */
        switch( $childClassIndex ) {
            case 0:
                $dto->setSystem( System::load( $allowSelfInvokes ));
                break;
            case 1 :
                $dto->setAddress( Address::load( $allowSelfInvokes ));
                break;
            case 2 :
                $dto->setDomainData( DomainData::load( $allowSelfInvokes ));
                break;
            case 3 :
                $dto->setService( Service::load( $allowSelfInvokes ));
                break;
            case 4 :
                $dto->setEmailData( EmailData::load( $allowSelfInvokes ));
                break;
            case 5 :
                $dto->setWindowsRegistryKeysModified( WindowsRegistryKeysModified::load( $allowSelfInvokes ));
                break;
            case 6 :
                $dto->setFileData( FileData::load( $allowSelfInvokes ));
                break;
            case 7 :
                $dto->setCertificateData( CertificateData::load( $allowSelfInvokes ));
                break;
            case 8 :
                $dto->setRegistryHandle( RegistryHandle::load( $allowSelfInvokes ));
                break;
            case 9 :
                $dto->setRecordData( RecordData::load( $allowSelfInvokes ));
                break;
            case 10 :
                $dto->setEventData( EventData::load( $allowSelfInvokes ));
                break;
            case 11 :
                if( $allowSelfInvokes ) {
                    // Note false: -> Incident -> Indicator -> Observable -> Incident .....
                    $dto->setIncident( Incident::load( false ));
                }
                else {
                    $dto->addAdditionalData( ExtensionType::load( $allowSelfInvokes ));
                }
                break;
            case 12 :
                $dto->setExpectation( Expectation::load( $allowSelfInvokes ));
                break;
            case 13 :
                $dto->setReference( Reference::load( $allowSelfInvokes ));
                break;
            case 14 :
                $dto->setAssessment( Assessment::load( $allowSelfInvokes ));
                break;
            case 15 :
                $dto->setDetectionPattern( DetectionPattern::load( $allowSelfInvokes ));
                break;
            case 16 :
                $dto->setHistoryItem( HistoryItem::load( $allowSelfInvokes ));
                break;
            case 17 :
                $dto->setBulkObservable( BulkObservable::load( $allowSelfInvokes ));
                break;
            case 18 :
            default :
                $dto->addAdditionalData( ExtensionType::load( $allowSelfInvokes ));
                break;
        } // en switch

        return $dto;
    }
}
