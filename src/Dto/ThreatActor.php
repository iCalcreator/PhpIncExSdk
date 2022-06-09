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
use Kigkonsult\PhpIncExSdk\Dto\Traits\DescriptionManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtRestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\RestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\UrlManyTrait;

/**
 *  The ThreatActor class describes a threat actor.
 *
 * The ThreatActor class MUST have at least one instance of ThreatActorID, URL, Description, AdditionalData
 */
class ThreatActor extends DtoBase
{
    /**
     * Factory method with property ThreatActorID
     *
     * @param string $threatActorID
     * @return static
     */
    public static function factoryThreatActorID( string $threatActorID ) : static
    {
        return parent::factory()
            ->addThreatActorID( $threatActorID );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isThreatActorIDSet() ||
            $this->isURLSet() ||
            $this->isDescriptionSet() ||
            $this->isAdditionalDataSet()
        );
    }

    /**
     * ATTRIBUTE restriction
     *
     * Optional.  ENUM.
     * See (rfc7970) Section 3.3.1.
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
     *                     is provided using the corresponding ext-* attribute.  See (rfc7970) Section 5.1.1.
     */
    use RestrictionTrait;

    /**
     * ATTRIBUTE  ext-restriction
     *
     * Optional.  STRING.
     * A means by which to extend the restriction attribute.
     * See (rfc7970) Section 5.1.1.
     */
    use ExtRestrictionTrait;

    /**
     * ThreatActorID
     *
     * Zero or more.  STRING.  An identifier for the threat actor.
     *
     * @var string[]
     */
    private array $threatActorID = [];

    /**
     * @return string[]
     */
    public function getThreatActorID() : array
    {
        return $this->threatActorID;
    }

    /**
     * Return bool true if threatActorID is not empty
     *
     * @return bool
     */
    public function isThreatActorIDSet() : bool
    {
        return ! empty( $this->threatActorID );
    }

    /**
     * @param string $threatActorID
     * @return static
     */
    public function addThreatActorID( string $threatActorID ) : static
    {
        $this->threatActorID[] = $threatActorID;
        return $this;
    }

    /**
     * @param null|string[] $threatActorID
     * @return static
     */
    public function setThreatActorID( ? array $threatActorID = [] ) : static
    {
        $this->threatActorID = [];
        foreach( $threatActorID as $theThreatActorID) {
            $this->addThreatActorID( $theThreatActorID );
        }
        return $this;
    }

    /**
     * URL
     *
     * Zero or more.  URL.
     * A URL to a reference describing the threat actor.
     */
    use UrlManyTrait;

    /**
     * Description
     *
     * Zero or more.  ML_STRING.
     * A description of the threat actor.
     */
    use DescriptionManyTrait;

    /**
     * AdditionalData
     *
     * Zero or more.  EXTENSION.
     * Mechanism by which to extend the data model.
     */
    use AdditionalDataManyTrait;
}
