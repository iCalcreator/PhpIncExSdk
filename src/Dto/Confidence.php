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

use Kigkonsult\PhpIncExSdk\Dto\Traits\ContentRealTrait;

/**
 * The Confidence class represents an estimate of the validity and accuracy of data expressed in the document.
 * This estimate can be expressed as a category or a numeric calculation.
 *
 * Confidence MUST have ATTRIBUTE(s) rating and value
 */
class Confidence extends DtoBase
{
    /**
     * Factory method with required properties
     *
     * @param string $rating
     * @param float $value
     * @return static
     */
    public static function factoryRatingValue( string $rating, float $value ) : static
    {
        return parent::factory()
            ->setRating( $rating )
            ->setValue( $value );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isRatingSet() && $this->isValueSet());
    }

    /**
     * ATTRIBUTE rating
     *
     * Required.  ENUM.
     * A qualitative assessment of confidence.
     * These values are maintained in the "Confidence-rating" IANA registry per Section 10.2
     *    1.  low.  Low confidence.
     *    2.  medium.  Medium confidence.
     *    3.  high.  High confidence.
     *    4.  numeric.  The element content contains a number that conveys the confidence of the data.
     *                  The semantics of this number is outside the scope of this specification.
     *    5.  unknown.  The confidence rating value is not known.
     *    6.  ext-value.  A value used to indicate that this attribute is extended and the actual value
     *                    is provided using the corresponding ext-* attribute.  See Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $rating = null;

    /**
     * @return string|null
     */
    public function getRating() : ? string
    {
        return $this->rating;
    }

    /**
     * Return bool true if rating is set
     *
     * @return bool
     */
    public function isRatingSet() : bool
    {
        return ( null !== $this->rating );
    }

    /**
     * @param string|null $rating
     * @return static
     */
    public function setRating( ? string $rating = null ) : static
    {
        $this->rating = $rating;
        return $this;
    }

    /**
     * ATTRIBUTE ext-rating
     *
     * Optional.  STRING.
     * A means by which to extend the rating attribute.
     * See Section 5.1.1.
     *
     * @var string|null
     */
    private ? string $extExtRating = null;

    /**
     * @return string|null
     */
    public function getExtRating() : ? string
    {
        return $this->extExtRating;
    }

    /**
     * Return bool true if extExtRating is set
     *
     * @return bool
     */
    public function isExtRatingSet() : bool
    {
        return ( null !== $this->extExtRating );
    }

    /**
     * @param string|null $extExtRating
     * @return static
     */
    public function setExtRating( ? string $extExtRating = null ) : static
    {
        $this->extExtRating = $extExtRating;
        return $this;
    }

    /**
     * Content
     *
     * The content of the class is of type REAL and specifies a numerical assessment in the confidence of the data
     * when the value of the rating attribute is "numeric".  Otherwise, this element MUST be empty.
     */
    use ContentRealTrait;
}
