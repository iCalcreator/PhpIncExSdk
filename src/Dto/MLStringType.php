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
namespace Kigkonsult\PhpIncExSdk\Dto;

use Kigkonsult\PhpIncExSdk\Dto\Traits\ContentValueTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\LangTrait;

/**
 * The ML_STRING data type is implemented in the data model as the "iodef:MLStringType" type.
 * This type extends the "xs:string" to include two attributes.
 *
 * rfc8727 (/)dual use)
 *  "MLStringType": {
 *  "oneOf": [
 *      {"type": "string"},
 *      {"type": "object",
 *           "properties": {
 *               "value": {"type": "string"},
 *               "lang": {"$ref": "#/definitions/lang"},
 *               "translation-id": {"type": "string"}
 *           },
 *           "required": ["value"],
 *           "additionalProperties":false
 *      }
 * ]
 * }
 */
class MLStringType extends DtoBase
{
    /**
     * Factory method with required property value
     *
     * @param string $value
     * @return static
     */
    public static function factoryValue( string $value ) : static
    {
        return parent::factory()
            ->setValue( $value );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isValueSet());
    }

    /**
     * ATTRIBUTE xml:lang
     *
     * Optional.  ENUM.
     * A language identifier per Section 2.12 of [W3C.XML] whose values and format are described in [RFC5646].
     * The interpretation of this code is described in Section 6. (regexp "[a-zA-Z]{1,8}(-[a-zA-Z0-9]{1,8})*")
     */
    use LangTrait;

    /**
     * ATTRIBUTE translation-id
     *
     * Optional.  STRING.
     * An identifier to relate other instances of this class with the same parent as translations of this text.
     * The scope of this identifier is limited to all of the direct, peer child classes of a given parent class.
     *
     * @var string|null
     */
    private ? string $translationId = null;

    /**
     * @return string|null
     */
    public function getTranslationId() : ? string
    {
        return $this->translationId;
    }

    /**
     * Return bool true if translationId is set
     *
     * @return bool
     */
    public function isTranslationIdSet() : bool
    {
        return ( null !== $this->translationId );
    }

    /**
     * @param string|null $translationId
     * @return static
     */
    public function setTranslationId( ? string $translationId = null ) : static
    {
        $this->translationId = $translationId;
        return $this;
    }

    /**
     * Return bool true if only value is set
     * @return bool
     */
    public function isOnlyValueSet() : bool
    {
        return ( ! $this->isLangSet() && ! $this->isTranslationIdSet() && $this->isValueSet());
    }

    /**
     * Content
     *
     * The content of the class is a character string of type "xs:string"
     * whose language MAY be specified by the xml:lang attribute.
     */
    use ContentValueTrait;
}
