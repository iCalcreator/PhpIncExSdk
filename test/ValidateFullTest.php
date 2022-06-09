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

use PHPUnit\Framework\TestCase;

/**
 * Testing Validators in ascending Dto class file size order on 'full' Dto's
 */
class ValidateFullTest extends TestCase
{
    /**
     * @param bool $check
     * @param null|array $result
     * @param string $function
     */
    public function checkCheckTrue( string $function, bool $check, ? array $result = [] ) : void
    {
        $this->assertTrue(
            $check,
            $function . ' #4 error ' . var_export( $result ?? [], true )
        );
        $this->assertCount(
            0,
            $result ?? [],
            $function . ' #5 error ' . var_export( $result, true )
        );
    }

    /**
     * Test full Weakness
     *
     * @test
     */
    public function WeaknessTest() : void
    {
        $check = Validate\Weakness::check(
            DtoLoad\Weakness::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Scoring
     *
     * @test
     */
    public function ScoringTest() : void
    {
        $check = Validate\Scoring::check(
            DtoLoad\Scoring::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Platform
     *
     * @test
     */
    public function PlatformTest() : void
    {
        $check = Validate\Platform::check(
            DtoLoad\Platform::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full AttackPattern
     *
     * @test
     */
    public function AttackPatternTest() : void
    {
        $check = Validate\AttackPattern::check(
            DtoLoad\AttackPattern::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Vulnerability
     *
     * @test
     */
    public function VulnerabilityTest() : void
    {
        $check = Validate\Vulnerability::check(
            DtoLoad\Vulnerability::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full IntendedImpact
     *
     * @test
     */
    public function IntendedImpactTest() : void
    {
        $check = Validate\IntendedImpact::check(
            DtoLoad\IntendedImpact::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full BusinessImpact
     *
     * @test
     */
    public function BusinessImpactTest() : void
    {
        $check = Validate\BusinessImpact::check(
            DtoLoad\BusinessImpact::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full BulkObservableFormat
     *
     * @test
     */
    public function BulkObservableFormatTest() : void
    {
        $check = Validate\BulkObservableFormat::check(
            DtoLoad\BulkObservableFormat::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full WindowsRegistryKeysModified
     *
     * @test
     */
    public function WindowsRegistryKeysModifiedTest() : void
    {
        $check = Validate\WindowsRegistryKeysModified::check(
            DtoLoad\WindowsRegistryKeysModified::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Certificate
     *
     * @test
     */
    public function CertificateTest() : void
    {
        $check = Validate\Certificate::check(
            DtoLoad\Certificate::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Nameservers
     *
     * @test
     */
    public function NameserversTest() : void
    {
        $check = Validate\Nameservers::check(
            DtoLoad\Nameservers::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full IndicatorID
     *
     * @test
     */
    public function IndicatorIDTest() : void
    {
        $check = Validate\IndicatorID::check(
            DtoLoad\IndicatorID::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full ReferenceName
     *
     * @test
     */
    public function ReferenceNameTest() : void
    {
        $check = Validate\ReferenceName::check(
            DtoLoad\ReferenceName::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full DomainContacts
     *
     * @test
     */
    public function DomainContactsTest() : void
    {
        $check = Validate\DomainContacts::check(
            DtoLoad\DomainContacts::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full SoftwareType
     *
     * @test
     */
    public function SoftwareTypeTest() : void
    {
        $check = Validate\SoftwareType::check(
            DtoLoad\SoftwareType::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full FuzzyHash
     *
     * @test
     */
    public function FuzzyHashTest() : void
    {
        $check = Validate\FuzzyHash::check(
            DtoLoad\FuzzyHash::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full IndicatorReference
     *
     * @test
     */
    public function IndicatorReferenceTest() : void
    {
        $check = Validate\IndicatorReference::check(
            DtoLoad\IndicatorReference::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full ServiceName
     *
     * @test
     */
    public function ServiceNameTest() : void
    {
        $check = Validate\ServiceName::check(
            DtoLoad\ServiceName::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Reference
     *
     * @test
     */
    public function ReferenceTest() : void
    {
        $check = Validate\Reference::check(
            DtoLoad\Reference::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full MonetaryImpact
     *
     * @test
     */
    public function MonetaryImpactTest() : void
    {
        $check = Validate\MonetaryImpact::check(
            DtoLoad\MonetaryImpact::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Email
     *
     * @test
     */
    public function EmailTest() : void
    {
        $check = Validate\Email::check(
            DtoLoad\Email::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full AlternativeID
     *
     * @test
     */
    public function AlternativeIDTest() : void
    {
        $check = Validate\AlternativeID::check(
            DtoLoad\AlternativeID::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full AttackPhase
     *
     * @test
     */
    public function AttackPhaseTest() : void
    {
        $check = Validate\AttackPhase::check(
            DtoLoad\AttackPhase::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full PostalAddress
     *
     * @test
     */
    public function PostalAddressTest() : void
    {
        $check = Validate\PostalAddress::check(
            DtoLoad\PostalAddress::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Telephone
     *
     * @test
     */
    public function TelephoneTest() : void
    {
        $check = Validate\Telephone::check(
            DtoLoad\Telephone::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full MLStringType
     *
     * @test
     */
    public function MLStringTypeTest() : void
    {
        $check = Validate\MLStringType::check(
            DtoLoad\MLStringType::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full FileData
     *
     * @test
     */
    public function FileDataTest() : void
    {
        $check = Validate\FileData::check(
            DtoLoad\FileData::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full AlternativeIndicatorID
     *
     * @test
     */
    public function AlternativeIndicatorIDTest() : void
    {
        $check = Validate\AlternativeIndicatorID::check(
            DtoLoad\AlternativeIndicatorID::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full History
     *
     * @test
     */
    public function HistoryTest() : void
    {
        $check = Validate\History::check(
            DtoLoad\History::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Confidence
     *
     * @test
     */
    public function ConfidenceTest() : void
    {
        $check = Validate\Confidence::check(
            DtoLoad\Confidence::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full CertificateData
     *
     * @test
     */
    public function CertificateDataTest() : void
    {
        $check = Validate\CertificateData::check(
            DtoLoad\CertificateData::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full RegistryHandle
     *
     * @test
     */
    public function RegistryHandleTest() : void
    {
        $check = Validate\RegistryHandle::check(
            DtoLoad\RegistryHandle::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Hash
     *
     * @test
     */
    public function HashTest() : void
    {
        $check = Validate\Hash::check(
            DtoLoad\Hash::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Campaign
     *
     * @test
     */
    public function CampaignTest() : void
    {
        $check = Validate\Campaign::check(
            DtoLoad\Campaign::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full ThreatActor
     *
     * @test
     */
    public function ThreatActorTest() : void
    {
        $check = Validate\ThreatActor::check(
            DtoLoad\ThreatActor::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full IncidentID
     *
     * @test
     */
    public function IncidentIDTest() : void
    {
        $check = Validate\IncidentID::check(
            DtoLoad\IncidentID::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full NodeRole
     *
     * @test
     */
    public function NodeRoleTest() : void
    {
        $check = Validate\NodeRole::check(
            DtoLoad\NodeRole::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Node
     *
     * @test
     */
    public function NodeTest() : void
    {
        $check = Validate\Node::check(
            DtoLoad\Node::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full DetectionPattern
     *
     * @test
     */
    public function DetectionPatternTest() : void
    {
        $check = Validate\DetectionPattern::check(
            DtoLoad\DetectionPattern::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Key
     *
     * @test
     */
    public function KeyTest() : void
    {
        $check = Validate\Key::check(
            DtoLoad\Key::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full SoftwareReference
     *
     * @test
     */
    public function SoftwareReferenceTest() : void
    {
        $check = Validate\SoftwareReference::check(
            DtoLoad\SoftwareReference::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Address
     *
     * @test
     */
    public function AddressTest() : void
    {
        $check = Validate\Address::check(
            DtoLoad\Address::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full SystemImpact
     *
     * @test
     */
    public function SystemImpactTest() : void
    {
        $check = Validate\SystemImpact::check(
            DtoLoad\SystemImpact::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full TimeImpact
     *
     * @test
     */
    public function TimeImpactTest() : void
    {
        $check = Validate\TimeImpact::check(
            DtoLoad\TimeImpact::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full RecordPattern
     *
     * @test
     */
    public function RecordPatternTest() : void
    {
        $check = Validate\RecordPattern::check(
            DtoLoad\RecordPattern::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Counter
     *
     * @test
     */
    public function CounterTest() : void
    {
        $check = Validate\Counter::check(
            DtoLoad\Counter::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full File
     *
     * @test
     */
    public function FileTest() : void
    {
        $check = Validate\File::check(
            DtoLoad\File::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full ExtensionType
     *
     * @test
     */
    public function ExtensionTypeTest() : void
    {
        $check = Validate\ExtensionType::check(
            DtoLoad\ExtensionType::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full IndicatorExpression
     *
     * @test
     */
    public function IndicatorExpressionTest() : void
    {
        $check = Validate\IndicatorExpression::check(
            DtoLoad\IndicatorExpression::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Discovery
     *
     * @test
     */
    public function DiscoveryTest() : void
    {
        $check = Validate\Discovery::check(
            DtoLoad\Discovery::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full RelatedActivity
     *
     * @test
     */
    public function RelatedActivityTest() : void
    {
        $check = Validate\RelatedActivity::check(
            DtoLoad\RelatedActivity::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Method
     *
     * @test
     */
    public function MethodTest() : void
    {
        $check = Validate\Method::check(
            DtoLoad\Method::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full HashData
     *
     * @test
     */
    public function HashDataTest() : void
    {
        $check = Validate\HashData::check(
            DtoLoad\HashData::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full BulkObservable
     *
     * @test
     */
    public function BulkObservableTest() : void
    {
        $check = Validate\BulkObservable::check(
            DtoLoad\BulkObservable::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Expectation
     *
     * @test
     */
    public function ExpectationTest() : void
    {
        $check = Validate\Expectation::check(
            DtoLoad\Expectation::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full HistoryItem
     *
     * @test
     */
    public function HistoryItemTest() : void
    {
        $check = Validate\HistoryItem::check(
            DtoLoad\HistoryItem::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Service
     *
     * @test
     */
    public function ServiceTest() : void
    {
        $check = Validate\Service::check(
            DtoLoad\Service::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full EmailData
     *
     * @test
     */
    public function EmailDataTest() : void
    {
        $check = Validate\EmailData::check(
            DtoLoad\EmailData::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full RecordData
     *
     * @test
     */
    public function RecordDataTest() : void
    {
        $check = Validate\RecordData::check(
            DtoLoad\RecordData::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full EventData
     *
     * @test
     */
    public function EventDataTest() : void
    {
        $check = Validate\EventData::check(
            DtoLoad\EventData::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Indicator
     *
     * @test
     */
    public function IndicatorTest() : void
    {
        $check = Validate\Indicator::check(
            DtoLoad\Indicator::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full DomainData
     *
     * @test
     */
    public function DomainDataTest() : void
    {
        $check = Validate\DomainData::check(
            DtoLoad\DomainData::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full System
     *
     * @test
     */
    public function SystemTest() : void
    {
        $check = Validate\System::check(
            DtoLoad\System::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Assessment
     *
     * @test
     */
    public function AssessmentTest() : void
    {
        $check = Validate\Assessment::check(
            DtoLoad\Assessment::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Contact
     *
     * @test
     */
    public function ContactTest() : void
    {
        $check = Validate\Contact::check(
            DtoLoad\Contact::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Observable
     *
     * @test
     */
    public function ObservableTest() : void
    {
        $check = Validate\Observable::check(
            DtoLoad\Observable::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full Incident
     *
     * @test
     */
    public function IncidentTest() : void
    {
        $check = Validate\Incident::check(
            DtoLoad\Incident::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }

    /**
     * Test full IODEFdocument
     *
     * @test
     */
    public function IODEFdocumentTest() : void
    {
        $check = PhpIncExSdk::factory()->validateDto(
            DtoLoad\IODEFdocument::load( true ),
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements
    }
}
