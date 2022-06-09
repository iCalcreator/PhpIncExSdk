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

/**
 * Base class for AttackPattern, Platform, Scoring
 */
abstract class StructuredInfoType extends BasicStructure
{
    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     *
    public function isRequiredSet() : bool
    {
        return parent::isRequiredSet();
    }
     */

    /**
     * @var Platform[]
     */
    protected array $platform = [];

    /**
     * @return Platform[]
     */
    public function getPlatform() : array
    {
        return $this->platform;
    }

    /**
     * Return bool true if platform is set
     *
     * @return bool
     */
    public function isPlatformSet() : bool
    {
        return ! empty( $this->platform );
    }

    /**
     * @param Platform $platform
     * @return static
     */
    public function addPlatform( Platform $platform ) : static
    {
        $this->platform[] = $platform;
        return $this;
    }

    /**
     * @param null|Platform[] $platform
     * @return static
     */
    public function setPlatform( ? array $platform = [] ) : static
    {
        $this->platform = [];
        foreach( $platform as $thePlatform ) {
            $this->addPlatform( $thePlatform );
        }
        return $this;
    }

    /**
     * @var Scoring[]
     */
    protected array $scoring = [];

    /**
     * @return Scoring[]
     */
    public function getScoring() : array
    {
        return $this->scoring;
    }

    /**
     * Return bool true if scoring is set
     *
     * @return bool
     */
    public function isScoringSet() : bool
    {
        return ! empty( $this->scoring );
    }

    /**
     * @param Scoring $scoring
     * @return static
     */
    public function addScoring( Scoring $scoring ) : static
    {
        $this->scoring[] = $scoring;
        return $this;
    }

    /**
     * @param null|Scoring[] $scoring
     * @return static
     */
    public function setScoring( ? array $scoring = [] ) : static
    {
        $this->scoring = [];
        foreach( $scoring as $theScoring ) {
            $this->addScoring( $theScoring );
        }
        return $this;
    }
}
