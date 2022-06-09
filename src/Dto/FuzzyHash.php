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

use Kigkonsult\PhpIncExSdk\Dto\Traits\AdditionalDataManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ApplicationTrait;

/**
 * The FuzzyHash class describes a fuzzy hash and the application used to generate it.
 *
 * FuzzyHash MUST have at least one instance of FuzzyHashValue
 */
class FuzzyHash extends DtoBase
{
    /**
     * Factory method with required FuzzyHashValue properties
     *
     * @param ExtensionType $fuzzyHashValue
     * @return static
     */
    public static function factoryExtensionType( ExtensionType $fuzzyHashValue ) : static
    {
        return parent::factory()
            ->addFuzzyHashValue( $fuzzyHashValue );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return $this->isFuzzyHashValueSet();
    }

    /**
     * FuzzyHashValue
     *
     * One or more.  EXTENSION.
     * The computed fuzzy hash value.
     *
     * @var ExtensionType[]
     */
    private array $fuzzyHashValue = [];

    /**
     * @return ExtensionType[]
     */
    public function getFuzzyHashValue() : array
    {
        return $this->fuzzyHashValue;
    }

    /**
     * Return bool true if fuzzyHashValue is not empty
     *
     * @return bool
     */
    public function isFuzzyHashValueSet() : bool
    {
        return ! empty( $this->fuzzyHashValue );
    }

    /**
     * @param ExtensionType $fuzzyHashValue
     * @return static
     */
    public function addFuzzyHashValue( ExtensionType $fuzzyHashValue ) : static
    {
        $this->fuzzyHashValue[] = $fuzzyHashValue;
        return $this;
    }

    /**
     * @param null|ExtensionType[] $fuzzyHashValue
     * @return static
     */
    public function setFuzzyHashValue( ? array $fuzzyHashValue = [] ) : static
    {
        $this->fuzzyHashValue = [];
        foreach( $fuzzyHashValue as $extensionType ) {
            $this->addFuzzyHashValue( $extensionType );
        }
        return $this;
    }

    /**
     * Application
     *
     * Zero or one.  SOFTWARE.
     * The application used to calculate the  hash.
     */
    use  ApplicationTrait;

    /**
     * AdditionalData
     *
     * Zero or more.  EXTENSION.
     * Mechanism by which to extend the data  model.
     */
    use AdditionalDataManyTrait;
}
