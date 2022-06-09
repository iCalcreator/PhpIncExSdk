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
use Kigkonsult\PhpIncExSdk\Dto\Traits\ConfidenceTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DescriptionManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtRestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\IncidentIDManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\RestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\UrlManyTrait;

/**
 * The RelatedActivity class relates the information described in the rest of the document
 * to previously observed incidents or activity and allows attribution to a specific actor or campaign.
 *
 * The RelatedActivity class MUST have at least one instance of any of the following child classes:
 * IncidentID, URL, ThreatActor, Campaign, Description, or AdditionalData.
 */
class RelatedActivity extends DtoBase
{
    /**
     * Factory method with property IncidentID
     *
     * @param IncidentID $incidentID
     * @return static
     */
    public static function factoryIncidentID( IncidentID $incidentID ) : static
    {
        return parent::factory()
            ->addIncidentID( $incidentID );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isIncidentIDSet() ||
            $this->isURLSet() ||
            $this->isThreatActorSet() ||
            $this->isCampaignSet() ||
            $this->isDescriptionSet() ||
            $this->isAdditionalDataSet()
        );
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
     * ATTRIBUTE ext-restriction
     *
     * Optional.  STRING.
     * A means by which to extend the restriction attribute.
     * See Section 5.1.1.
     */
    use ExtRestrictionTrait;

    /**
     * IncidentID
     *
     * Zero or more.
     * The tracking number of a related incident.
     * See Section 3.4.
     */
    use IncidentIDManyTrait;

    /**
     * URL
     *
     * Zero or more.  URL.
     * A URL to activity related to this incident.
     */
    use UrlManyTrait;

    /**
     * ThreatActor
     *
     * Zero or more.
     * The threat actor to whom the incident activity is attributed.
     * See Section 3.7.
     *
     * @var ThreatActor[]
     */
    private array $threatActor = [];

    /**
     * @return ThreatActor[]
     */
    public function getThreatActor() : array
    {
        return $this->threatActor;
    }

    /**
     * Return bool true if threatActor is set
     *
     * @return bool
     */
    public function isThreatActorSet() : bool
    {
        return ! empty( $this->threatActor );
    }

    /**
     * @param ThreatActor $threatActor
     * @return static
     */
    public function addThreatActor( ThreatActor $threatActor ) : static
    {
        $this->threatActor[] = $threatActor;
        return $this;
    }

    /**
     * @param null|ThreatActor[] $threatActor
     * @return static
     */
    public function setThreatActor( ? array $threatActor = [] ) : static
    {
        $this->threatActor = [];
        foreach( $threatActor as $theThreatActor ) {
            $this->addThreatActor( $theThreatActor );
        }
        return $this;
    }

    /**
     * Campaign
     *
     * Zero or more.
     * The campaign of a given threat actor to whom the described activity is attributed.
     * See Section 3.8.
     *
     * @var Campaign[]
     */
    private array $campaign = [];

    /**
     * @return Campaign[]
     */
    public function getCampaign() : array
    {
        return $this->campaign;
    }

    /**
     * Return bool true if campaign is set
     *
     * @return bool
     */
    public function isCampaignSet() : bool
    {
        return ! empty( $this->campaign );
    }

    /**
     * @param Campaign $campaign
     * @return static
     */
    public function addCampaign( Campaign $campaign ) : static
    {
        $this->campaign[] = $campaign;
        return $this;
    }

    /**
     * @param null|Campaign[] $campaign
     * @return static
     */
    public function setCampaign( ? array $campaign = [] ) : static
    {
        $this->campaign = [];
        foreach( $campaign as $theCampaign ) {
            $this->addCampaign( $theCampaign );
        }
        return $this;
    }

    /**
     * IndicatorID
     *
     * Zero or more.
     * A reference to a related indicator.
     * See Section 3.4.
     *
     * @var IndicatorID[]
     */
    private array $indicatorID = [];

    /**
     * @return IndicatorID[]
     */
    public function getIndicatorID() : array
    {
        return $this->indicatorID;
    }

    /**
     * Return bool true if indicatorID is set
     *
     * @return bool
     */
    public function isIndicatorIDSet() : bool
    {
        return ! empty( $this->indicatorID );
    }

    /**
     * @param IndicatorID $indicatorID
     * @return static
     */
    public function addIndicatorID( IndicatorID $indicatorID ) : static
    {
        $this->indicatorID[] = $indicatorID;
        return $this;
    }

    /**
     * @param null|IndicatorID[] $indicatorID
     * @return static
     */
    public function setIndicatorID( ? array $indicatorID = [] ) : static
    {
        $this->indicatorID = [];
        foreach( $indicatorID as $theIndicatorID ) {
            $this->addIndicatorID( $theIndicatorID );
        }
        return $this;
    }

    /**
     * Confidence
     *
     * Zero or one.
     * An estimate of the confidence in attributing this  RelatedActivity to the events described in the document.
     * See Section 3.12.5.
     */
    use ConfidenceTrait;

    /**
     * Description
     *
     * Zero or more.  ML_STRING.
     * A description of how these relationships were derived.
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
