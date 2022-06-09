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

use Kigkonsult\PhpIncExSdk\Dto\Traits\ObservableIdTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\SignatureManyTrait;
use Kigkonsult\PhpIncExSdk\Dto\Traits\UrlManyTrait;

/**
 * The File class describes a file; its associated metadata; and cryptographic hashes and signatures applied to it.
 *
 * No requirements found
 */
class File extends DtoBase
{
    /**
     * Return bool true if any of the required properties are set, se above
     *
     * @return bool
     */
    public function isRequiredSet() : bool
    {
        return true;
    }

    /**
     * ATTRIBUTE observable-id
     *
     * Optional.  ID.
     * See (rfc7970) Section 3.3.2.
     */
    use ObservableIdTrait;

    /**
     * FileName
     *
     * Zero or one.  STRING.
     * The name of the file.
     *
     * @var string|null
     */
    private ? string $fileName = null;

    /**
     * @return string|null
     */
    public function getFileName() : ? string
    {
        return $this->fileName;
    }

    /**
     * Return bool true if fileName is set
     *
     * @return bool
     */
    public function isFileNameSet() : bool
    {
        return ( null !== $this->fileName );
    }

    /**
     * @param string|null $fileName
     * @return static
     */
    public function setFileName( ? string $fileName = null ) : static
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * FileSize
     *
     * Zero or one.  INTEGER.
     * The size of the file in bytes.
     *
     * @var int|null
     */
    private ? int $fileSize = null;

    /**
     * @return int|null
     */
    public function getFileSize() : ?int
    {
        return $this->fileSize;
    }

    /**
     * Return bool true if fileSize is set
     *
     * @return bool
     */
    public function isFileSizeSet() : bool
    {
        return ( null !== $this->fileSize );
    }

    /**
     * @param int|null $fileSize
     * @return static
     */
    public function setFileSize( ? int $fileSize = null ) : static
    {
        $this->fileSize = $fileSize;
        return $this;
    }

    /**
     * FileType
     *
     * Zero or one.  STRING.
     * The type of file per the IANA "Media Types" registry [IANA.Media].
     * Valid values correspond to the text in the "Template" column (e.g., "application/pdf").
     *
     * @var string|null
     */
    private ? string $fileType = null;

    /**
     * @return string|null
     */
    public function getFileType() : ? string
    {
        return $this->fileType;
    }

    /**
     * Return bool true if fileType is set
     *
     * @return bool
     */
    public function isFileTypeSet() : bool
    {
        return ( null !== $this->fileType );
    }

    /**
     * @param string|null $fileType
     * @return static
     */
    public function setFileType( ? string $fileType = null ) : static
    {
        $this->fileType = $fileType;
        return $this;
    }

    /**
     * URL
     *
     * Zero or more.  URL.
     * A URL reference to the file.
     */
    use UrlManyTrait;

    /**
     * HashData
     *
     * Zero or one.
     * Hash(es) associated with this file.
     * SeeSection 3.26.
     *
     * @var HashData|null
     */
    private ? HashData $hashData = null;

    /**
     * @return HashData|null
     */
    public function getHashData() : ?HashData
    {
        return $this->hashData;
    }

    /**
     * Return bool true if hashData is set
     *
     * @return bool
     */
    public function isHashDataSet() : bool
    {
        return ( null !== $this->hashData );
    }

    /**
     * @param HashData|null $hashData
     * @return static
     */
    public function setHashData( ? HashData $hashData = null ) : static
    {
        $this->hashData = $hashData;
        return $this;
    }

    /**
     * SignatureData
     *
     * Zero or one. Signature
     * Signature(s) associated with this file.
     */
    use SignatureManyTrait;

    /**
     * AssociatedSoftware
     *
     * Zero or one.  SOFTWARE.
     * The software application or operating system to which this file belongs or by which it can be processed.
     *
     * @var SoftwareType|null
     */
    private ? SoftwareType $associatedSoftware = null;

    /**
     * @return SoftwareType|null
     */
    public function getAssociatedSoftware() : ?SoftwareType
    {
        return $this->associatedSoftware;
    }

    /**
     * Return bool true if associatedSoftware is set
     *
     * @return bool
     */
    public function isAssociatedSoftwareSet() : bool
    {
        return ( null !== $this->associatedSoftware );
    }

    /**
     * @param SoftwareType|null $associatedSoftware
     * @return static
     */
    public function setAssociatedSoftware( ? SoftwareType $associatedSoftware = null ) : static
    {
        $this->associatedSoftware = $associatedSoftware;
        return $this;
    }

    /**
     * FileProperties
     *
     * Zero or more.  EXTENSION.
     * Mechanism by which to extend the data model to describe properties of the file.
     *
     * @var ExtensionType[]
     */
    private array $fileProperties = [];

    /**
     * @return ExtensionType[]
     */
    public function getFileProperties() : array
    {
        return $this->fileProperties;
    }

    /**
     * Return bool true if fileProperties is not empty
     *
     * @return bool
     */
    public function isFilePropertiesSet() : bool
    {
        return ! empty( $this->fileProperties );
    }

    /**
     * @param ExtensionType $fileProperties
     * @return static
     */
    public function addFileProperties( ExtensionType $fileProperties ) : static
    {
        $this->fileProperties[] = $fileProperties;
        return $this;
    }

    /**
     * @param null|ExtensionType[] $fileProperties
     * @return static
     */
    public function setFileProperties( ? array $fileProperties = [] ) : static
    {
        $this->fileProperties = [];
        foreach( $fileProperties as $extensionType ) {
            $this->addFileProperties( $extensionType );
        }
        return $this;
    }
}
