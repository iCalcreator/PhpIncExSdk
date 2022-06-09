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

use InvalidArgumentException;
use Kigkonsult\PhpIncExSdk\Dto\AttackPattern       as AttackPatternDto;
use Kigkonsult\PhpIncExSdk\Dto\BusinessImpact      as BusinessImpactDto;
use Kigkonsult\PhpIncExSdk\Dto\Confidence          as ConfidenceDto;
use Kigkonsult\PhpIncExSdk\Dto\Contact             as ContactDto;
use Kigkonsult\PhpIncExSdk\Dto\Counter             as CounterDto;
use Kigkonsult\PhpIncExSdk\Dto\DomainData          as DomainDataDto;
use Kigkonsult\PhpIncExSdk\Dto\EmailData           as EmailDataDto;
use Kigkonsult\PhpIncExSdk\Dto\Expectation         as ExpectationDto;
use Kigkonsult\PhpIncExSdk\Dto\File                as FileDto;
use Kigkonsult\PhpIncExSdk\Dto\Discovery           as DiscoveryDto;
use Kigkonsult\PhpIncExSdk\Dto\HistoryItem         as HistoryItemDto;
use Kigkonsult\PhpIncExSdk\Dto\Incident            as IncidentDto;
use Kigkonsult\PhpIncExSdk\Dto\IndicatorExpression as IndicatorExpressionDto;
use Kigkonsult\PhpIncExSdk\Dto\IndicatorID         as IndicatorIDDto;
use Kigkonsult\PhpIncExSdk\Dto\IODEFdocument       as IODEFdocumentDto;
use Kigkonsult\PhpIncExSdk\Dto\Key                 as KeyDto;
use Kigkonsult\PhpIncExSdk\Dto\RecordPattern       as RecordPatternDto;
use Kigkonsult\PhpIncExSdk\Dto\RegistryHandle      as RegistryHandleDto;
use Kigkonsult\PhpIncExSdk\Dto\Service             as ServiceDto;
use Kigkonsult\PhpIncExSdk\Dto\SoftwareReference   as SoftwareReferenceDto;
use Kigkonsult\PhpIncExSdk\Dto\System              as SystemDto;
use Kigkonsult\PhpIncExSdk\Dto\TimeImpact          as TimeImpactDto;
use Kigkonsult\PhpIncExSdk\Dto\Traits\AssertIDLISTTrait;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class MiscTest extends TestCase
{
    /**
     * @var string
     */
    protected static string $TEST = 'test';

    /**
     * Test Dtobase::getGUID()
     *
     * @test
     */
    public function getGUIDTest() : void
    {
        $guid = IndicatorIDDto::createGUID();
        $ok = true;
        try {
            $this->assertIDLIST( self::$TEST, $guid );
        }
        catch( InvalidArgumentException $ie ) {
            $ok = false;
        }
        $this->assertTrue(
            $ok,
            'Error in ' . __FUNCTION__
        );
    }

    use AssertIDLISTTrait;

    /**
     * Test some PhpIncExSdk exceptions
     *
     * @test
     */
    public function PhpIncExSdkExceptionTest() : void
    {
        $ok = false;
        try {
            PhpIncExSdk::factory()->jsonParse();
        }
        catch( RuntimeException $re ) {
            $ok = true;
        }
        $this->assertTrue(
            $ok,
            __FUNCTION__ . ' #1 exception error on jsonParse test'
        );

        $ok = false;
        try {
            PhpIncExSdk::factory()->jsonParse( 'error' );
        }
        catch( RuntimeException $re ) {
            $ok = true;
        }
        $this->assertTrue(
            $ok,
            __FUNCTION__ . ' #2 exception error on jsonParse test'
        );

        $ok = false;
        try {
            PhpIncExSdk::factory()->jsonWrite();
        }
        catch( RuntimeException $re ) {
            $ok = true;
        }
        $this->assertTrue(
            $ok,
            __FUNCTION__ . ' #3 exception error on jsonWrite test'
        );

        $jsonString = null;
        $ok = false;
        try {
            $jsonString = PhpIncExSdk::factoryJsonWrite( new IODEFdocumentDto())->getJsonString();
        }
        catch( RuntimeException $re ) {
            $ok = true;
        }
        $this->assertFalse(
            $ok,
            __FUNCTION__ . ' #4 exception error on jsonWrite test : ' . $jsonString
        );
    }

    /**
     * Test Contact::setTimezone()
     *
     * @test
     */
    public function timezoneTest() : void
    {
        $ok = false;
        try {
            $contact = new ContactDto();
            $contact->setTimezone( 'error' );
        }
        catch( InvalidArgumentException $ie ) {
            $ok = true;
        }
        $this->assertTrue(
            $ok,
            'Error in ' . __FUNCTION__
        );

        $ok = false;
        try {
            $contact = new ContactDto();
            $contact->setTimezone( '123456789' );
        }
        catch( InvalidArgumentException $ie ) {
            $ok = true;
        }
        $this->assertTrue(
            $ok,
            'Error in ' . __FUNCTION__
        );

        $ok = false;
        try {
            $contact = new ContactDto();
            $contact->setTimezone( '+12345:6789' );
        }
        catch( InvalidArgumentException $ie ) {
            $ok = true;
        }
        $this->assertTrue(
            $ok,
            'Error in ' . __FUNCTION__
        );
    }

    /**
     * Test Service::setPortlist()
     *
     * @test
     */
    public function portlistTest() : void
    {
        $ok = false;
        try {
            $service = new ServiceDto();
            $service->setPortlist( 'error' );
        }
        catch( InvalidArgumentException $ie ) {
            $ok = true;
        }
        $this->assertTrue(
            $ok,
            'Error in ' . __FUNCTION__
        );
    }

    /**
     * Test assertIDLISTTrait
     *
     * @test
     */
    public function assertIDLISTTest() : void
    {
        $ok = false;
        try {
            IndicatorIDDto::factoryNameVersionId( self::$TEST, self::$TEST, '!"#' );
        }
        catch( InvalidArgumentException $ie ) {
            $ok = true;
        }
        $this->assertTrue(
            $ok,
            'Error in ' . __FUNCTION__
        );
    }

    /**
     * Test extAction
     *
     * @test
     */
    public function extActionTest() : void
    {
        $dto = new HistoryItemDto();

        $this->assertEquals( self::$TEST, $dto->setExtAction( self::$TEST )->getExtAction());
    }

    /**
     * Test extSpecID
     *
     * @test
     */
    public function extSpecIDTest() : void
    {
        $dto = new AttackPatternDto();

        $this->assertEquals( self::$TEST, $dto->setExtSpecID( self::$TEST )->getExtSpecID());
    }

    /**
     * Test extSeverity
     *
     * @test
     */
    public function extSeverityTest() : void
    {
        $dto = new BusinessImpactDto();

        $this->assertEquals( self::$TEST, $dto->setExtSeverity( self::$TEST )->getExtSeverity());
    }

    /**
     * Test extRating
     *
     * @test
     */
    public function extRatingTest() : void
    {
        $dto = new ConfidenceDto();

        $this->assertEquals( self::$TEST, $dto->setExtRating( self::$TEST )->getExtRating());
    }

    /**
     * Test extRole
     *
     * @test
     */
    public function extRoleTest() : void
    {
        $dto = new ContactDto();

        $this->assertEquals( self::$TEST, $dto->setExtRole( self::$TEST )->getExtRole());
    }

    /**
     * Test extUnit
     *
     * @test
     */
    public function extUnitTest() : void
    {
        $dto = new CounterDto();

        $this->assertEquals( self::$TEST, $dto->setExtUnit( self::$TEST )->getExtUnit());
    }

    /**
     * Test extSource
     *
     * @test
     */
    public function extSourceTest() : void
    {
        $dto = new DiscoveryDto();

        $this->assertEquals( self::$TEST, $dto->setExtSource( self::$TEST )->getExtSource());
    }

    /**
     * Test extSystemStatus
     *
     * @test
     */
    public function extSystemStatusTest() : void
    {
        $dto = new DomainDataDto();

        $this->assertEquals( self::$TEST, $dto->setExtSystemStatus( self::$TEST )->getExtSystemStatus());
    }

    /**
     * Test extDomainStatus
     *
     * @test
     */
    public function extDomainStatusTest() : void
    {
        $dto = new DomainDataDto();

        $this->assertEquals( self::$TEST, $dto->setExtDomainStatus( self::$TEST )->getExtDomainStatus());
    }

    /**
     * Test extPurpose
     *
     * @test
     */
    public function extPurposeTest() : void
    {
        $dto = new IncidentDto();

        $this->assertEquals( self::$TEST, $dto->setExtPurpose( self::$TEST )->getExtPurpose());
    }

    /**
     * Test extStatus
     *
     * @test
     */
    public function extStatusTest() : void
    {
        $dto = new IncidentDto();

        $this->assertEquals( self::$TEST, $dto->setExtStatus( self::$TEST )->getExtStatus());
    }

    /**
     * Test extOperator
     *
     * @test
     */
    public function extOperatorTest() : void
    {
        $dto = new IndicatorExpressionDto();

        $this->assertEquals( self::$TEST, $dto->setExtOperator( self::$TEST )->getExtOperator());
    }

    /**
     * Test extRegistryaction
     *
     * @test
     */
    public function extRegistryactionTest() : void
    {
        $dto = new KeyDto();

        $this->assertEquals( self::$TEST, $dto->setExtRegistryaction( self::$TEST )->getExtRegistryaction());
    }

    /**
     * Test extOffsetunit
     *
     * @test
     */
    public function extOffsetunitTest() : void
    {
        $dto = new RecordPatternDto();

        $this->assertEquals( self::$TEST, $dto->setExtOffsetunit( self::$TEST )->getExtOffsetunit());
    }

    /**
     * Test extRegistry
     *
     * @test
     */
    public function extRegistryTest() : void
    {
        $dto = new RegistryHandleDto();

        $this->assertEquals( self::$TEST, $dto->setExtRegistry( self::$TEST )->getExtRegistry());
    }

    /**
     * Test extSpecName
     *
     * @test
     */
    public function extSpecNameTest() : void
    {
        $dto = new SoftwareReferenceDto();

        $this->assertEquals( self::$TEST, $dto->setExtSpecName( self::$TEST )->getExtSpecName());
    }

    /**
     * Test extOwnership
     *
     * @test
     */
    public function extOwnershipTest() : void
    {
        $dto = new SystemDto();

        $this->assertEquals( self::$TEST, $dto->setExtOwnership( self::$TEST )->getExtOwnership());
    }

    /**
     * Test extMetric
     *
     * @test
     */
    public function extMetricTest() : void
    {
        $dto = new TimeImpactDto();

        $this->assertEquals( self::$TEST, $dto->setExtMetric( self::$TEST )->getExtMetric());
    }

    /**
     * Test extCategory
     *
     * @test
     */
    public function extCategoryTest() : void
    {
        $dto = new SystemDto();

        $this->assertEquals( self::$TEST, $dto->setExtCategory( self::$TEST )->getExtCategory());
    }

    /**
     * Test extDtype
     *
     * @test
     */
    public function extDtypeTest() : void
    {
        $dto = new SoftwareReferenceDto();

        $this->assertEquals( self::$TEST, $dto->setExtDtype( self::$TEST )->getExtDtype());
    }

    /**
     * Test extDuration
     *
     * @test
     */
    public function extDurationTest() : void
    {
        $dto = new CounterDto();

        $this->assertEquals( self::$TEST, $dto->setExtDuration( self::$TEST )->getExtDuration());
    }

    /**
     * Test extRestriction
     *
     * @test
     */
    public function extRestrictionTest() : void
    {
        $dto = new ContactDto();

        $this->assertEquals( self::$TEST, $dto->setExtRestriction( self::$TEST )->getExtRestriction());
    }

    /**
     * Test extType
     *
     * @test
     */
    public function extTypeTest() : void
    {
        $dto = new ContactDto();

        $this->assertEquals( self::$TEST, $dto->setExtType( self::$TEST )->getExtType());
    }

    /**
     * Test Discovery::isRequiredSet() (always true)
     *
     * @test
     */
    public function isRequiredSet1Test() : void
    {
        $dto = new DiscoveryDto();

        $this->assertTrue( $dto->isRequiredSet());
    }

    /**
     * Test EmailData::isRequiredSet() (always true)
     *
     * @test
     */
    public function isRequiredSet2Test() : void
    {
        $dto = new EmailDataDto();

        $this->assertTrue( $dto->isRequiredSet());
    }

    /**
     * Test File::isRequiredSet() (always true)
     *
     * @test
     */
    public function isRequiredSet3Test() : void
    {
        $dto = new FileDto();

        $this->assertTrue( $dto->isRequiredSet());
    }

    /**
     * Test Expectation::isRequiredSet() (always true)
     *
     * @test
     */
    public function isRequiredSet4Test() : void
    {
        $dto = new ExpectationDto();

        $this->assertTrue( $dto->isRequiredSet());
    }

    /**
     * Test File::isRequiredSet() (always true)
     *
     * @test
     */
    public function isRequiredSet5Test() : void
    {
        $dto = new FileDto();

        $this->assertTrue( $dto->isRequiredSet());
    }

    /**
     * Test IndicatorExpression::isRequiredSet() (always true)
     *
     * @test
     */
    public function isRequiredSet6Test() : void
    {
        $dto = new IndicatorExpressionDto();

        $this->assertTrue( $dto->isRequiredSet());
    }
}
