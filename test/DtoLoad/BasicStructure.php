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
use Kigkonsult\PhpIncExSdk\Dto\BasicStructure as Dto;

class BasicStructure
{
    /**
     * Use faker to populate new BasicStructure
     *
     * @param Dto $dto
     * @param null|bool $allowSelfInvokes
     * @return void
     * @throws Exception
     */
    public static function load( Dto $dto,  ? bool $allowSelfInvokes = true ) : void
    {
        $faker = Faker\Factory::create();

        $specId = ( 2 < $faker->randomDigitNotNull ) ? $faker->uuid : Dto::PRIVATE;
        $dto->setSpecId( $specId );
        if( Dto::PRIVATE === $specId ) { // note remark in interface
            $dto->setExtSpecId( $faker->uuid );
        }

        $dto->setContentID( $faker->uuid );

        $max   = $faker->randomElement( [ 1, 2 ] );
        $array = [];
        if( 1 === $faker->randomElement( [ 1, 2 ] )) {
            for( $x = 0; $x < $max; $x++ ) {
                $array[] = $faker->sha256();
            }
            $dto->setRawData( $array );
        }
        else {
            for( $x = 0; $x < $max; $x++ ) {
                $array[] = Reference::load( $allowSelfInvokes );
            }
            $dto->setReference( $array );
        }
    }
}
