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
use Kigkonsult\PhpIncExSdk\Dto\Incident as Dto;

class Incident extends DtoLoadBase
{
    /**
     * Use faker to populate new Incident
     *
     * @param null|bool $allowSelfInvokes
     * @return Dto
     * @throws Exception
     */
    public static function load( ? bool $allowSelfInvokes = true ) : Dto
    {
        $faker = Faker\Factory::create();
        $faker->addProvider( new Rfc7970enums( $faker ));
        $dto   = new Dto();

        $purpose = ( 2 < $faker->randomDigitNotNull ) ? $faker->rfc7970IncidentPurpose() : self::EXT_VALUE;
        $dto->setPurpose( $purpose );
        if( self::EXT_VALUE === $purpose ) {
            $dto->setExtPurpose( $faker->word());
        }

        $status = ( 2 < $faker->randomDigitNotNull ) ? $faker->rfc7970IncidentStatus() : self::EXT_VALUE;
        $dto->setStatus( $status );
        if( self::EXT_VALUE === $status ) {
            $dto->setExtStatus( $faker->word());
        }

        $dto->setLang( $faker->locale());

        $restriction  = ( 2 < $faker->randomDigitNotNull ) ? $faker->rfc7970Restriction() : self::EXT_VALUE;
        $dto->setRestriction( $restriction );
        if( self::EXT_VALUE === $restriction ) {
            $dto->setExtRestriction( $faker->word());
        }

        $dto->setObservableId( $faker->uuid());

        $dto->setIncidentID( IncidentID::load( $allowSelfInvokes ));

        $dto->setAlternativeID( AlternativeID::load( $allowSelfInvokes ));

        $max = $faker->boolean() ? 1 : 2;
        $array = [];
        for( $x = 0; $x < $max; $x++ ) {
            $array[] = RelatedActivity::load( $allowSelfInvokes );
        }
        $dto->setRelatedActivity( $array );

        $dto->setDetectTime( $faker->dateTime( 'now', $faker->timezone()));

        $dto->setStartTime( $faker->dateTime( 'now', $faker->timezone()));

        $dto->setEndTime( $faker->dateTime( 'now', $faker->timezone()));

        $dto->setRecoveryTime( $faker->dateTime( 'now', $faker->timezone()));

        $dto->setReportTime( $faker->dateTime( 'now', $faker->timezone()));

        $dto->setGenerationTime( $faker->dateTime( 'now', $faker->timezone()));


        $max = $faker->boolean() ? 1 : 2;
        $array = [];
        for( $x = 0; $x < $max; $x++ ) {
            $array[] = MLStringType::load( $allowSelfInvokes );
        }
        $dto->setDescription( $array );

        $max = $faker->boolean() ? 1 : 2;
        $array = [];
        for( $x = 0; $x < $max; $x++ ) {
            $array[] = Discovery::load( $allowSelfInvokes );
        }
        $dto->setDiscovery( $array );

        $max = $faker->boolean() ? 1 : 2;
        $array = [];
        for( $x = 0; $x < $max; $x++ ) {
            $array[] = Assessment::load( $allowSelfInvokes );
        }
        $dto->setAssessment( $array );

        $max = $faker->boolean() ? 1 : 2;
        $array = [];
        for( $x = 0; $x < $max; $x++ ) {
            $array[] = Method::load( $allowSelfInvokes );
        }
        $dto->setMethod( $array );

        $max = $faker->boolean() ? 1 : 2;
        $array = [];
        for( $x = 0; $x < $max; $x++ ) {
            $array[] = Contact::load( $allowSelfInvokes );
        }
        $dto->setContact( $array );

        $max = $faker->boolean() ? 1 : 2;
        $array = [];
        for( $x = 0; $x < $max; $x++ ) {
            $array[] = EventData::load( $allowSelfInvokes );
        }
        $dto->setEventData( $array );

        if( $allowSelfInvokes ) {
            // Note false hereafter : -> Incident -> Indicator -> Observable -> Incident .....
            $max = $faker->boolean() ? 1 : 2;
            $array = [];
            for( $x = 0; $x < $max; $x++ ) {
                $array[] = Indicator::load( false );
            }
            $dto->setIndicator( $array );
        }

        $dto->setHistory( History::load( $allowSelfInvokes ));

        $max = $faker->boolean() ? 1 : 2;
        $array = [];
        for( $x = 0; $x < $max; $x++ ) {
            $array[] = ExtensionType::load( $allowSelfInvokes );
        }
        $dto->setAdditionalData( $array );

        return $dto;
    }
}
