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
use Kigkonsult\PhpIncExSdk\Dto\Service as Dto;

class Service extends DtoLoadBase
{
    /**
     * Use faker to populate new Service
     *
     * @param null|bool $allowSelfInvokes
     * @return Dto
     * @throws Exception
     */
    public static function load( ? bool $allowSelfInvokes = true ) : Dto
    {
        $faker = Faker\Factory::create();
        $dto   = new Dto();

        $dto->setIpProtocol((string) $faker->numberBetween(0,255));

        $dto->setObservableId( $faker->uuid());

        $dto->setServiceName( ServiceName::load( $allowSelfInvokes ));

        $dto->setPort( $faker->randomNumber(4, true));

        $dto->setPortlist(
            implode(
                ',',
                [ $faker->numberBetween(20, 40), $faker->numberBetween(61, 80) ]
            )
        );

        $dto->setProtoCode( $faker->randomDigitNot( 0 ));

        $dto->setProtoType( $faker->randomDigitNot( 0 ));

        $dto->setProtoField( $faker->randomDigitNot( 0 ));

        $max = $faker->boolean() ? 1 : 2;
        $array = [];
        for( $x = 0; $x < $max; $x++ ) {
            $array[] = ExtensionType::load( $allowSelfInvokes );
        }
        $dto->setApplicationHeaderField( $array );

        $dto->setEmailData( EmailData::load( $allowSelfInvokes ));

        $dto->setApplication( SoftwareType::load( $allowSelfInvokes ));

        return $dto;
    }
}
