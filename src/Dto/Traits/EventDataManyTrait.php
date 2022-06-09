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
namespace Kigkonsult\PhpIncExSdk\Dto\Traits;

use Kigkonsult\PhpIncExSdk\Dto\EventData;

trait EventDataManyTrait
{
    /**
     * @var EventData[]
     */
    private array $eventData = [];

    /**
     * @return EventData[]
     */
    public function getEventData() : array
    {
        return $this->eventData;
    }

    /**
     * Return bool true if eventData is set
     *
     * @return bool
     */
    public function isEventDataSet() : bool
    {
        return ! empty( $this->eventData );
    }

    /**
     * @param EventData $eventData
     * @return static
     */
    public function addEventData( EventData $eventData ) : static
    {
        $this->eventData[] = $eventData;
        return $this;
    }

    /**
     * @param EventData[] $eventData
     * @return static
     */
    public function setEventData( ? array $eventData = [] ) : static
    {
        $this->eventData = [];
        foreach( $eventData as $theEventData ) {
            $this->addEventData( $theEventData );
        }
        return $this;
    }
}
