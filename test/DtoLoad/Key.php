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
use Kigkonsult\PhpIncExSdk\Dto\Key as Dto;

class Key extends DtoLoadBase
{
    /**
     * Use faker to populate new Key
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

        $registryaction = ( 2 < $faker->randomDigitNotNull ) ? $faker->rfc7970KeyRegistryaction() : self::EXT_VALUE;
        $dto->setRegistryaction( $registryaction );
        if( self::EXT_VALUE === $registryaction ) {
            $dto->setExtRegistryaction( $faker->word());
        }

        $dto->setObservableId( $faker->uuid());

        $dto->setKeyName( $faker->word());
        $dto->setKeyValue( $faker->word());

        return $dto;
    }
}
