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
use Kigkonsult\PhpIncExSdk\Dto\Hash as Dto;

class Hash extends DtoLoadBase
{
    /**
     * Use faker to populate new Hash
     *
     * @param null|bool $allowSelfInvokes
     * @return Dto
     * @throws Exception
     */
    public static function load( ? bool $allowSelfInvokes = true ) : Dto
    {
        $faker = Faker\Factory::create();
        $dto   = new Dto();

        static $methods = [
            'md2',
            'md4',
            'md5',
            'sha1',
            'sha224',
            'sha256',
            'sha384',
            'sha512/224',
            'sha512/256',
            'sha512',
            'sha3-224',
            'sha3-256',
            'sha3-384',
            'sha3-512',
            'ripemd128',
            'ripemd160',
            'ripemd256',
            'ripemd320',
            'whirlpool',
            'tiger128,3',
            'tiger160,3',
            'tiger192,3',
            'tiger128,4',
            'tiger160,4',
            ' tiger192,4',
            'snefru',
            'snefru256',
            'gost',
            'gost-crypto',
            'adler32',
            'crc32',
            'crc32b',
            'crc32c',
            'fnv132',
            'fnv1a32',
            'fnv164',
            'fnv1a64',
            'joaat',
            'murmur3a',
            'murmur3c',
            'murmur3f',
            'xxh32',
            'xxh64',
            'xxh3',
            'xxh128',
            'haval128,3',
            'haval160,3',
            'haval192,3',
            'haval224,3',
            'haval256,3',
            'haval128,4',
            'haval160,4',
            'haval192,4',
            'haval224,4',
            'haval256,4',
            'haval128,5',
            'haval160,5',
            'haval192,5',
            'haval224,5',
            'haval256,5'
        ];
        $dto->setDigestMethod( $faker->randomElement( $methods ));

        $dto->setDigestValue( $faker->sha256());

        $dto->setCanonicalizationMethod( $faker->randomElement( $methods ));

        $dto->setApplication( SoftwareType::load( $allowSelfInvokes ));

        return $dto;
    }
}
