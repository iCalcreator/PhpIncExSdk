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
 * The HashData class describes different types of hashes on a given object (e.g., file, part of a file, email).
 *
 * HashData MUST have ATTRIBUTE(s) scope
 * At least one instance of either Hash or FuzzyHash MUST be present.
 */
class HashData extends DtoBase
{
    /**
     * Factory method with required property scope
     *
     * @param string $scope
     * @return static
     */
    public static function factoryScope( string $scope ) : static
    {
        return parent::factory()
            ->setScope( $scope );
    }

    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return ( $this->isScopeSet() && ( $this->isHashSet() || $this->isFuzzyHashSet()));
    }

    /**
     * ATTRIBUTE scope
     *
     * Required.  ENUM.
     * Describes on which part of the object the hash should be applied.
     * These values are maintained in the "HashData-scope" IANA registry per Section 10.2.
     *    1.  file-contents.  A hash computed over the entire contents of a file.
     *    2.  file-pe-section.  A hash computed on a given section of a Windows Portable Executable (PE) file.
     *                          If set to this value, the HashTargetID class MUST identify the section being hashed.
     *                          A section is identified by an ordinal number (starting at 1)
     *                          corresponding to the order in which the given section header
     *                          was defined in the Section Table of the PE file header.
     *    3.  file-pe-iat.  A hash computed on the Import Address Table (IAT) of a PE file.
     *                      As IAT hashes are often tool dependent, if this value is set,
     *                      the Application class of either the Hash or FuzzyHash classes MUST
     *                      specify the tool used to generate the hash.
     *    4.  file-pe-resource.  A hash computed on a given resource in a PE file.
     *                           If set to this value, the HashTargetID class MUST identify the resource being hashed.
     *                           A resource is identified by an ordinal number (starting at 1) corresponding to the
     *                           order in which the given resource is declared in the Resource
     *                           Directory of the Data Dictionary in the PE file header.
     *    5.  file-pdf-object.  A hash computed on a given object in a Portable Document Format (PDF) file.
     *                          If set to this value, the HashTargetID class MUST identify the object being hashed.
     *                          This object is identified by its offset in the PDF file.
     *    6.  email-hash.  A hash computed over the headers and body of an  email message.
     *    7.  email-headers-hash.  A hash computed over all of the headers of an email message.
     *    8.  email-body-hash.  A hash computed over the body of an email message.
     *    9.  ext-value.  A value used to indicate that this attribute is extended and the actual value
     *                    is provided using the corresponding ext-* attribute.
     *                    See Section 5.1.1.
     * @var string|null
     */
    private ? string $scope = null;

    /**
     * @return string|null
     */
    public function getScope() : ? string
    {
        return $this->scope;
    }

    /**
     * Return bool true if scope is set
     *
     * @return bool
     */
    public function isScopeSet() : bool
    {
        return ( null !== $this->scope );
    }

    /**
     * @param string|null $scope
     * @return static
     */
    public function setScope( ? string $scope = null ) : static
    {
        $this->scope = $scope;
        return $this;
    }

    /**
     * HashTargetID
     *
     * Zero or one.  STRING.
     * An identifier that references a subset of the object being hashed.
     * The semantics of this identifier are specified by the scope attribute.
     *
     * @var string|null
     */
    private ? string $hashTargetID = null;

    /**
     * @return string|null
     */
    public function getHashTargetID() : ? string
    {
        return $this->hashTargetID;
    }

    /**
     * Return bool true if hashTargetID is set
     *
     * @return bool
     */
    public function isHashTargetIDSet() : bool
    {
        return ( null !== $this->hashTargetID );
    }

    /**
     * @param string|null $hashTargetID
     * @return static
     */
    public function setHashTargetID( ? string $hashTargetID = null ) : static
    {
        $this->hashTargetID = $hashTargetID;
        return $this;
    }

    /**
     * Hash
     *
     * Zero or more.
     * The hash of an object.
     * See Section 3.26.1.
     *
     * @var Hash[]
     */
    private array $hash = [];

    /**
     * @return Hash[]
     */
    public function getHash() : array
    {
        return $this->hash;
    }

    /**
     * Return bool true if hash is set
     *
     * @return bool
     */
    public function isHashSet() : bool
    {
        return ! empty( $this->hash );
    }

    /**
     * @param Hash $hash
     * @return static
     */
    public function addHash( Hash $hash ) : static
    {
        $this->hash[] = $hash;
        return $this;
    }

    /**
     * @param null|Hash[] $hash
     * @return static
     */
    public function setHash( ? array $hash = [] ) : static
    {
        $this->hash = [];
        foreach( $hash as $theHash ) {
            $this->addHash( $theHash );
        }
        return $this;
    }

    /**
     * FuzzyHash
     *
     * Zero or more.
     * The fuzzy hash of an object.
     * See Section 3.26.2.
     *
     * @var FuzzyHash[]
     */
    private array $fuzzyFuzzyHash = [];

    /**
     * @return FuzzyHash[]
     */
    public function getFuzzyHash() : array
    {
        return $this->fuzzyFuzzyHash;
    }

    /**
     * Return bool true if fuzzyFuzzyHash is set
     *
     * @return bool
     */
    public function isFuzzyHashSet() : bool
    {
        return ! empty( $this->fuzzyFuzzyHash );
    }

    /**
     * @param FuzzyHash $fuzzyFuzzyHash
     * @return static
     */
    public function addFuzzyHash( FuzzyHash $fuzzyFuzzyHash ) : static
    {
        $this->fuzzyFuzzyHash[] = $fuzzyFuzzyHash;
        return $this;
    }

    /**
     * @param null|FuzzyHash[] $fuzzyFuzzyHash
     * @return static
     */
    public function setFuzzyHash( ? array $fuzzyFuzzyHash = [] ) : static
    {
        $this->fuzzyFuzzyHash = [];
        foreach( $fuzzyFuzzyHash as $theFuzzyHash ) {
            $this->addFuzzyHash( $theFuzzyHash );
        }
        return $this;
    }
}
