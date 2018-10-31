<?php

declare(strict_types=1);

namespace Brick\Db\Tests\Adapter\PDO\Variations;

/**
 * Tests for \Brick\Db\Tests\Adapter\PDO\PDOSQLiteAdapterTest with specific PDO attributes.
 * This class is autogenerated, do not edit.
 */
class PDOSQLiteAdapter_ERRMODE_EXCEPTION_EMULATE_PREPARES_FALSE_Test extends \Brick\Db\Tests\Adapter\PDO\PDOSQLiteAdapterTest
{
    /**
     * @inheritdoc
     */
    protected static function getAttributes() : array
    {
        return [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ];
    }
}
