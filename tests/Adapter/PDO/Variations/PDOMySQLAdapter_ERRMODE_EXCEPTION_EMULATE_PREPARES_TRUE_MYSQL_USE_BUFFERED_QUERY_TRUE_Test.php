<?php

declare(strict_types=1);

namespace Brick\Db\Tests\Adapter\PDO\Variations;

/**
 * Tests for \Brick\Db\Tests\Adapter\PDO\PDOMySQLAdapterTest with specific PDO attributes.
 * This class is autogenerated, do not edit.
 */
class PDOMySQLAdapter_ERRMODE_EXCEPTION_EMULATE_PREPARES_TRUE_MYSQL_USE_BUFFERED_QUERY_TRUE_Test extends \Brick\Db\Tests\Adapter\PDO\PDOMySQLAdapterTest
{
    /**
     * @inheritdoc
     */
    protected static function getAttributes() : array
    {
        return [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_EMULATE_PREPARES => true,
            \PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
        ];
    }
}
