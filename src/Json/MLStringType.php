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

use Kigkonsult\PhpIncExSdk\Dto\MLStringType as Dto;

class MLStringType implements JsonInterface
{
    /**
     * Parse json string or array to populate new MLStringType
     *
     * @param string|string[] $json
     * @return Dto
     */
    public static function parse( string|array $json ) : Dto
    {
        $dto = new Dto();

        if( is_string( $json )) {
            return $dto->setValue( $json );
        }

        if( isset( $json[self::LANG] )) {
            $dto->setLang( $json[self::LANG] );
        }
        if( isset( $json[self::TRANSLATIONID] )) {
            $dto->setTranslationId( $json[self::TRANSLATIONID] );
        }
        if( isset( $json[self::VALUE] )) {
            $dto->setValue( $json[self::VALUE] );
        }

        return $dto;
    }

    /**
     * Write MLStringType Dto properties to json array
     *
     * @param Dto $dto
     * @return string|object
     */
    public static function write( Dto $dto ) : string|object
    {
        if( $dto->isOnlyValueSet()) {
            return $dto->getValue();
        }

        $jsonArray = [];

        if( $dto->isLangSet()) {
            $jsonArray[self::LANG] = $dto->getLang();
        }
        if( $dto->isTranslationIdSet()) {
            $jsonArray[self::TRANSLATIONID] = $dto->getTranslationId();
        }
        if( $dto->isValueSet()) {
            $jsonArray[self::VALUE] = $dto->getValue();
        }

        return (object) $jsonArray;
    }
}
