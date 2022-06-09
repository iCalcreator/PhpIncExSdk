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

use Kigkonsult\PhpIncExSdk\Dto\Traits\IdTypeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtRestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\NameTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\RestrictionTrait;

/**
 * The IncidentID class represents a tracking number that is unique in the context of the CSIRT.
 * It serves as an identifier for an incident or a document identifier when sharing indicators.
 * This identifier would serve as an index into a CSIRT's incident handling or knowledge management system.
 *
 * The combination of the name attribute and the string in the element content MUST be a globally unique
 * identifier describing the activity. Documents generated by a given CSIRT MUST NOT reuse the same value unless
 * they are referencing the same incident.
 *
 * IncidentID MUST have ATTRIBUTE(s) name and value : id
 */
class IncidentID extends DtoBase
{
    /**
     * Factory method with required properties
     *
     * @param string $name
     * @param string $id    content
     * @return static
     */
    public static function factoryNameId( string  $name, string $id ) : static
    {
        return parent::factory()
            ->setName( $name )
            ->setId( $id );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isNameSet() && $this->isIdSet());
    }

    /**
     * ATTRIBUTE name
     *
     * Required.  STRING.
     * An identifier describing the CSIRT that created the document.
     * In order to have a globally unique CSIRT name, the fully qualified domain name associated with the CSIRT MUST be used.
     */
    use NameTrait;

    /**
     * ATTRIBUTE instance
     *
     * Optional.  STRING.
     * An identifier referencing a subset of the named incident.
     *
     * @var string|null
     */
    private ? string $instance = null;

    /**
     * @return string|null
     */
    public function getInstance() : ? string
    {
        return $this->instance;
    }

    /**
     * Return bool true if instance is set
     *
     * @return bool
     */
    public function isInstanceSet() : bool
    {
        return ( null !== $this->instance );
    }

    /**
     * @param string|null $instance
     * @return static
     */
    public function setInstance( ? string $instance = null ) : static
    {
        $this->instance = $instance;
        return $this;
    }

    /**
     * ATTRIBUTE restriction
     *
     * Optional.  ENUM.
     * See Section 3.3.1.
     * These values are maintained in the "Restriction" IANA registry per Section 10.2.
     *    1.   public.  The information can be freely distributed without restriction.
     *    2.   partner.  The information may be shared within a closed  community of peers, partners,
     *                   or affected parties, but cannot be openly published.
     *    3.   need-to-know.  The information may be shared only within the organization with individuals
     *                        that have a need to know.
     *    4.   private.  The information may not be shared.
     *    5.   default.  The information can be shared according to an information disclosure policy
     *                   pre-arranged by the communicating parties.
     *    6.   white.  Same as 'public'.
     *    7.   green.  Same as 'partner'.
     *    8.   amber.  Same as 'need-to-know'.
     *    9.   red.  Same as 'private'.
     *    10.  ext-value.  A value used to indicate that this attribute is extended and the actual value
     *                     is provided using the corresponding ext-* attribute.  See Section 5.1.1.
     */
    use RestrictionTrait;

    /**
     * ATTRIBUTE extRestriction
     *
     * Optional.  STRING.
     * A means by which to extend the restriction attribute.
     * See Section 5.1.1.
     */
    use ExtRestrictionTrait;

    /**
     * Content name id
     *
     * The content of the class is an incident identifier of type STRING.
     *
     * @var string|null
     */
    private ? string $id = null;

    /**
     * @return string|null
     */
    public function getId() : ? string
    {
        return $this->id;
    }

    /**
     * Return bool true if id is set
     *
     * @return bool
     */
    public function isIdSet() : bool
    {
        return ( null !== $this->id );
    }

    /**
     * @param string|null $id
     * @return static
     */
    public function setId( ? string $id = null ) : static
    {
        $this->id = $id;
        return $this;
    }
}