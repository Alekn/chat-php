<?php

class QueryBuilder {

    protected $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getPDO() {
        return $this->pdo;
    }

    public function selectAll(string $table, string $intoClass = 'stdClass') {
        $estado = $this->pdo->prepare("select * from {$table}");

        $estado->execute();
        
        return $estado->fetchAll(PDO::FETCH_CLASS, $intoClass); 
    }

    public function insert($table, $parameters) {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        
        try {
            $estado = $this->pdo->prepare($sql);
            
            $estado->execute($parameters);
        } catch(Exception $e) {
            die("Algo salió mal.");
        }
    }
    
    public function start($table, $parameters, $all='*', $equal='') {
        $sql = sprintf(
            'select %s from %s where %s %s= %s',
            $all,
            $table,
            implode(', ', array_keys($parameters)),
            $equal,
            ':' . implode(', :', array_keys($parameters))
        );
        
        try {
            $estado = $this->pdo->prepare($sql);

            $estado->execute($parameters);

            return $estado;
        } catch(Exception $e) {
            die("Algo salió mal.");
        }
    }

    public function selectJoin($parentTable, $childTable, $join) {
        $sql = sprintf(
            'select * from %s inner join %s on %s',
            $parentTable,
            $childTable,
            implode(' = ', $join)
        );

        try {
            $estado = $this->pdo->prepare($sql);

            $estado->execute();

            return $estado->fetchAll(PDO::FETCH_CLASS);
        } catch(Exception $e) {
            die("Algo salió mal.");
        }
    }

    public function update($table, $append, $parameters) {
        $sql = sprintf(
            'update %s set %s = %s where %s = %s',
            $table,
            implode(', ', array_keys($append)),
            ':' . implode(', :', array_keys($append)),
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        
        try {
            $estado = $this->pdo->prepare($sql);

            $estado->execute(array_merge($append, $parameters));

            return $estado;
        } catch(Exception $e) {
            die("Algo salió mal en el update.");
        }
    }

    public function updateSQL($sql) {
        try {
            $estado = $this->pdo->prepare($sql);

            $estado->execute();

            return $estado;
        } catch(Exception $e) {
            die("Algo salió mal en el update SQL.");
        }
    }

}