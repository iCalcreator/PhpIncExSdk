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

use Exception;
use Kigkonsult\PhpIncExSdk\Dto\IODEFdocument as Dto;
use Kigkonsult\PhpIncExSdk\DtoLoad\IODEFdocument;
use PHPUnit\Framework\TestCase;

include 'PHPDiff/PHPDiff.php';

class FakerTest extends TestCase
{
    /**
     * fakerTest provider
     *
     * @return mixed[]
     */
    public function fakerTestProvider() : array
    {
        $dataArr = [];

        $dataArr[] = [
            1,
            false  // mini
        ];

        $dataArr[] = [
            2,
            true  // full
        ];

        return $dataArr;
    }
    /**
     * Testing json string parse + json string write once using (mini/full) faker load
     *
     * @test
     * @dataProvider fakerTestProvider
     *
     * @param int $case
     * @param bool $load
     * @throws Exception
     */
    public function fakerTest( int $case, bool $load ) : void
    {
        $this->IODEFdocumentTest(
            $case,
            IODEFdocument::load( $load )
        );
    }

    /**
     * Testing json string parse + json string write 10 times using (full) faker load
     *
     * @test
     *
     * @throws Exception
     */
    public function manyFakerTest() : void
    {
        for( $x = 10; $x < 20; $x++ ) {
            $this->IODEFdocumentTest(
                $x,
                IODEFdocument::load( true )
            );
        }
    }

    /**
     * @param int $case
     * @param Dto $dto1
     * @throws Exception
     */
    public function IODEFdocumentTest( int $case, Dto $dto1 ) : void
    {
        $jsonString1 = PhpIncExSdk::factoryJsonWrite( $dto1, true )->getJsonString();

        $dto2        = PhpIncExSdk::factoryJsonParse( $jsonString1 )->getDto();
//      error_log( 'Dto1: ' . PHP_EOL . var_export( $dto1, true )); // test ###
//      error_log( 'Dto2: ' . PHP_EOL . var_export( $dto2, true )); // test ###

        $jsonString2 = PhpIncExSdk::factoryJsonWrite( $dto2, true )->getJsonString();

        if( $jsonString1 !== $jsonString2 ) {
            $diff = PHPDiff( $jsonString1, $jsonString2 );
            error_log( __FUNCTION__ . 'start case #' . $case ); // test ###
            error_log( 'jsonString1 : ' . PHP_EOL . $jsonString1 ); // test ###
            error_log( 'jsonString2 : ' . PHP_EOL . $jsonString2 ); // test ###
            $this->fail(
                'diff case #' . $case . ' error : ' . PHP_EOL . $diff
            );
        }
        else {
            $this->assertTrue( true ); // pro forma...
        }
    }
}
