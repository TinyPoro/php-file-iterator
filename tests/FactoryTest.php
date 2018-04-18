<?php
/**
 * Created by PhpStorm.
 * User: tinyporo
 * Date: 14/04/2018
 * Time: 09:31
 */

namespace SebastianBergmann\FileIterator\Test;

use PHPUnit\Framework\TestCase;
use SebastianBergmann\FileIterator\Factory;
use SebastianBergmann\FileIterator\Iterator;

final class FactoryTest extends TestCase
{
    public function testFactorySuccess(){
        $factory = new Factory();

        $this->assertInstanceOf(Iterator::class, $factory->getFileIterator("/etc/acpi/events")->getInnerIterator());
        $this->assertNull($factory->getFileIterator("/etc/acpi/events", 'doc')->getInnerIterator());
    }
}