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

use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * Testing factory methods in ascending Dto class file size order
 */
class FactoryTest extends TestCase
{
    /**
     * @var string
     */
    protected static string $TEST = 'test';

    /**
     * Test static factory in Weakness
     *
     * @test
     */
    public function WeaknessTest() : void
    {
        $dto = Dto\Weakness::factorySpecId( self::$TEST );
        $this->assertInstanceOf( Dto\Weakness::class, $dto );
        $this->assertTrue( $dto->isSpecIdSet());
    }

    /**
     * Test static factory in Scoring
     *
     * @test
     */
    public function ScoringTest() : void
    {
        $dto = Dto\Scoring::factorySpecId( self::$TEST );
        $this->assertInstanceOf( Dto\Scoring::class, $dto );
        $this->assertTrue( $dto->isSpecIdSet());
    }

    /**
     * Test static factory in Platform
     *
     * @test
     */
    public function PlatformTest() : void
    {
        $dto = Dto\Platform::factorySpecId( self::$TEST );
        $this->assertInstanceOf( Dto\Platform::class, $dto );
        $this->assertTrue( $dto->isSpecIdSet());
    }

    /**
     * Test static factory in AttackPattern
     *
     * @test
     */
    public function AttackPatternTest() : void
    {
        $dto = Dto\AttackPattern::factorySpecId( self::$TEST );
        $this->assertInstanceOf( Dto\AttackPattern::class, $dto );
        $this->assertTrue( $dto->isSpecIdSet());
    }

    /**
     * Test static factory in Vulnerability
     *
     * @test
     */
    public function VulnerabilityTest() : void
    {
        $dto = Dto\Vulnerability::factorySpecId( self::$TEST );
        $this->assertInstanceOf( Dto\Vulnerability::class, $dto );
        $this->assertTrue( $dto->isSpecIdSet());
    }

    /**
     * Test static factory in IntendedImpact
     *
     * @test
     */
    public function IntendedImpactTest() : void
    {
        $dto = Dto\IntendedImpact::factoryType( self::$TEST );
        $this->assertInstanceOf( Dto\IntendedImpact::class, $dto );
        $this->assertTrue( $dto->isTypeSet());
    }

    /**
     * Test static factory in BusinessImpact
     *
     * @test
     */
    public function BusinessImpactTest() : void
    {
        $dto = Dto\BusinessImpact::factoryType( self::$TEST );
        $this->assertInstanceOf( Dto\BusinessImpact::class, $dto );
        $this->assertTrue( $dto->isTypeSet());
    }

    /**
     * Test static factory in BulkObservableFormat
     *
     * @test
     */
    public function BulkObservableFormatTest() : void
    {
        $dto = Dto\BulkObservableFormat::factory();
        $this->assertInstanceOf( Dto\BulkObservableFormat::class, $dto );
    }

    /**
     * Test static factory in WindowsRegistryKeysModified
     *
     * @test
     */
    public function WindowsRegistryKeysModifiedTest() : void
    {
        $dto = Dto\WindowsRegistryKeysModified::factoryKey( Dto\Key::factoryKeyName( self::$TEST ));
        $this->assertInstanceOf( Dto\WindowsRegistryKeysModified::class, $dto );
        $this->assertTrue( $dto->isKeySet());
    }

    /**
     * Test static factory in Certificate
     *
     * @test
     */
    public function CertificateTest() : void
    {
        $dto = Dto\Certificate::factoryX509Data( self::$TEST );
        $this->assertInstanceOf( Dto\Certificate::class, $dto );
        $this->assertTrue( $dto->isX509DataSet());
    }

    /**
     * Test static factory in Nameservers
     *
     * @test
     */
    public function NameserversTest() : void
    {
        $dto = Dto\Nameservers::factoryServerAddress(
            self::$TEST,
            Dto\Address::factoryCategoryValue( self::$TEST, self::$TEST )
        );
        $this->assertInstanceOf( Dto\Nameservers::class, $dto );
        $this->assertTrue( $dto->isServerSet());
        $this->assertTrue( $dto->isAddressSet());
    }

    /**
     * Test static factory in IndicatorID
     *
     * @test
     */
    public function IndicatorIDTest() : void
    {
        $dto = Dto\IndicatorID::factoryNameVersionId( self::$TEST, self::$TEST, self::$TEST );
        $this->assertInstanceOf( Dto\IndicatorID::class, $dto );
        $this->assertTrue( $dto->isNameSet());
        $this->assertTrue( $dto->isVersionSet());
        $this->assertTrue( $dto->isIdSet());
    }

    /**
     * Test static factory in ReferenceName
     *
     * @test
     */
    public function ReferenceNameTest() : void
    {
        $dto = Dto\ReferenceName::factorySpecIndexId( 123, self::$TEST );
        $this->assertInstanceOf( Dto\ReferenceName::class, $dto );
        $this->assertTrue( $dto->isSpecIndexSet());
        $this->assertTrue( $dto->isIdSet());
    }

    /**
     * Test static factory in DomainContacts
     *
     * @test
     */
    public function DomainContactsTest() : void
    {
        $dto = Dto\DomainContacts::factoryContact( Dto\Contact::factory());
        $this->assertInstanceOf( Dto\DomainContacts::class, $dto );
        $this->assertTrue( $dto->isContactSet());
    }

    /**
     * Test static factory in SoftwareType
     *
     * @test
     */
    public function SoftwareTypeTest() : void
    {
        $dto = Dto\SoftwareType::factory();
        $this->assertInstanceOf( Dto\SoftwareType::class, $dto );

        $dto = Dto\SoftwareType::factorySoftwareReference( Dto\SoftwareReference::factorySpecname( self::$TEST ));
        $this->assertInstanceOf( Dto\SoftwareType::class, $dto );
        $this->assertTrue( $dto->isSoftwareReferenceSet());
    }

    /**
     * Test static factory in FuzzyHash
     *
     * @test
     */
    public function FuzzyHashTest() : void
    {
        $dto = Dto\FuzzyHash::factoryExtensionType(
            Dto\ExtensionType::factoryDtypeValue( self::$TEST, self::$TEST )
        );
        $this->assertInstanceOf( Dto\FuzzyHash::class, $dto );
        $this->assertTrue( $dto->isFuzzyHashValueSet());
    }

    /**
     * Test static factory in IndicatorReference
     *
     * @test
     */
    public function IndicatorReferenceTest() : void
    {
        $dto = Dto\IndicatorReference::factory();
        $this->assertInstanceOf( Dto\IndicatorReference::class, $dto );
    }

    /**
     * Test static factory in ServiceName
     *
     * @test
     */
    public function ServiceNameTest() : void
    {
        $dto = Dto\ServiceName::factory();
        $this->assertInstanceOf( Dto\ServiceName::class, $dto );
    }

    /**
     * Test static factory in Reference
     *
     * @test
     */
    public function ReferenceTest() : void
    {
        $dto = Dto\Reference::factory();
        $this->assertInstanceOf( Dto\Reference::class, $dto );
    }

    /**
     * Test static factory in MonetaryImpact
     *
     * @test
     */
    public function MonetaryImpactTest() : void
    {
        $dto = Dto\MonetaryImpact::factoryValue( 12345.00 );
        $this->assertInstanceOf( Dto\MonetaryImpact::class, $dto );
        $this->assertTrue( $dto->isValueSet());
    }

    /**
     * Test static factory in Email
     *
     * @test
     */
    public function EmailTest() : void
    {
        $dto = Dto\Email::factoryEmailTo( self::$TEST );
        $this->assertInstanceOf( Dto\Email::class, $dto );
        $this->assertTrue( $dto->isEmailToSet());
    }

    /**
     * Test static factory in AlternativeID
     *
     * @test
     */
    public function AlternativeIDTest() : void
    {
        $dto = Dto\AlternativeID::factoryIncidentId( Dto\IncidentID::factoryNameId( self::$TEST, self::$TEST ));
        $this->assertInstanceOf( Dto\AlternativeID::class, $dto );
        $this->assertTrue( $dto->isIncidentIDSet());
    }

    /**
     * Test static factory in AttackPhase
     *
     * @test
     */
    public function AttackPhaseTest() : void
    {
        $dto = Dto\AttackPhase::factory();
        $this->assertInstanceOf( Dto\AttackPhase::class, $dto );

        $dto = Dto\AttackPhase::factoryAttackPhaseID( self::$TEST );
        $this->assertInstanceOf( Dto\AttackPhase::class, $dto );
        $this->assertTrue( $dto->isAttackPhaseIDSet());
    }

    /**
     * Test static factory in PostalAddress
     *
     * @test
     */
    public function PostalAddressTest() : void
    {
        $dto = Dto\PostalAddress::factoryPAddress( self::$TEST );
        $this->assertInstanceOf( Dto\PostalAddress::class, $dto );
        $this->assertTrue( $dto->isPAddressSet());
    }

    /**
     * Test static factory in Telephone
     *
     * @test
     */
    public function TelephoneTest() : void
    {
        $dto = Dto\Telephone::factoryTelephoneNumber( self::$TEST );
        $this->assertInstanceOf( Dto\Telephone::class, $dto );
        $this->assertTrue( $dto->isTelephoneNumberSet());
    }

    /**
     * Test static factory in MLStringType
     *
     * @test
     */
    public function MLStringTypeTest() : void
    {
        $dto = Dto\MLStringType::factoryValue( self::$TEST );
        $this->assertInstanceOf( Dto\MLStringType::class, $dto );
        $this->assertTrue( $dto->isValueSet());
    }

    /**
     * Test static factory in FileData
     *
     * @test
     */
    public function FileDataTest() : void
    {
        $dto = Dto\FileData::factoryFile( Dto\File::factory());
        $this->assertInstanceOf( Dto\FileData::class, $dto );
        $this->assertTrue( $dto->isFileSet());
    }

    /**
     * Test static factory in AlternativeIndicatorID
     *
     * @test
     */
    public function AlternativeIndicatorIDTest() : void
    {
        $dto = Dto\AlternativeIndicatorID::factoryIndicatorID(
            Dto\IndicatorID::factoryNameVersionId( self::$TEST, self::$TEST, self::$TEST )
        );
        $this->assertInstanceOf( Dto\AlternativeIndicatorID::class, $dto );
        $this->assertTrue( $dto->isIndicatorIDSet());
    }

    /**
     * Test static factory in History
     *
     * @test
     */
    public function HistoryTest() : void
    {
        $dto = Dto\History::factoryHistoryItem(
            Dto\HistoryItem::factoryActionDateTime( self::$TEST , new DateTime())
        );
        $this->assertInstanceOf( Dto\History::class, $dto );
        $this->assertTrue( $dto->isHistoryItemSet());
    }

    /**
     * Test static factory in Confidence
     *
     * @test
     */
    public function ConfidenceTest() : void
    {
        $dto = Dto\Confidence::factoryRatingValue( self::$TEST, 12355.00 );
        $this->assertInstanceOf( Dto\Confidence::class, $dto );
        $this->assertTrue( $dto->isRatingSet());
        $this->assertTrue( $dto->isValueSet());
    }

    /**
     * Test static factory in CertificateData
     *
     * @test
     */
    public function CertificateDataTest() : void
    {
        $dto = Dto\CertificateData::factoryCertificate( Dto\Certificate::factoryX509Data( self::$TEST ));
        $this->assertInstanceOf( Dto\CertificateData::class, $dto );
        $this->assertTrue( $dto->isCertificateSet());
    }

    /**
     * Test static factory in RegistryHandle
     *
     * @test
     */
    public function RegistryHandleTest() : void
    {
        $dto = Dto\RegistryHandle::factoryRegistry( self::$TEST );
        $this->assertInstanceOf( Dto\RegistryHandle::class, $dto );
        $this->assertTrue( $dto->isRequiredSet());
    }

    /**
     * Test static factory in Hash
     *
     * @test
     */
    public function HashTest() : void
    {
        $dto = Dto\Hash::factoryDigestMethodDigestvalue( self::$TEST, self::$TEST );
        $this->assertInstanceOf( Dto\Hash::class, $dto );
        $this->assertTrue( $dto->isDigestMethodSet());
        $this->assertTrue( $dto->isDigestValueSet());
    }

    /**
     * Test static factory in Campaign
     *
     * @test
     */
    public function CampaignTest() : void
    {
        $dto = Dto\Campaign::factory();
        $this->assertInstanceOf( Dto\Campaign::class, $dto );
    }

    /**
     * Test static factory in ThreatActor
     *
     * @test
     */
    public function ThreatActorTest() : void
    {
        $dto = Dto\ThreatActor::factory();
        $this->assertInstanceOf( Dto\ThreatActor::class, $dto );

        $dto = Dto\ThreatActor::factoryThreatActorID( self::$TEST );
        $this->assertInstanceOf( Dto\ThreatActor::class, $dto );
        $this->assertTrue( $dto->isThreatActorIDSet());
    }

    /**
     * Test static factory in IncidentID
     *
     * @test
     */
    public function IncidentIDTest() : void
    {
        $dto = Dto\IncidentID::factoryNameId( self::$TEST, self::$TEST );
        $this->assertInstanceOf( Dto\IncidentID::class, $dto );
        $this->assertTrue( $dto->isNameSet());
        $this->assertTrue( $dto->isIdSet());
    }

    /**
     * Test static factory in NodeRole
     *
     * @test
     */
    public function NodeRoleTest() : void
    {
        $dto = Dto\NodeRole::factoryCategory( self::$TEST );
        $this->assertInstanceOf( Dto\NodeRole::class, $dto );
        $this->assertTrue( $dto->isCategorySet());
        $this->assertTrue( $dto->isCategorySet());
    }

    /**
     * Test static factory in Node
     *
     * @test
     */
    public function NodeTest() : void
    {
        $dto = Dto\Node::factory();
        $this->assertInstanceOf( Dto\Node::class, $dto );

        $dto = Dto\Node::factoryAddress( Dto\Address::factoryCategoryValue( self::$TEST, self::$TEST ));
        $this->assertInstanceOf( Dto\Node::class, $dto );
        $this->assertTrue( $dto->isAddressSet());

        $dto = Dto\Node::factoryDomainData(
            Dto\DomainData::factorySystemDomainName( self::$TEST, self::$TEST, self::$TEST )
        );
        $this->assertInstanceOf( Dto\Node::class, $dto );
        $this->assertTrue( $dto->isDomainDataSet());
    }

    /**
     * Test static factory in DetectionPattern
     *
     * @test
     */
    public function DetectionPatternTest() : void
    {
        $dto = Dto\DetectionPattern::factoryApplication( Dto\SoftwareType::factory());
        $this->assertInstanceOf( Dto\DetectionPattern::class, $dto );
        $this->assertTrue( $dto->isApplicationSet());
    }

    /**
     * Test static factory in Key
     *
     * @test
     */
    public function KeyTest() : void
    {
        $dto = Dto\Key::factoryKeyName( self::$TEST );
        $this->assertInstanceOf( Dto\Key::class, $dto );
        $this->assertTrue( $dto->isKeyNameSet());
    }

    /**
     * Test static factory in SoftwareReference
     *
     * @test
     */
    public function SoftwareReferenceTest() : void
    {
        $dto = Dto\SoftwareReference::factorySpecname( self::$TEST );
        $this->assertInstanceOf( Dto\SoftwareReference::class, $dto );
        $this->assertTrue( $dto->isSpecNameSet());
    }

    /**
     * Test static factory in Address
     *
     * @test
     */
    public function AddressTest() : void
    {
        $dto = Dto\Address::factoryCategoryValue( self::$TEST, self::$TEST );
        $this->assertInstanceOf( Dto\Address::class, $dto );
        $this->assertTrue( $dto->isCategorySet());
        $this->assertTrue( $dto->isValueSet());
    }

    /**
     * Test static factory in SystemImpact
     *
     * @test
     */
    public function SystemImpactTest() : void
    {
        $dto = Dto\SystemImpact::factoryType( self::$TEST );
        $this->assertInstanceOf( Dto\SystemImpact::class, $dto );
        $this->assertTrue( $dto->isTypeSet());
    }

    /**
     * Test static factory in TimeImpact
     *
     * @test
     */
    public function TimeImpactTest() : void
    {
        $dto = Dto\TimeImpact::factoryMetricValue( self::$TEST, 12345.00 );
        $this->assertInstanceOf( Dto\TimeImpact::class, $dto );
        $this->assertTrue( $dto->isMetricSet());
        $this->assertTrue( $dto->isValueSet());
    }

    /**
     * Test static factory in RecordPattern
     *
     * @test
     */
    public function RecordPatternTest() : void
    {
        $dto = Dto\RecordPattern::factoryTypeValue( self::$TEST, self::$TEST );
        $this->assertInstanceOf( Dto\RecordPattern::class, $dto );
        $this->assertTrue( $dto->isTypeSet());
        $this->assertTrue( $dto->isValueSet());
    }

    /**
     * Test static factory in Counter
     *
     * @test
     */
    public function CounterTest() : void
    {
        $dto = Dto\Counter::factoryTypeUnitValue( self::$TEST, self::$TEST, 12345.00 );
        $this->assertInstanceOf( Dto\Counter::class, $dto );
        $this->assertTrue( $dto->isTypeSet());
        $this->assertTrue( $dto->isUnitSet());
        $this->assertTrue( $dto->isValueSet());
    }

    /**
     * Test static factory in File
     *
     * @test
     */
    public function FileTest() : void
    {
        $dto = Dto\File::factory();
        $this->assertInstanceOf( Dto\File::class, $dto );
    }

    /**
     * Test static factory in ExtensionType
     *
     * @test
     */
    public function ExtensionTypeTest() : void
    {
        $dto = Dto\ExtensionType::factoryDtypeValue( self::$TEST, self::$TEST );
        $this->assertInstanceOf( Dto\ExtensionType::class, $dto );
        $this->assertTrue( $dto->isDtypeSet());
        $this->assertTrue( $dto->isValueSet());
    }

    /**
     * Test static factory in IndicatorExpression
     *
     * @test
     */
    public function IndicatorExpressionTest() : void
    {
        $dto = Dto\IndicatorExpression::factory();
        $this->assertInstanceOf( Dto\IndicatorExpression::class, $dto );
    }

    /**
     * Test static factory in Discovery
     *
     * @test
     */
    public function DiscoveryTest() : void
    {
        $dto = Dto\Discovery::factory();
        $this->assertInstanceOf( Dto\Discovery::class, $dto );
    }

    /**
     * Test static factory in RelatedActivity
     *
     * @test
     */
    public function RelatedActivityTest() : void
    {
        $dto = Dto\RelatedActivity::factory();
        $this->assertInstanceOf( Dto\RelatedActivity::class, $dto );

        $dto = Dto\RelatedActivity::factoryIncidentID( Dto\IncidentID::factoryNameId( self::$TEST, self::$TEST ));
        $this->assertInstanceOf( Dto\RelatedActivity::class, $dto );
        $this->assertTrue( $dto->isIncidentIDSet());
    }

    /**
     * Test static factory in Method
     *
     * @test
     */
    public function MethodTest() : void
    {
        $dto = Dto\Method::factory();
        $this->assertInstanceOf( Dto\Method::class, $dto );
    }

    /**
     * Test static factory in HashData
     *
     * @test
     */
    public function HashDataTest() : void
    {
        $dto = Dto\HashData::factoryScope( self::$TEST );
        $this->assertInstanceOf( Dto\HashData::class, $dto );
        $this->assertTrue( $dto->isScopeSet());
    }

    /**
     * Test static factory in BulkObservable
     *
     * @test
     */
    public function BulkObservableTest() : void
    {
        $dto = Dto\BulkObservable::factoryBulkObservableList( self::$TEST );
        $this->assertInstanceOf( Dto\BulkObservable::class, $dto );
        $this->assertTrue( $dto->isBulkObservableListSet());
    }

    /**
     * Test static factory in Expectation
     *
     * @test
     */
    public function ExpectationTest() : void
    {
        $dto = Dto\Expectation::factory();
        $this->assertInstanceOf( Dto\Expectation::class, $dto );
    }

    /**
     * Test static factory in HistoryItem
     *
     * @test
     */
    public function HistoryItemTest() : void
    {
        $dto = Dto\HistoryItem::factoryActionDateTime( self::$TEST, new DateTime());
        $this->assertInstanceOf( Dto\HistoryItem::class, $dto );
        $this->assertTrue( $dto->isActionSet());
        $this->assertTrue( $dto->isDateTimeSet());
    }

    /**
     * Test static factory in Service
     *
     * @test
     */
    public function ServiceTest() : void
    {
        $dto = Dto\Service::factory();
        $this->assertInstanceOf( Dto\Service::class, $dto );

    }

    /**
     * Test static factory in EmailData
     *
     * @test
     */
    public function EmailDataTest() : void
    {
        $dto = Dto\EmailData::factory();
        $this->assertInstanceOf( Dto\EmailData::class, $dto );
    }

    /**
     * Test static factory in RecordData
     *
     * @test
     */
    public function RecordDataTest() : void
    {
        $dto = Dto\RecordData::factory();
        $this->assertInstanceOf( Dto\RecordData::class, $dto );
    }

    /**
     * Test static factory in EventData
     *
     * @test
     */
    public function EventDataTest() : void
    {
        $dto = Dto\EventData::factory();
        $this->assertInstanceOf( Dto\EventData::class, $dto );
    }

    /**
     * Test static factory in Indicator
     *
     * @test
     */
    public function IndicatorTest() : void
    {
        $dto = Dto\Indicator::factoryIndicatorID( Dto\IndicatorID::factory());
        $this->assertInstanceOf( Dto\Indicator::class, $dto );
        $this->assertTrue( $dto->isIndicatorIDSet());
    }

    /**
     * Test static factory in DomainData
     *
     * @test
     */
    public function DomainDataTest() : void
    {
        $dto = Dto\DomainData::factorySystemDomainName( self::$TEST, self::$TEST, self::$TEST );
        $this->assertInstanceOf( Dto\DomainData::class, $dto );
        $this->assertTrue( $dto->isSystemStatusSet());
        $this->assertTrue( $dto->isDomainStatusSet());
        $this->assertTrue( $dto->isNameSet());
    }

    /**
     * Test static factory in System
     *
     * @test
     */
    public function SystemTest() : void
    {
        $dto = Dto\System::factoryNode( Dto\Node::factory());
        $this->assertInstanceOf( Dto\System::class, $dto );
    }

    /**
     * Test static factory in Assessment
     *
     * @test
     */
    public function AssessmentTest() : void
    {
        $dto = Dto\Assessment::factory();
        $this->assertInstanceOf( Dto\Assessment::class, $dto );
    }

    /**
     * Test static factory in Contact
     *
     * @test
     */
    public function ContactTest() : void
    {
        $dto = Dto\Contact::factoryRoleType( self::$TEST, self::$TEST );
        $this->assertInstanceOf( Dto\Contact::class, $dto );
        $this->assertTrue( $dto->isRoleSet());
        $this->assertTrue( $dto->isTypeSet());
    }

    /**
     * Test static factory in Observable
     *
     * @test
     */
    public function ObservableTest() : void
    {
        $dto = Dto\Observable::factory();
        $this->assertInstanceOf( Dto\Observable::class, $dto );
    }

    /**
     * Test static factory in Incident
     *
     * @test
     */
    public function IncidentTest() : void
    {
        $dto = Dto\Incident::factoryPurpose( self::$TEST );
        $this->assertInstanceOf( Dto\Incident::class, $dto );
        $this->assertTrue( $dto->isPurposeSet());
    }

    /**
     * Test static factory in IODEFdocument
     *
     * @test
     */
    public function IODEFdocumentTest() : void
    {
        $dto = Dto\IODEFdocument::factoryIncident( Dto\Incident::factory());
        $this->assertInstanceOf( Dto\IODEFdocument::class, $dto );
        $this->assertTrue( $dto->isIncidentSet());
    }
}
