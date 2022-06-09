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

use Kigkonsult\PhpIncExSdk\Dto\Traits\AssertIDLISTTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\IdTypeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\NameTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\VersionTrait;

/**
 * The IndicatorID class identifies an indicator with a globally unique identifier.
 * The combination of the name and version attributes and the element content form this identifier.
 * Indicators generated by given CSIRT MUST NOT reuse the same value unless they are referencing the same indicator.
 *
 * IndicatorID MUST have ATTRIBUTE(s) name AND version AND value, ID
 */
class IndicatorID extends DtoBase
{
    /**
     * Factory method with required properties
     *
     * @param string $name
     * @param string $version
     * @param string $id    content
     * @return static
     */
    public static function factoryNameVersionId( string $name, string $version, string $id ) : static
    {
        return parent::factory()
            ->setName( $name )
            ->setVersion( $version )
            ->setId( $id );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isNameSet() && $this->isVersionSet() && $this->isIdSet());
    }

    /**
     * ATTRIBUTE name
     *
     * Required.  STRING.
     * An identifier describing the CSIRT that created the indicator.
     * In order to have a globally unique CSIRT name, the fully qualified domain name associated with the CSIRT
     * MUST be used.  This format is identical to the IncidentID@name 'attribute' in Section 3.4.
     */
    use NameTrait;

    /**
     * ATTRIBUTE version
     *
     * Required.  STRING.
     * A version number of an indicator.
     */
    use VersionTrait;

    /**
     * Content name id
     * The content of the class is of type ID and specifies an identifier for an indicator.
     */
    use IdTypeTrait;
    use AssertIDLISTTrait;
}