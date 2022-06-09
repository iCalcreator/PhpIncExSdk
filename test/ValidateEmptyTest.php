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
use Kigkonsult\PhpIncExSdk\Dto\MLStringType;
use PHPUnit\Framework\TestCase;

/**
 * Testing Validators in ascending Dto class file size order on empty Dto's
 *
 * Also properties with 'empty' classes, (attribute) properties as type and ext-type occurrence
 */
class ValidateEmptyTest extends TestCase
{
    /**
     * @var string
     */
    private static string $TEST = 'test';

    /**
     * @param string $function
     * @param bool $check
     * @param array $result
     * @param int $count
     */
    public function checkCheckFalse( string $function, bool $check, array $result, int $count ) : void
    {
        $this->assertFalse(
            $check,
            $function . ' #1 error ' . var_export( $result, true )
        );
        $this->assertCount(
            $count,
            $result,
            $function . ' #2 error ' . var_export( $result, true )
        );
    }

    /**
     * @param string $function
     * @param array $result
     * @param string $className
     */
    public function checkResultKey1( string $function, array $result, string $className ) : void
    {
        $this->assertTrue(
            str_starts_with( array_key_first( $result ), $className ),
            $function . ' #3 error ' . var_export( $result, true )
        );
    }

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
     * Test empty Weakness
     *
     * @test
     */
    public function WeaknessTest() : void
    {
        $dto = new Dto\Weakness();
        $check = Validate\Weakness::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Weakness' );
    }

    /**
     * Test empty Scoring
     *
     * @test
     */
    public function ScoringTest() : void
    {
        $dto = new Dto\Scoring();
        $check = Validate\Scoring::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Scoring' );


        $result = [];
        $check  = Validate\Scoring::check(
            Dto\Scoring::factorySpecId( self::$TEST )
            ->addReference( Dto\Reference::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
    }

    /**
     * Test empty Platform
     *
     * @test
     */
    public function PlatformTest() : void
    {
        $dto = new Dto\Platform();
        $check = Validate\Platform::check( 
            $dto->setSpecId( Dto\Platform::PRIVATE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Platform' );

        $result = [];
        $dto    = new Dto\Platform();
        $check  = Validate\Platform::check(
            $dto->setExtSpecId( self::$TEST ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
    }

    /**
     * Test empty AttackPattern. part 2 tests also Vulnerability and Weakness
     *
     * @test
     */
    public function AttackPatternTest() : void
    {
        $dto = new Dto\AttackPattern();
        $check = Validate\AttackPattern::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'AttackPattern' );

        $result = [];
        $check  = Validate\AttackPattern::check(
            Dto\AttackPattern::factory()
                ->addPlatform( Dto\Platform::factory())
                ->addScoring( Dto\Scoring::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 3 );
    }

    /**
     * Test empty Vulnerability
     *
     * @test
     */
    public function VulnerabilityTest() : void
    {
        $dto = new Dto\Vulnerability();
        $check = Validate\Vulnerability::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Vulnerability' );
    }

    /**
     * Test empty IntendedImpact
     *
     * @test
     */
    public function IntendedImpactTest() : void
    {
        $dto = new Dto\IntendedImpact();
        $check = Validate\IntendedImpact::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'IntendedImpact' );

        $result = [];
        $dto    = new Dto\IntendedImpact();
        $check  = Validate\IntendedImpact::check(
            $dto->setExtType( self::$TEST ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
    }

    /**
     * Test empty BusinessImpact
     *
     * @test
     */
    public function BusinessImpactTest() : void
    {
        $dto = new Dto\BusinessImpact();
        $check = Validate\BusinessImpact::check( 
            $dto->setSeverity( $dto::EXT_VALUE )
                ->setType( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'BusinessImpact' );

        $result = [];
        $check  = Validate\BusinessImpact::check(
            Dto\BusinessImpact::factory()
                ->addDescription( Dto\MLStringType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
    }

    /**
     * Test empty BulkObservableFormat
     *
     * @test
     */
    public function BulkObservableFormatTest() : void
    {
        $dto = new Dto\BulkObservableFormat();
        $check = Validate\BulkObservableFormat::check(
            $dto,
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'BulkObservableFormat' );

        $result = [];
        $check  = Validate\BulkObservableFormat::check(
            Dto\BulkObservableFormat::factory()
                ->setHash( Dto\Hash::factory())
                ->addAdditionalData( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 4 );
    }

    /**
     * Test empty WindowsRegistryKeysModified
     *
     * @test
     */
    public function WindowsRegistryKeysModifiedTest() : void
    {
        $dto = new Dto\WindowsRegistryKeysModified();
        $check = Validate\WindowsRegistryKeysModified::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'WindowsRegistryKeysModified' );

        $result = [];
        $check = Validate\WindowsRegistryKeysModified::check(
            Dto\WindowsRegistryKeysModified::factory()
                ->addKey( Dto\Key::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
    }

    /**
     * Test empty Certificate
     *
     * @test
     */
    public function CertificateTest() : void
    {
        $dto = new Dto\Certificate();
        $check = Validate\Certificate::check( 
            $dto,
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Certificate' );

        $result = [];
        $check  = Validate\Certificate::check(
            Dto\Certificate::factoryX509Data( self::$TEST )
                ->addDescription( Dto\MLStringType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
    }

    /**
     * Test empty Nameservers
     *
     * @test
     */
    public function NameserversTest() : void
    {
        $dto = new Dto\Nameservers();
        $check = Validate\Nameservers::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Nameservers' );

        $result = [];
        $check  = Validate\Nameservers::check(
            Dto\Nameservers::factory()
                ->setServer( self::$TEST )
                ->addAddress( Dto\Address::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
    }

    /**
     * Test empty IndicatorID
     *
     * @test
     */
    public function IndicatorIDTest() : void
    {
        $dto = new Dto\IndicatorID();
        $check = Validate\IndicatorID::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 3 );
        $this->checkResultKey1( __FUNCTION__, $result, 'IndicatorID' );
    }

    /**
     * Test empty ReferenceName
     *
     * @test
     */
    public function ReferenceNameTest() : void
    {
        $dto = new Dto\ReferenceName();
        $check = Validate\ReferenceName::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'ReferenceName' );
    }

    /**
     * Test empty DomainContacts
     *
     * @test
     */
    public function DomainContactsTest() : void
    {
        $dto = new Dto\DomainContacts();
        $check = Validate\DomainContacts::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'DomainContacts' );

        $result = [];
        $check  = Validate\DomainContacts::check(
            Dto\DomainContacts::factory()
            ->addContact( Dto\Contact::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 3 );
    }

    /**
     * Test empty SoftwareType
     *
     * @test
     */
    public function SoftwareTypeTest() : void
    {
        $dto = new Dto\SoftwareType();
        $check = Validate\SoftwareType::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'SoftwareType' );

        $result = [];
        $check  = Validate\SoftwareType::check(
            Dto\SoftwareType::factory()
                ->addDescription( Dto\MLStringType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
    }

    /**
     * Test empty FuzzyHash
     *
     * @test
     */
    public function FuzzyHashTest() : void
    {
        $dto = new Dto\FuzzyHash();
        $check = Validate\FuzzyHash::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'FuzzyHash' );

        $result = [];
        $check  = Validate\FuzzyHash::check(
            Dto\FuzzyHash::factoryExtensionType( Dto\ExtensionType::factory())
                ->setApplication( Dto\SoftwareType::factory())
                ->addAdditionalData( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 5 );
    }

    /**
     * Test empty IndicatorReference
     *
     * @test
     */
    public function IndicatorReferenceTest() : void
    {
        $dto = new Dto\IndicatorReference();
        $check = Validate\IndicatorReference::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'IndicatorReference' );
    }

    /**
     * Test empty ServiceName
     *
     * @test
     */
    public function ServiceNameTest() : void
    {
        $dto = new Dto\ServiceName();
        $check = Validate\ServiceName::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'ServiceName' );

        $result = [];
        $check  = Validate\ServiceName::check(
            Dto\ServiceName::factory()
                ->addDescription( Dto\MLStringType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
    }

    /**
     * Test empty Reference
     *
     * @test
     */
    public function ReferenceTest() : void
    {
        $dto = new Dto\Reference();
        $check = Validate\Reference::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Reference' );

        $result = [];
        $check  = Validate\Reference::check(
            Dto\Reference::factory()
                ->setReferenceName( Dto\ReferenceName::factory())
                ->addDescription( Dto\MLStringType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 3 );
    }

    /**
     * Test empty MonetaryImpact
     *
     * @test
     */
    public function MonetaryImpactTest() : void
    {
        $dto = new Dto\MonetaryImpact();
        $check = Validate\MonetaryImpact::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'MonetaryImpact' );
    }

    /**
     * Test empty Email
     *
     * @test
     */
    public function EmailTest() : void
    {
        $dto = new Dto\Email();
        $check = Validate\Email::check( 
            $dto->setType( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Email' );

        $result = [];
        $check  = Validate\Email::check(
            Dto\Email::factoryEmailTo( self::$TEST )
                ->addDescription( Dto\MLStringType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
    }

    /**
     * Test empty AlternativeID
     *
     * @test
     */
    public function AlternativeIDTest() : void
    {
        $dto = new Dto\AlternativeID();
        $check = Validate\AlternativeID::check( 
            $dto->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'AlternativeID' );

        $result = [];
        $check  = Validate\AlternativeID::check(
            Dto\AlternativeID::factoryIncidentID( Dto\IncidentID::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
    }

    /**
     * Test empty AttackPhase
     *
     * @test
     */
    public function AttackPhaseTest() : void
    {
        $dto = new Dto\AttackPhase();
        $check = Validate\AttackPhase::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'AttackPhase' );

        $result = [];
        $check  = Validate\AttackPhase::check(
            Dto\AttackPhase::factory()
            ->addDescription( Dto\MLStringType::factory())
            ->addAdditionalData( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 3 );
    }

    /**
     * Test empty PostalAddress
     *
     * @test
     */
    public function PostalAddressTest() : void
    {
        $dto = new Dto\PostalAddress();
        $check = Validate\PostalAddress::check( 
            $dto->setType( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'PostalAddress' );

        $result = [];
        $check  = Validate\PostalAddress::check(
            Dto\PostalAddress::factory()
                ->setPAddress( Dto\MLStringType::factory())
                ->addDescription( Dto\MLStringType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
    }

    /**
     * Test empty Telephone
     *
     * @test
     */
    public function TelephoneTest() : void
    {
        $dto = new Dto\Telephone();
        $check = Validate\Telephone::check( 
            $dto->setType( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Telephone' );

        $result = [];
        $check  = Validate\Telephone::check(
            Dto\Telephone::factory()
                ->addDescription( Dto\MLStringType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
    }

    /**
     * Test empty MLStringType
     *
     * @test
     */
    public function MLStringTypeTest() : void
    {
        $dto = new Dto\MLStringType();
        $check = Validate\MLStringType::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'MLStringType' );
    }

    /**
     * Test empty FileData
     *
     * @test
     */
    public function FileDataTest() : void
    {
        $dto = new Dto\FileData();
        $check = Validate\FileData::check( 
            $dto->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'FileData' );

        $result = [];
        $check  = Validate\FileData::check(
            Dto\FileData::factoryFile(
                Dto\File::factory()
                ->setHashData( Dto\HashData::factory())
            ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
    }

    /**
     * Test empty AlternativeIndicatorID
     *
     * @test
     */
    public function AlternativeIndicatorIDTest() : void
    {
        $dto = new Dto\AlternativeIndicatorID();
        $check = Validate\AlternativeIndicatorID::check( 
            $dto->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'AlternativeIndicatorID' );

        $result = [];
        $check  = Validate\AlternativeIndicatorID::check(
            Dto\AlternativeIndicatorID::factoryIndicatorID( Dto\IndicatorID::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 3 );
    }

    /**
     * Test empty History
     *
     * @test
     */
    public function HistoryTest() : void
    {
        $dto = new Dto\History();
        $check = Validate\History::check( 
            $dto->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'History' );

        $result = [];
        $check  = Validate\History::check(
            Dto\History::factory()
                ->addHistoryItem( Dto\HistoryItem::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
    }

    /**
     * Test empty Confidence
     *
     * @test
     */
    public function ConfidenceTest() : void
    {
        $dto = new Dto\Confidence();
        $check = Validate\Confidence::check( 
            $dto->setRating( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Confidence' );
    }

    /**
     * Test empty CertificateData
     *
     * @test
     */
    public function CertificateDataTest() : void
    {
        $dto = new Dto\CertificateData();
        $check = Validate\CertificateData::check( 
            $dto->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'CertificateData' );

        $result = [];
        $check  = Validate\CertificateData::check(
            Dto\CertificateData::factory()
                ->addCertificate( Dto\Certificate::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
    }

    /**
     * Test empty RegistryHandle
     *
     * @test
     */
    public function RegistryHandleTest() : void
    {
        $dto = new Dto\RegistryHandle();
        $check = Validate\RegistryHandle::check( 
            $dto->setRegistry( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'RegistryHandle' );
    }

    /**
     * Test empty Hash
     *
     * @test
     */
    public function HashTest() : void
    {
        $dto = new Dto\Hash();
        $check = Validate\Hash::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Hash' );

        $result = [];
        $check  = Validate\Hash::check(
            Dto\Hash::factoryDigestMethodDigestvalue( self::$TEST, self::$TEST )
                ->setApplication( Dto\SoftwareType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
    }

    /**
     * Test empty Campaign
     *
     * @test
     */
    public function CampaignTest() : void
    {
        $dto = new Dto\Campaign();
        $check = Validate\Campaign::check( 
            $dto->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Campaign' );

        $result = [];
        $check  = Validate\Campaign::check(
            Dto\Campaign::factory()
                ->addDescription( Dto\MLStringType::factory())
                ->addAdditionalData( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 3 );
    }

    /**
     * Test empty ThreatActor
     *
     * @test
     */
    public function ThreatActorTest() : void
    {
        $dto = new Dto\ThreatActor();
        $check = Validate\ThreatActor::check( 
            $dto->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'ThreatActor' );

        $result = [];
        $check  = Validate\ThreatActor::check(
            Dto\ThreatActor::factory()
                ->addDescription( Dto\MLStringType::factory())
                ->addAdditionalData( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 3 );
    }

    /**
     * Test empty IncidentID
     *
     * @test
     */
    public function IncidentIDTest() : void
    {
        $dto = new Dto\IncidentID();
        $check = Validate\IncidentID::check( 
            $dto->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 3 );
        $this->checkResultKey1( __FUNCTION__, $result, 'IncidentID' );
    }

    /**
     * Test empty NodeRole
     *
     * @test
     */
    public function NodeRoleTest() : void
    {
        $dto = new Dto\NodeRole();
        $check = Validate\NodeRole::check( 
            $dto->setCategory( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'NodeRole' );

        $result = [];
        $check  = Validate\NodeRole::check(
            Dto\NodeRole::factory()
            ->addDescription( Dto\MLStringType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
    }

    /**
     * Test empty Node
     *
     * @test
     */
    public function NodeTest() : void
    {
        $dto = new Dto\Node();
        $check = Validate\Node::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Node' );

        $result = [];
        $check  = Validate\Node::check(
            Dto\Node::factory()
                ->addDomainData( Dto\DomainData::factory())
                ->addAddress( Dto\Address::factory())
                ->setPostalAddress( Dto\MLStringType::factory())
                ->addLocation( Dto\MLStringType::factory())
                ->addCounter( Dto\Counter::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 10 );
    }

    /**
     * Test empty DetectionPattern
     *
     * @test
     */
    public function DetectionPatternTest() : void
    {
        $dto = new Dto\DetectionPattern();
        $check = Validate\DetectionPattern::check( 
            $dto->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 3 );
        $this->checkResultKey1( __FUNCTION__, $result, 'DetectionPattern' );

        $result = [];
        $check  = Validate\DetectionPattern::check(
            Dto\DetectionPattern::factory()
            ->setApplication( Dto\SoftwareType::factory())
            ->addDescription( Dto\MLStringType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
    }

    /**
     * Test empty Key
     *
     * @test
     */
    public function KeyTest() : void
    {
        $dto = new Dto\Key();
        $check = Validate\Key::check( 
            $dto->setRegistryaction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Key' );
    }

    /**
     * Test empty SoftwareReference
     *
     * @test
     */
    public function SoftwareReferenceTest() : void
    {
        $dto = new Dto\SoftwareReference();
        $check = Validate\SoftwareReference::check( 
            $dto,
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'SoftwareReference' );

        $result = [];
        $dto    = new Dto\SoftwareReference();
        $check  = Validate\SoftwareReference::check(
            $dto->setSpecName( $dto::EXT_VALUE )
                ->setDtype( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
    }

    /**
     * Test empty Address
     *
     * @test
     */
    public function AddressTest() : void
    {
        $dto = new Dto\Address();
        $check = Validate\Address::check( 
            $dto->setCategory( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Address' );
    }

    /**
     * Test empty SystemImpact
     *
     * @test
     */
    public function SystemImpactTest() : void
    {
        $dto = new Dto\SystemImpact();
        $check = Validate\SystemImpact::check( 
            $dto->setType( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'SystemImpact' );
    }

    /**
     * Test empty TimeImpact
     *
     * @test
     */
    public function TimeImpactTest() : void
    {
        $dto = new Dto\TimeImpact();
        $check = Validate\TimeImpact::check( 
            $dto->setMetric( $dto::EXT_VALUE )
                ->setDuration( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 3 );
        $this->checkResultKey1( __FUNCTION__, $result, 'TimeImpact' );
    }

    /**
     * Test empty RecordPattern
     *
     * @test
     */
    public function RecordPatternTest() : void
    {
        $dto = new Dto\RecordPattern();
        $check = Validate\RecordPattern::check( 
            $dto->setOffsetunit( $dto::EXT_VALUE )
                ->setType( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 3 );
        $this->checkResultKey1( __FUNCTION__, $result, 'RecordPattern' );
    }

    /**
     * Test empty Counter
     *
     * @test
     */
    public function CounterTest() : void
    {
        $dto = new Dto\Counter();
        $check = Validate\Counter::check( 
            $dto->setUnit( $dto::EXT_VALUE )
                ->setDuration( $dto::EXT_VALUE )
                ->setType( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 4 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Counter' );
    }

    /**
     * Test empty File
     *
     * @test
     */
    public function FileTest() : void
    {
        $dto = new Dto\File();
        $check = Validate\File::check( 
            $dto, 
            $result
        );
        /*
        $this->checkCheck( $check, $result, 4, __FUNCTION__ );
        $this->checkResultKey1( $result, 'File', __FUNCTION__ );
        */
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements

        $result = [];
        $check  = Validate\File::check(
            Dto\File::factory()
                ->setHashData( Dto\HashData::factory())
                ->setAssociatedSoftware( Dto\SoftwareType::factory())
                ->addFileProperties( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 5 );
        $this->checkResultKey1( __FUNCTION__, $result, 'File' );
    }

    /**
     * Test empty ExtensionType
     *
     * @test
     */
    public function ExtensionTypeTest() : void
    {
        $dto = new Dto\ExtensionType();
        $check = Validate\ExtensionType::check( 
            $dto->setDtype( $dto::EXT_VALUE )
                ->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'ExtensionType' );
    }

    /**
     * Test empty IndicatorExpression
     *
     * @test
     */
    public function IndicatorExpressionTest() : void
    {
        $dto = new Dto\IndicatorExpression();
        $check = Validate\IndicatorExpression::check( 
            $dto, 
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements

        $result = [];
        $check  = Validate\IndicatorExpression::check(
            Dto\IndicatorExpression::factory()
                ->addIndicatorExpression(
                    Dto\IndicatorExpression::factory()->addAdditionalData( Dto\ExtensionType::factory())
                )
                ->addObservable( Dto\Observable::factory())
                ->addIndicatorReference( Dto\IndicatorReference::factory())
                ->setConfidence( Dto\Confidence::factory())
                ->addAdditionalData( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 8 );
        $this->checkResultKey1( __FUNCTION__, $result, 'IndicatorExpression' );
    }

    /**
     * Test empty Discovery
     *
     * @test
     */
    public function DiscoveryTest() : void
    {
        $dto = new Dto\Discovery();
        $check = Validate\Discovery::check( 
            $dto->setSource( $dto::EXT_VALUE )
                ->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Discovery' );

        $result = [];
        $check  = Validate\Discovery::check(
            Dto\Discovery::factory()
                ->addDescription( Dto\MLStringType::factory())
                ->addContact( Dto\Contact::factory())
                ->addDetectionPattern( Dto\DetectionPattern::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 6 );
    }

    /**
     * Test empty RelatedActivity
     *
     * @test
     */
    public function RelatedActivityTest() : void
    {
        $dto = new Dto\RelatedActivity();
        $check = Validate\RelatedActivity::check( 
            $dto->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'RelatedActivity' );

        $result = [];
        $check  = Validate\RelatedActivity::check(
            Dto\RelatedActivity::factory()
                ->addIncidentID( Dto\IncidentID::factory())
                ->addThreatActor( Dto\ThreatActor::factory())
                ->addCampaign( Dto\Campaign::factory())
                ->addIndicatorID( Dto\IndicatorID::factory())
                ->setConfidence( Dto\Confidence::factory())
                ->addDescription( Dto\MLStringType::factory())
                ->addAdditionalData( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 12 );
    }

    /**
     * Test empty Method
     *
     * @test
     */
    public function MethodTest() : void
    {
        $dto = new Dto\Method();
        $check = Validate\Method::check( 
            $dto->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Method' );

        $result = [];
        $check  = Validate\Method::check(
            Dto\Method::factory()
                ->addReference( Dto\Reference::factory())
                ->addDescription( Dto\MLStringType::factory())
                ->addAttackPattern(Dto\AttackPattern::factory())
                ->addVulnerability( Dto\Vulnerability::factory())
                ->addWeakness( Dto\Weakness::factory())
                ->addAdditionalData( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 7 );
    }

    /**
     * Test empty HashData
     *
     * @test
     */
    public function HashDataTest() : void
    {
        $dto = new Dto\HashData();
        $check = Validate\HashData::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'HashData' );

        $result = [];
        $check  = Validate\HashData::check(
            Dto\HashData::factory()
                ->addHash( Dto\Hash::factory())
                ->addFuzzyHash( Dto\FuzzyHash::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 4 );
    }

    /**
     * Test empty BulkObservable
     *
     * @test
     */
    public function BulkObservableTest() : void
    {
        $dto = new Dto\BulkObservable();
        $check = Validate\BulkObservable::check( 
            $dto->setType( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'BulkObservable' );

        $result = [];
        $check  = Validate\BulkObservable::check(
            Dto\BulkObservable::factoryBulkObservableList( self::$TEST )
                ->setBulkObservableFormat( Dto\BulkObservableFormat::factory())
                ->addAdditionalData( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 3 );
    }

    /**
     * Test empty Expectation
     *
     * @test
     */
    public function ExpectationTest() : void
    {
        $dto = new Dto\Expectation();
        $check = Validate\Expectation::check( 
            $dto->setAction( $dto::EXT_VALUE )
                ->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Expectation' );

        $result = [];
        $check  = Validate\Expectation::check(
            Dto\Expectation::factory()
                ->addDescription( Dto\MLStringType::factory())
                ->setContact( Dto\Contact::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 4 );
    }

    /**
     * Test empty HistoryItem
     *
     * @test
     */
    public function HistoryItemTest() : void
    {
        $dto = new Dto\HistoryItem();
        $check = Validate\HistoryItem::check( 
            $dto->setAction( $dto::EXT_VALUE )
                ->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 3 );
        $this->checkResultKey1( __FUNCTION__, $result, 'HistoryItem' );

        $result = [];
        $check  = Validate\HistoryItem::check(
            Dto\HistoryItem::factoryActionDateTime( self::$TEST, new DateTime())
                ->setIncidentID( Dto\IncidentID::factory())
                ->setContact( Dto\Contact::factory())
                ->addDescription( Dto\MLStringType::factory())
                ->addAdditionalData( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 8 );
    }

    /**
     * Test empty Service
     *
     * @test
     */
    public function ServiceTest() : void
    {
        $dto = new Dto\Service();
        $check = Validate\Service::check( 
            $dto, 
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Service' );

        $result = [];
        $check  = Validate\Service::check(
            Dto\Service::factory()
                ->setServiceName( Dto\ServiceName::factory())
                ->addApplicationHeaderField( Dto\ExtensionType::factory())
                ->setEmailData( Dto\EmailData::factory()->addEmailHeaderField( Dto\ExtensionType::factory()))
                ->setApplication( Dto\SoftwareType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 6 );
    }

    /**
     * Test empty EmailData
     *
     * @test
     */
    public function EmailDataTest() : void
    {
        $dto = new Dto\EmailData();
        $check = Validate\EmailData::check( 
            $dto, 
            $result
        );
        $this->checkCheckTrue( __FUNCTION__, $check, $result );// no requirements

        $result = [];
        $check  = Validate\EmailData::check(
            Dto\EmailData::factory()
                ->addEmailHeaderField( Dto\ExtensionType::factory())
                ->addHashData( Dto\HashData::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 4 );
        $this->checkResultKey1( __FUNCTION__, $result, 'EmailData' );
    }

    /**
     * Test empty RecordData
     *
     * @test
     */
    public function RecordDataTest() : void
    {
        $dto = new Dto\RecordData();
        $check = Validate\RecordData::check( 
            $dto->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'RecordData' );

        $result = [];
        $check  = Validate\RecordData::check(
            Dto\RecordData::factory()
                ->addDescription( Dto\MLStringType::factory())
                ->setApplication( Dto\SoftwareType::factory())
                ->addRecordPattern( Dto\RecordPattern::factory())
                ->addRecordItem( Dto\ExtensionType::factory())
                ->addFileData( Dto\FileData::factory())
                ->addWindowsRegistryKeysModified( Dto\WindowsRegistryKeysModified::factory())
                ->addCertificateData( Dto\CertificateData::factory())
                ->addAdditionalData( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 11 );
    }

    /**
     * Test empty EventData
     *
     * @test
     */
    public function EventDataTest() : void
    {
        $dto = new Dto\EventData();
        $check = Validate\EventData::check( 
            $dto->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'EventData' );

        $result = [];
        $check  = Validate\EventData::check(
            Dto\EventData::factory()
                ->addDescription( Dto\MLStringType::factory())
                ->addContact( Dto\Contact::factory())
                ->addDiscovery( Dto\Discovery::factory()
                    ->addDescription( Dto\MLStringType::factory())
                )
                ->addMethod( Dto\Method::factory())
                ->addExpectation( Dto\Expectation::factory()->addDescription( Dto\MLStringType::factory()))
                ->addRecordData( Dto\RecordData::factory())
                ->addEventData( Dto\EventData::factory())
                ->addAdditionalData( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 11 );
    }

    /**
     * Test empty Indicator
     *
     * @test
     */
    public function IndicatorTest() : void
    {
        $dto = new Dto\Indicator();
        $check = Validate\Indicator::check( 
            $dto->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 3 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Indicator' );

        $result = [];
        $check  = Validate\Indicator::check(
            Dto\Indicator::factory()
                ->setIndicatorID( Dto\IndicatorID::factory())
                ->addAlternativeIndicatorID( Dto\AlternativeIndicatorID::factory())
                ->addDescription( Dto\MLStringType::factory())
                ->addContact( Dto\Contact::factory())
                ->setObservable( Dto\Observable::factory())
                ->setIndicatorReference( Dto\IndicatorReference::factory())
                ->addNodeRole( Dto\NodeRole::factory())
                ->addAttackPhase( Dto\AttackPhase::factory())
                ->addReference( Dto\Reference::factory())
                ->addAdditionalData( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 15 );
    }

    /**
     * Test empty DomainData
     *
     * @test
     */
    public function DomainDataTest() : void
    {
        $dto = new Dto\DomainData();
        $check = Validate\DomainData::check( 
            $dto->setSystemStatus( $dto::EXT_VALUE )
                ->setDomainStatus( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 3 );
        $this->checkResultKey1( __FUNCTION__, $result, 'DomainData' );

        $result = [];
        $check  = Validate\DomainData::check(
        Dto\DomainData::factorySystemDomainName( self::$TEST, self::$TEST, self::$TEST )
                ->addRelatedDNS( Dto\ExtensionType::factory())
                ->addNameservers( Dto\Nameservers::factory())
                ->setDomainContacts( Dto\DomainContacts::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 5 );
    }

    /**
     * Test empty System
     *
     * @test
     */
    public function SystemTest() : void
    {
        $dto = new Dto\System();
        $check = Validate\System::check( 
            $dto->setOwnership( $dto::EXT_VALUE )
                ->setCategory( $dto::EXT_VALUE )
                ->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 4 );
        $this->checkResultKey1( __FUNCTION__, $result, 'System' );

        $result = [];
        $check  = Validate\System::check(
            Dto\System::factory()
                ->setNode( Dto\Node::factory()
                ->setPostalAddress( Dto\MLStringType::factory()))
                ->addNodeRole( Dto\NodeRole::factory())
                ->addService( Dto\Service::factory()
                ->setApplication( Dto\SoftwareType::factory()))
                ->addOperatingSystem( Dto\SoftwareType::factory())
                ->addCounter( Dto\Counter::factory())
                ->addDescription( Dto\MLStringType::factory())
                ->addAdditionalData( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 11 );
    }

    /**
     * Test empty Assessment
     *
     * @test
     */
    public function AssessmentTest() : void
    {
        $dto = new Dto\Assessment();
        $check = Validate\Assessment::check( 
            $dto->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Assessment' );

        $result = [];
        $check  = Validate\Assessment::check(
            Dto\Assessment::factory()
                ->addBusinessImpact( Dto\BusinessImpact::factory())
                ->addIntendedImpact( Dto\IntendedImpact::factory())
                ->addMonetaryImpact( Dto\MonetaryImpact::factory())
                ->addSystemImpact( Dto\SystemImpact::factory())
                ->addTimeImpact( Dto\TimeImpact::factory())
                ->addIncidentCategory( Dto\MLStringType::factory())
                ->addCounter( Dto\Counter::factory())
                ->addMitigatingFactor( MLStringType::factory())
                ->addCause( Dto\MLStringType::factory())
                ->setConfidence( Dto\Confidence::factory())
                ->addAdditionalData( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 16 );
    }

    /**
     * Test empty Contact
     *
     * @test
     */
    public function ContactTest() : void
    {
        $dto = new Dto\Contact();
        $check = Validate\Contact::check( 
            $dto->setRole( $dto::EXT_VALUE )
                ->setRestriction( $dto::EXT_VALUE )
                ->setType( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 4 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Contact' );

        $result = [];
        $check  = Validate\Contact::check(
            Dto\Contact::factoryRoleType( self::$TEST, self::$TEST )
                ->addContactName( Dto\MLStringType::factory())
                ->addContactTitle( Dto\MLStringType::factory())
                ->addDescription( Dto\MLStringType::factory())
                ->addRegistryHandle( Dto\RegistryHandle::factory())
                ->addPostalAddress( Dto\PostalAddress::factory())
                ->addEmail( Dto\Email::factory())
                ->addTelephone( Dto\Telephone::factory())
                ->addContact(Dto\Contact::factory())
                ->addAdditionalData( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 13 );
    }

    /**
     * Test empty Observable
     *
     * @test
     */
    public function ObservableTest() : void
    {
        $dto = new Dto\Observable();
        $check = Validate\Observable::check( 
            $dto->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 2 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Observable' );

        $result = [];
        $check  = Validate\Observable::check(
            Dto\Observable::factory()
                ->setSystem( Dto\System::factory())
                ->setAddress( Dto\Address::factory())
                ->setDomainData( Dto\DomainData::factory())
                ->setService( Dto\Service::factory())
                ->setEmailData( Dto\EmailData::factory()->addEmailHeaderField( Dto\ExtensionType::factory()))
                ->setWindowsRegistryKeysModified( Dto\WindowsRegistryKeysModified::factory())
                ->setFileData( Dto\FileData::factory())
                ->setCertificateData( Dto\CertificateData::factory())
                ->setRegistryHandle( Dto\RegistryHandle::factory())
                ->setRecordData( Dto\RecordData::factory())
                ->setEventData( Dto\EventData::factory())
                ->setIncident( Dto\Incident::factory()->addDescription( Dto\MLStringType::factory()))
                ->setExpectation( Dto\Expectation::factory()->addDescription( Dto\MLStringType::factory()))
                ->setReference( Dto\Reference::factory())
                ->setAssessment( Dto\Assessment::factory())
                ->setHistoryItem( Dto\HistoryItem::factory())
                ->setDetectionPattern( Dto\DetectionPattern::factory())
                ->setBulkObservable( Dto\BulkObservable::factory())
                ->addAdditionalData( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 31 );
    }

    /**
     * Test empty Incident
     *
     * @test
     */
    public function IncidentTest() : void
    {
        $dto = new Dto\Incident();
        $check = Validate\Incident::check( 
            $dto->setPurpose( $dto::EXT_VALUE )
                ->setStatus( $dto::EXT_VALUE )
                ->setRestriction( $dto::EXT_VALUE ),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 6 );
        $this->checkResultKey1( __FUNCTION__, $result, 'Incident' );

        $result = [];
        $check  = Validate\Incident::check(
            Dto\Incident::factory()
                ->setIncidentID( Dto\IncidentID::factory())
                ->setAlternativeID( Dto\AlternativeID::factory())
                ->addRelatedActivity( Dto\RelatedActivity::factory())
                ->setGenerationTime( new DateTime())
                ->addDescription( Dto\MLStringType::factory())
                ->addDiscovery( Dto\Discovery::factory()->addDescription( Dto\MLStringType::factory()))
                ->addAssessment(Dto\Assessment::factory())
                ->addMethod( Dto\Method::factory())
                ->addContact( Dto\Contact::factory())
                ->addEventData( Dto\EventData::factory())
                ->addIndicator( Dto\Indicator::factory())
                ->setHistory( Dto\History::factory())
                ->addAdditionalData( Dto\ExtensionType::factory()),
            $result
        );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 18 );
    }

    /**
     * Test empty IODEFdocument
     *
     * @test
     */
    public function IODEFdocumentTest() : void
    {
        $dto = new Dto\IODEFdocument();
        $check = PhpIncExSdk::factory(
            null,
            $dto
        )
            ->validateDto( null, $result );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 1 );
        $this->checkResultKey1( __FUNCTION__, $result, 'IODEFdocument' );

        $result = [];
        $check  = PhpIncExSdk::factory(
            null,
            Dto\IODEFdocument::factory()
                ->setVersion( null )
                ->addIncident( Dto\Incident::factory())
                ->addAdditionalData( Dto\ExtensionType::factory())
        )
            ->validateDto( null, $result );
        $this->checkCheckFalse( __FUNCTION__, $check, $result, 7 );
    }
}
