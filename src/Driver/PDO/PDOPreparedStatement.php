<?php

declare(strict_types=1);

namespace Brick\Db\Driver\PDO;

use Brick\Db\Driver\DriverException;
use Brick\Db\Driver\PreparedStatement;

class PDOPreparedStatement extends PDOStatement implements PreparedStatement
{
    /**
     * @inheritdoc
     */
    public function execute(array $parameters = []) : void
    {
        foreach ($parameters as $key => $parameter) {
            if ($parameter === null) {
                $type = \PDO::PARAM_NULL;
            } elseif (is_string($parameter)) {
                $type = \PDO::PARAM_STR;
            } elseif (is_int($parameter)) {
                $type = \PDO::PARAM_INT;
            } elseif (is_float($parameter)) {
                $type = \PDO::PARAM_STR;
                $parameter = (string) $parameter;
            } elseif (is_bool($parameter)) {
                $type = \PDO::PARAM_BOOL;
            } elseif (is_resource($parameter)) {
                $type = \PDO::PARAM_LOB;
            } else {
                throw new DriverException('Unsupported parameter type: ' . gettype($parameter));
            }

            if (is_int($key)) {
                $key++;
            }

            try {
                $result = $this->pdoStatement->bindValue($key, $parameter, $type);
            } catch (\PDOException $e) {
                throw PDOConnection::exceptionFromPDOException($e, $this->sqlStatement, $parameters);
            }

            if ($result === false) {
                throw PDOConnection::exceptionFromPDOStatement($this->pdoStatement, $this->sqlStatement, $parameters);
            }
        }

        try {
            $result = @ $this->pdoStatement->execute();
        } catch (\PDOException $e) {
            throw PDOConnection::exceptionFromPDOException($e, $this->sqlStatement, $parameters);
        }

        if ($result === false) {
            throw PDOConnection::exceptionFromPDOStatement($this->pdoStatement, $this->sqlStatement, $parameters);
        }
    }
}