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

use Kigkonsult\PhpIncExSdk\Dto\Traits\ContactManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DescriptionManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtRestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\RestrictionTrait;

/**
 * The Discovery class describes how an incident was detected.
 *
 * No requirements found
 */
class Discovery extends DtoBase
{
    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return true;
    }

    /**
     * ATTRIBUTE source
     *
     * Optional.  ENUM.
     * Categorizes the techniques used to discover the incident.
     * These values are partially derived from Table 3-1 of [NIST800.61rev2].
     * These values are maintained in the "Discovery-source" IANA registry per Section 10.2.
     *    1.   nidps.  Network Intrusion Detection or Prevention System.
     *    2.   hips.  Host-based Intrusion Prevention System.
     *    3.   siem.  Security Information and Event Management System.
     *    4.   av.  Antivirus or antispam software.
     *    5.   third-party-monitoring.  Contracted third-party monitoring service.
     *    6.   incident.  The activity was discovered while investigating an unrelated incident.
     *    7.   os-log.  Operating system logs.
     *    8.   application-log.  Application logs.
     *    9.   device-log.  Network device logs.
     *    10.  network-flow.  Network flow analysis.
     *    11.  passive-dns.  Passive DNS analysis.
     *    12.  investigation.  Manual investigation initiated based on notification of a new vulnerability or exploit.
     *    13.  audit.  Security audit.
     *    14.  internal-notification.  A party within the organization reported the activity.
     *    15.  external-notification.  A party outside of the organization reported the activity.
     *    16.  leo.  A law enforcement organization notified the victim organization.
     *    17.  partner.  A customer or business partner reported the activity to the victim organization.
     *    18.  actor.  The threat actor directly or indirectly reported this activity to the victim organization.
     *    19.  unknown.  Unknown detection approach.
     *    20.  ext-value.  A value used to indicate that this attribute is extended and the actual value
     *                     is provided using the corresponding ext-* attribute.  See (rfc7970) Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $source = null;

    /**
     * @return string|null
     */
    public function getSource() : ? string
    {
        return $this->source;
    }

    /**
     * Return bool true if source is set
     *
     * @return bool
     */
    public function isSourceSet() : bool
    {
        return ( null !== $this->source );
    }

    /**
     * @param string|null $source
     * @return static
     */
    public function setSource( ? string $source = null ) : static
    {
        $this->source = $source;
        return $this;
    }

    /**
     * ATTRIBUTE ext-source
     *
     * Optional.  STRING.
     * A means by which to extend the source attribute.
     * See (rfc7970) Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $extSource = null;

    /**
     * @return string|null
     */
    public function getExtSource() : ? string
    {
        return $this->extSource;
    }

    /**
     * Return bool true if extSource is set
     *
     * @return bool
     */
    public function isExtSourceSet() : bool
    {
        return ( null !== $this->extSource );
    }

    /**
     * @param string|null $extSource
     * @return static
     */
    public function setExtSource( ? string $extSource = null ) : static
    {
        $this->extSource = $extSource;
        return $this;
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
     * ATTRIBUTE ext-restriction
     *
     * Optional.  STRING.
     * A means by which to extend the restriction attribute.
     * See (rfc7970) Section 5.1.1.
     */
    use ExtRestrictionTrait;

    /**
     * Description
     *
     * Zero or more.  ML_STRING.
     * A free-form text description of how  this incident was detected.
     */
    use DescriptionManyTrait;

    /**
     * Contact
     *
     * Zero or more.
     * Contact information for the party that discovered the incident.
     * See (rfc7970) Section 3.9.
     */
    use ContactManyTrait;

    /**
     * DetectionPattern
     *
     * Zero or more.
     * Describes an application-specific configuration that detected the incident.
     * See (rfc7970) Section 3.10.1.
     *
     * @var DetectionPattern[]
     */
    private array $detectionPattern = [];

    /**
     * @return DetectionPattern[]
     */
    public function getDetectionPattern() : array
    {
        return $this->detectionPattern;
    }

    /**
     * Return bool true if detectionPattern is set
     *
     * @return bool
     */
    public function isDetectionPatternSet() : bool
    {
        return ! empty( $this->detectionPattern );
    }

    /**
     * @param DetectionPattern $detectionPattern
     * @return static
     */
    public function addDetectionPattern( DetectionPattern $detectionPattern ) : static
    {
        $this->detectionPattern[] = $detectionPattern;
        return $this;
    }

    /**
     * @param null|DetectionPattern[] $detectionPattern
     * @return static
     */
    public function setDetectionPattern( ? array $detectionPattern = [] ) : static
    {
        $this->detectionPattern = [];
        foreach( $detectionPattern as $theDetectionPattern ) {
            $this->addDetectionPattern( $theDetectionPattern );
        }
        return $this;
    }
}
