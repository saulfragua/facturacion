<?php

class Database
{
    private string $host = DB_HOST;
    private string $dbname = DB_NAME;
    private string $user = DB_USER;
    private string $pass = DB_PASS;

    private PDO $dbh;
    private PDOStatement $stmt;

    public function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";

        $options = [
            PDO::ATTR_PERSISTENT         => false,
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {

            $this->dbh = new PDO(
                $dsn,
                $this->user,
                $this->pass,
                $options
            );

        } catch (PDOException $e) {

            die('Error de conexión: ' . $e->getMessage());

        }
    }

    /*
    |--------------------------------------------------------------------------
    | Preparar Query
    |--------------------------------------------------------------------------
    */

    public function query(string $sql): void
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    /*
    |--------------------------------------------------------------------------
    | Bind Parámetros
    |--------------------------------------------------------------------------
    */

    public function bind(string $param, $value, $type = null): void
    {
        if (is_null($type)) {

            switch (true) {

                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;

                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;

                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;

                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    /*
    |--------------------------------------------------------------------------
    | Ejecutar Query
    |--------------------------------------------------------------------------
    */

    public function execute(): bool
    {
        return $this->stmt->execute();
    }

    /*
    |--------------------------------------------------------------------------
    | Obtener Todos los Registros
    |--------------------------------------------------------------------------
    */

    public function resultSet(): array
    {
        $this->execute();

        return $this->stmt->fetchAll();
    }

    /*
    |--------------------------------------------------------------------------
    | Obtener Un Registro
    |--------------------------------------------------------------------------
    */

    public function single()
    {
        $this->execute();

        return $this->stmt->fetch();
    }

    /*
    |--------------------------------------------------------------------------
    | Contar Filas
    |--------------------------------------------------------------------------
    */

    public function rowCount(): int
    {
        return $this->stmt->rowCount();
    }

    /*
    |--------------------------------------------------------------------------
    | Último ID Insertado
    |--------------------------------------------------------------------------
    */

    public function lastInsertId(): string|false
    {
        return $this->dbh->lastInsertId();
    }

    /*
    |--------------------------------------------------------------------------
    | Iniciar Transacción
    |--------------------------------------------------------------------------
    */

    public function beginTransaction(): bool
    {
        return $this->dbh->beginTransaction();
    }

    /*
    |--------------------------------------------------------------------------
    | Confirmar Transacción
    |--------------------------------------------------------------------------
    */

    public function commit(): bool
    {
        return $this->dbh->commit();
    }

    /*
    |--------------------------------------------------------------------------
    | Revertir Transacción
    |--------------------------------------------------------------------------
    */

    public function rollBack(): bool
    {
        return $this->dbh->rollBack();
    }
}