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
use Kigkonsult\PhpIncExSdk\Dto\DomainData as Dto;

class DomainData extends DtoLoadBase
{
    /**
     * Use faker to populate new DomainData
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

        $systemStatus = ( 2 < $faker->randomDigitNotNull ) ? $faker->rfc7970DomainDataSystemStatus() : self::EXT_VALUE;
        $dto->setSystemStatus( $systemStatus );
        if( self::EXT_VALUE === $systemStatus ) {
            $dto->setExtSystemStatus( $faker->word());
        }

        $domainStatus = ( 2 < $faker->randomDigitNotNull ) ? $faker->rfc7970DomainDataDomainStatus() : self::EXT_VALUE;
        $dto->setDomainStatus( $domainStatus );
        if( self::EXT_VALUE === $domainStatus ) {
            $dto->setExtDomainStatus( $faker->word());
        }

        $dto->setObservableId( $faker->uuid());

        $dto->setName( $faker->domainName());

        $dto->setDateDomainWasChecked( $faker->dateTime( 'now', $faker->timezone()));

        $dto->setRegistrationDate( $faker->dateTime( 'now', $faker->timezone()));

        $dto->setExpirationDate( $faker->dateTime( 'now', $faker->timezone()));

        $max = $faker->boolean() ? 1 : 2;
        $array = [];
        for( $x = 0; $x < $max; $x++ ) {
            $array[] = ExtensionType::load( $allowSelfInvokes );
        }
        $dto->setRelatedDNS( $array );

        $max = $faker->boolean() ? 1 : 2;
        $array = [];
        for( $x = 0; $x < $max; $x++ ) {
            $array[] = Nameservers::load( $allowSelfInvokes );
        }
        $dto->setNameservers( $array );

        $dto->setDomainContacts( DomainContacts::load( $allowSelfInvokes ));

        return $dto;
    }
}
