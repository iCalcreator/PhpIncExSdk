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
namespace Kigkonsult\PhpIncExSdk;

use Exception;
use Kigkonsult\PhpIncExSdk\Dto\IODEFdocument      as Dto;
use Kigkonsult\PhpIncExSdk\Json\IODEFdocument     as DtoJson;
use Kigkonsult\PhpIncExSdk\Validate\IODEFdocument as DtoValidator;
use RuntimeException;

class PhpIncExSdk
{
    /**
     * @var null|string
     */
    private ? string $jsonString = null;

    /**
     * @var null|Dto
     */
    private ? Dto $dto = null;

    /**
     * Class factory method
     *
     * @param null|string $jsonString
     * @param null|Dto $dto  IODEFdocument instance
     * @return static
     */
    public static function factory( ? string $jsonString = null, ? Dto $dto = null ) : static
    {
        $instance   = new self();
        if( null !== $jsonString ) {
            $instance->setJsonString( $jsonString );
        }
        if( null !== $dto ) {
            $instance->setDto( $dto );
        }
        return $instance;
    }

    /**
     * Class factory method, parse jsonString into IODEFdocument instance , return static
     *
     * @param string $jsonString
     * @return static
     * @throws RuntimeException
     */
    public static function factoryJsonParse( string $jsonString ) : static
    {
        return self::factory( $jsonString )->jsonParse();
    }

    /**
     * Class factory method, write IODEFdocument instance into jsonString, return static
     *
     * @param Dto $dto                IODEFdocument
     * @param null|bool $prettyPrint  default false
     * @return static
     * @throws RuntimeException
     */
    public static function factoryJsonWrite( Dto $dto, ? bool $prettyPrint = false ) : static
    {
        return self::factory()->jsonWrite( $dto, $prettyPrint );
    }

    /**
     * Parse jsonString into IODEFdocument instance
     *
     * @param null|string $jsonString
     * @param null|int $flags    default JSON_OBJECT_AS_ARRAY | JSON_THROW_ON_ERROR
     * @return static
     * @throws RuntimeException
     */
    public function jsonParse(
        ? string $jsonString = null,
        ? int $flags = JSON_OBJECT_AS_ARRAY | JSON_THROW_ON_ERROR
    ) : static
    {
        static $ERR1  = 'No jsonString to parse';
        static $ERR2  = 'NO json decode result array';
        if( null !== $jsonString ) {
            $this->setJsonString( $jsonString );
        }
        elseif( empty( $this->jsonString )) {
            throw new RuntimeException( $ERR1 );
        }
        $jsonArray = Json::jsonDecode( $this->jsonString, $flags );
        if( ! is_array( $jsonArray )) {
            throw new RuntimeException( $ERR2 );
        }
        try {
            $this->dto = DtoJson::parse( $jsonArray );
        }
        catch( Exception $e ) {
            throw new RuntimeException( $e->getMessage(), $e->getCode(), $e );
        }
        return $this;
    }

    /**
     * Write IODEFdocument instance into jsonString
     *
     * @param null|Dto $dto  IODEFdocument instance
     * @param null|bool $prettyPrint  default false
     * @param null|int $flags    default JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR
     * @return static
     * @throws RuntimeException
     */
    public function jsonWrite(
        ? Dto $dto = null,
        ? bool $prettyPrint = false,
        ? int $flags = JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR
    ) : static
    {
        static $ERR1 = 'No DTO exists for json write';
        $this->ensureDto( $dto, $ERR1 );
        try {
            $jsonArray = DtoJson::write( $this->dto );
        }
        catch( Exception $e ) {
            throw new RuntimeException( $e->getMessage(), $e->getCode(), $e );
        }
        if( $prettyPrint ) {
            $flags |= JSON_PRETTY_PRINT;
        }
        $this->jsonString = Json::jsonEncode( $jsonArray, $flags );
        return $this;
    }

    /**
     * @param null|Dto $dto IODEFdocument instance
     * @param string $errMsg
     * @return void
     */
    private function ensureDto( ? Dto $dto, string $errMsg ) : void
    {
        if( null !== $dto ) {
            $this->setDto( $dto );
        }
        elseif( empty( $this->dto )) {
            throw new RuntimeException( $errMsg );
        }
    }

    /**
     * Validate IODEFdocument Dto instance, return bool true on ok, false with (missing parts) in result
     *
     * @param null|Dto $dto IODEFdocument instance
     * @param array|null $result
     * @return bool
     * @throws RuntimeException
     */
    public function validateDto( ? Dto $dto = null, ? array & $result = [] ) : bool
    {
        static $ERR1 = 'No DTO to validate';
        $this->ensureDto( $dto, $ERR1 );
        return DtoValidator::check( $this->dto, $result );
    }

    /**
     * Getters and Setters
     */

    /**
     * @return null|string
     */
    public function getJsonString() : ? string
    {
        return $this->jsonString;
    }

    /**
     * @param string $jsonString
     * @return static
     */
    public function setJsonString( string $jsonString ) : static
    {
        $this->jsonString = $jsonString;
        return $this;
    }

    /**
     * @return null|Dto
     */
    public function getDto() : ? Dto
    {
        return $this->dto;
    }

    /**
     * @param Dto $dto
     * @return static
     */
    public function setDto( Dto $dto ) : static
    {
        $this->dto = $dto;
        return $this;
    }

}
