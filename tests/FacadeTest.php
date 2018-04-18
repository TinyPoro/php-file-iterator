<?php
/**
 * Created by PhpStorm.
 * User: tinyporo
 * Date: 14/04/2018
 * Time: 09:31
 */

namespace SebastianBergmann\FileIterator\Test;

use PHPUnit\Framework\TestCase;
use SebastianBergmann\FileIterator\Facade;

final class FacadeTest extends TestCase
{
    public function testFacadeSuccess(){
        $facade = new Facade();

        $this->assertSame(true, in_array("/etc/acpi/events/tosh-wireless", $facade->getFilesAsArray("/etc/acpi/events")));
        $this->assertSame(false, in_array("/etc/acpi/events/tosh-wireless", $facade->getFilesAsArray("/etc/acpi/events",'undock', '')));
        $this->assertSame(false, in_array("/etc/acpi/events/tosh-wireless", $facade->getFilesAsArray("/etc/acpi/events",'', 'think')));
//        $facade->getFilesAsArray("/etc/acpi/events",'', '', [], true);
    }

    public function testFacadeEmpty(){
        $facade = new Facade();

        $this->assertSame([], $facade->getFilesAsArray("/etc/acpi/events/t"));
    }

    public function testFacadeException(){
        $this->expectException(\TypeError::class);

        $facade = new Facade();

        $facade->getFilesAsArray(1);
    }
}