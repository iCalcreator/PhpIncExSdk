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

class RfcParseTest extends TestCase
{
    /**
     * parseTest provider
     *
     * @return mixed[]
     */
    public function parseTestProvider() : array
    {
        $dataArr = [];

        // rfc 8984 6.1.  Simple Event
        $dataArr[] = [
            '1',
            '{
    "version": "2.0",
    "lang": "en",
    "Incident": [
        {
            "purpose": "reporting",
            "restriction": "private",
            "IncidentID": {
                "id": "492382",
                "name": "csirt.example.com"
            },
            "GenerationTime": "2015-07-18T09:00:00-05:00",
            "Contact": [
                {
                    "role": "creator",
                    "type": "organization",
                    "Email": [
                        {
                            "EmailTo": "contact@csirt.example.com"
                        }
                    ]
                }
            ]
        }
    ]
}'
        ];

        // rfc 8984 6.10.  Recurring Event with Participants
        $dataArr[] = [
            '2',
            '{
    "version": "2.0",
    "lang": "en",
    "Incident": [
        {
            "purpose": "watch",
            "restriction": "green",
            "IncidentID": {
                "id": "897923",
                "name": "csirt.example.com"
            },
            "RelatedActivity": [
                {
                    "ThreatActor": [
                        {
                            "ThreatActorID": [
                                "TA-12-AGGRESSIVE-BUTTERFLY"
                            ],
                            "Description": [
                                "Aggressive Butterfly"
                            ]
                        }
                    ],
                    "Campaign": [
                        {
                            "CampaignID": [
                                "C-2015-59405"
                            ],
                            "Description": [
                                "Orange Giraffe"
                            ]
                        }
                    ]
                }
            ],
            "GenerationTime": "2015-10-02T11:18:00-05:00",
            "Description": [
                "Summarizes the Indicators of Compromise for the Orange Giraffe campaign of the Aggressive Butterfly crime gang."
            ],
            "Assessment": [
                {
                    "Impact": [
                        {
                            "BusinessImpact": {
                                "type": "breach-proprietary"
                            }
                        }
                    ]
                }
            ],
            "Contact": [
                {
                    "role": "creator",
                    "type": "organization",
                    "ContactName": [
                        "CSIRT for example.com"
                    ],
                    "Email": [
                        {
                            "EmailTo": "contact@csirt.example.com"
                        }
                    ]
                }
            ],
            "Indicator": [
                {
                    "IndicatorID": {
                        "id": "G90823490",
                        "name": "csirt.example.com",
                        "version": "1"
                    },
                    "Description": [
                        "C2 domains"
                    ],
                    "StartTime": "2014-12-02T11:18:00-05:00",
                    "Observable": {
                        "BulkObservable": {
                            "type": "domain-name",
                            "BulkObservableList": "kj290023j09r34.example.com"
                        }
                    }
                }
            ]
        }
    ]
}'
        ];

        return $dataArr;
    }

    /**
     * Testing json string parse + json string write
     *
     * @test
     * @dataProvider parseTestProvider
     *
     * @param string $case
     * @param string $jsonString
     */
    public function parseTest( string $case, string $jsonString ) : void
    {

//      error_log( __FUNCTION__ . ' case : ' . $case ); // test ###

        $phpJsCalendar = PhpIncExSdk::factory( $jsonString );

        $dto           = $phpJsCalendar->jsonParse()->getDto();

//      echo 'Dto : ' . var_export( $dto, true ) . PHP_EOL; // test ###

        $jsonString2   = $phpJsCalendar->jsonWrite( $dto, true )->getJsonString();

        $this->assertSame(
            $jsonString,
            $jsonString2,
            'diff error in #1-' . $case . '-1'
        );

//      echo 'case ' . $case . PHP_EOL . $jsonString3; // test ###
    }
}
