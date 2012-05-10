<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * PHP version 5
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace Tests\Unit\WindowsAzure\Services\Blob\Models;
use WindowsAzure\Services\Blob\Models\GetContainerAclResult;
use WindowsAzure\Services\Blob\Models\ContainerAcl;
use Tests\Framework\TestResources;
use WindowsAzure\Resources;
use WindowsAzure\Core\WindowsAzureUtilities;

/**
 * Unit tests for class GetContainerAclResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class GetContainerAclResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Services\Blob\Models\GetContainerAclResult::create
     */
    public function testCreate()
    {
        // Setup
        $sample = Resources::EMPTY_STRING;
        $expectedEtag = '0x8CAFB82EFF70C46';
        $expectedDate = new \DateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $expectedPublicAccess = 'container';
        
        // Test
        $result = GetContainerAclResult::create($expectedPublicAccess, $expectedEtag, 
            $expectedDate, $sample);
        
        // Assert
        $acl = $result->getContainerAcl();
        $this->assertEquals($expectedEtag, $acl->getEtag());
        $this->assertEquals($expectedDate, $acl->getLastModified());
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertCount(0, $acl->getSignedIdentifiers());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\GetContainerAclResult::getContainerAcl
     */
    public function testGetContainerAcl()
    {
        // Setup
        $expected = new ContainerAcl();
        $expected->setEtag('0x8CAFB82EFF70C46');
        $obj = new GetContainerAclResult();
        
        // Test
        $obj->setContainerAcl($expected);
        
        // Assert
        $this->assertEquals($expected->getEtag(), $obj->getContainerAcl()->getEtag());
        $this->assertCount(0, $obj->getContainerAcl()->getSignedIdentifiers());
        $this->assertNull($obj->getContainerAcl()->getLastModified());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\GetContainerAclResult::setContainerAcl
     */
    public function testSetContainerAcl()
    {
        // Setup
        $expected = new ContainerAcl();
        $expected->setEtag('0x8CAFB82EFF70C46');
        $obj = new GetContainerAclResult();
        $obj->setContainerAcl($expected);
        
        // Test
        $actual = $obj->getContainerAcl();
        
        // Assert
        $this->assertEquals($expected->getEtag(), $actual->getEtag());
        $this->assertCount(0, $actual->getSignedIdentifiers());
        $this->assertNull($actual->getLastModified());
    }
}

?>
