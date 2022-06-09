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

use DateTime;
use Exception;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ActionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\AdditionalDataManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ContactOneTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DateTimeTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DefinedCOAManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\DescriptionManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtActionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ExtRestrictionTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\IncidentIDOneTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\ObservableIdTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\RestrictionTrait;

/**
 * The HistoryItem class is an entry in the History (Section 3.13) log that documents a particular action or event
 * that occurred in the course of handling the incident.
 * The details of the entry are a free-form text description, but each can be categorized with the type attribute.
 *
 * HistoryItem MUST have ATTRIBUTE(s) action
 * HistoryItem MUST have at least one instance of DateTime
 */
class HistoryItem extends DtoBase
{
    /**
     * Factory method with required properties
     *
     * @param string $action
     * @param string|DateTime $dateTime
     * @return static
     * @throws Exception
     */
    public static function factoryActionDateTime( string $action, string|DateTime $dateTime ) : static
    {
        return parent::factory()
            ->setAction( $action )
            ->setDateTime( $dateTime );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isActionSet() && $this->isDateTimeSet());
    }

    /**
     * Attribute action
     *
     * Required.  ENUM.
     * Classifies a performed action or occurrence documented in this history log entry.
     * As activity will likely have been instigated either through a previously conveyed
     * expectation or through an internal investigation, this attribute is identical to the action
     * attribute of the Expectation class. The difference is only one of tense.
     * When an action is in this class, it has been completed.  See Section 3.15.
     *
     * Classifies the type of action requested.
     * The default value of "other".
     * These values are maintained in the "Expectation-action" IANA registry per Section 10.2.
     *    1.   nothing.  No action is requested.  Do nothing with the information.
     *    2.   contact-source-site.  Contact the site(s) identified as the source of the activity.
     *    3.   contact-target-site.  Contact the site(s) identified as the target of the activity.
     *    4.   contact-sender.  Contact the originator of the document.
     *    5.   investigate.  Investigate the system(s) listed in the event.
     *    6.   block-host.  Block traffic from the machine(s) listed as sources in the event.
     *    7.   block-network.  Block traffic from the network(s) lists as sources in the event.
     *    8.   block-port.  Block the port listed as sources in the event.
     *    9.   rate-limit-host.  Rate-limit the traffic from the machine(s) listed as sources in the event.
     *    10.  rate-limit-network.  Rate-limit the traffic from the network(s) lists as sources in the event.
     *    11.  rate-limit-port.  Rate-limit the port(s) listed as sources in the event.
     *    12.  redirect-traffic.  Redirect traffic from the intended recipient for further analysis.
     *    13.  honeypot.  Redirect traffic from systems listed in the event to a honeypot for further analysis.
     *    14.  upgrade-software.  Upgrade or patch the software or firmware on an asset listed in the event.
     *    15.  rebuild-asset.  Reinstall the operating system or applications on an asset listed in the event.
     *    16.  harden-asset.  Change the configuration of an asset listed in the event to reduce the attack surface.
     *    17.  remediate-other.  Remediate the activity in a way other than by rate-limiting or blocking.
     *    18.  status-triage.  Confirm receipt and begin triaging the incident.
     *    19.  status-new-info.  Notify the sender when new information is received for this incident.
     *    20.  watch-and-report.  Watch for the described activity or indicators, and notify the sender when seen.
     *    21.  training.  Train user to identify or mitigate the described threat.
     *    22.  defined-coa.  Perform a predefined course of action (COA). The COA is named in the DefinedCOA class.
     *    23.  other.  Perform a custom action described in the Description class.
     *    24.  ext-value.  A value used to indicate that this attribute is extended and the actual value
     *                     is provided using the corresponding ext-* attribute.  See Section 5.1.1.
     */
    use ActionTrait;

    /**
     * Attribute ext-action
     *
     * Optional.  STRING.
     * A means by which to extend the action attribute.
     * See Section 5.1.1.
     */
    use ExtActionTrait;

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
     * ATTRIBUTE observable-id
     *
     * Optional.  ID.  See Section 3.3.2.
     */
    use ObservableIdTrait;

    /**
     * DateTime
     *
     * One.  DATETIME.
     * A timestamp of this entry in the history log.
     * YYYY-mm-ddThh:mm:dd(.ss+)? (('+' | '-') hh ':' mm) | 'Z'
     */
    use DateTimeTrait;

    /**
     * IncidentID
     *
     * Zero or one.
     * In a history log created by multiple parties, the IncidentID provides a mechanism* to specify
     * which CSIRT created a particular entry and references this organization's tracking number.
     * When a single organization is maintaining the log, this class can be ignored.
     * See Section 3.4.
     */
    use IncidentIDOneTrait;

    /**
     * Contact
     *
     * Zero or one.
     * Provides contact information for the entity that performed the action documented in this class.
     * See Section 3.9.
     */
    use ContactOneTrait;

    /**
     * Description
     *
     * Zero or more.  ML_STRING.
     * A free-form text description of the action or event.
     */
    use DescriptionManyTrait;

    /*
     * DefinedCOA
     *
     * Zero or more.  STRING.
     * An identifier meaningful to the sender and recipient of this document that references a course of action (COA).
     * This class MUST be present if the action attribute is set  to "defined-coa".
     */
    use DefinedCOAManyTrait;

    /**
     * AdditionalData
     *
     * Zero or more.  EXTENSION.
     * Mechanism by which to extend the data model.
     */
    use AdditionalDataManyTrait;
}
