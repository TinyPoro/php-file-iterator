<?php
/**
 * Created by PhpStorm.
 * User: tinyporo
 * Date: 14/04/2018
 * Time: 09:31
 */

namespace SebastianBergmann\FileIterator\Test;

use PHPUnit\Framework\TestCase;
use SebastianBergmann\FileIterator\Iterator;

final class IteratorTest extends TestCase
{
    public function testIteratorSuccess(){
        $iterator = new Iterator(
            new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator('/etc/acpi/events', \RecursiveDirectoryIterator::FOLLOW_SYMLINKS)
            )
        );

        $this->assertInstanceOf(\RecursiveIteratorIterator::class, $iterator->getInnerIterator());
        $this->assertSame(true, $iterator->accept());

    }
}