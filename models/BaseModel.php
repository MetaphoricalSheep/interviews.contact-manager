<?php

namespace models;

class BaseModel
{
    protected static $table;
    protected static $class;
    protected $fields = [];

    /**
     * Constructor.
     *
     * @param array $row
     */
    public function __construct($row)
    {
        foreach ($row as $field=>$val)
        {
            $this->fields[] = $field;
            $this->{$field} = $val;
        }
    }

    /**
     * Fetches all records from db
     * 
     * @param array $order
     * @return array
     */
    public static function getAll($order = [])
    {
        $list = [];
        $db = \Database::getInstance();
        $qry = sprintf('SELECT * FROM %s', self::getTableName());
        
        if (!empty($order))
        {
            if (!empty($order['field']))
            {
                $field = $order['field'];
                $dir = (empty($order['dir'])) ? 'ASC' : $order['dir'];
                $qry .= " ORDER BY $field $dir";
            }
        }
        
        $stmt = $db->query($qry);
        
        foreach($stmt->fetchAll(\PDO::FETCH_ASSOC) as $row)
        {
            $class = self::getClass();
            $list[$row['id']] = new $class($row);
        }

        return $list;
    }

    /**
     * Fetches a specific record from db
     *
     * @param int $id   The primary key of the record
     * @return BaseModel
     */
    public static function find($id)
    {
        $db = \Database::getInstance();
        $id = intval($id);
        $stmt = $db->prepare(sprintf('SELECT * FROM %s WHERE id=:id LIMIT 1', self::getTableName()));
        $stmt->bindParam('id', $id);
        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        $class = self::getClass();
        return new $class($result);
    }

    /**
     * Fetches all records where field matches value
     *
     * @param string $field    The field you want to query
     * @param int $value       The value of the records you want to retrieve
     * @return array
     */
    public static function getBy($field, $value)
    {
        $list = [];
        $db = \Database::getInstance();
        $stmt = $db->prepare(sprintf('SELECT * FROM %s WHERE %s=:val', self::getTableName(), $field));
        $stmt->bindParam(':val', $value);
        $stmt->execute();
        
        foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $row)
        {
            $class = self::getClass();
            $list[$row['id']] = new $class($row);
        }
        
        return $list;
    }

    public function delete()
    {
        if (!empty($this->id))
        {
            try
            {
                $db   = \Database::getInstance();
                $stmt = $db->prepare(sprintf('DELETE FROM %s WHERE id=:id', self::getTableName()));
                $stmt->bindParam(':id', $this->id);
                $stmt->execute();
            }
            catch (\Exception $e)
            {
                return FALSE;
            }
        }
        
        return TRUE;
    }
    
    public function save()
    {
        $action = (empty($this->id)) ? "INSERT INTO" : "UPDATE";
        $where = (empty($this->id)) ? "" : sprintf("WHERE id = %s", $this->id);
        $table = $this->getTableName();
        $qry = "$action $table SET ";
        $params = [];
        $fields = [];

        foreach ($this->fields as $field)
        {
            if ($field != 'id') 
            {
                $fields[] = "$field = ?";
                $params[] = (empty($this->{$field})) ? NULL : $this->{$field};
            }
        }
        
        $qry .= implode(', ', $fields) . ' ' . $where;
        
        try
        {
            $db   = \Database::getInstance();
            $stmt = $db->prepare($qry);
            $stmt->execute($params);

            $this->id = $db->lastInsertId();
        }
        catch (\Exception $e)
        {
            die($e->getMessage());
        }
        
        return $this;
    }

    /**
     * @param array $clauses
     * @return array
     */
    public static function where($clauses)
    {
        $list = [];
        $db = \Database::getInstance();
        
        $qry = sprintf('SELECT * FROM %s WHERE ', self::getTableName());
        $params = [];
        
        foreach ($clauses as $field=>$data)
        {
            $joiner = empty($data['joiner']) ? 'AND' : $data['joiner'];
            $operator = empty($data['operator']) ? '=' : $data['operator'];
            $value = empty($data['value']) ? NULL : $data['value'];
            
            if (sizeof($params) == 0)
            {
                $qry .= sprintf(" %s %s ?", $field, $operator);
            }
            else
            {
                $qry .= sprintf(" %s %s %s ?", $joiner, $field, $operator);
            }
            
            $params[] = $value;
        }
        
        $stmt = $db->prepare($qry);
        $stmt->execute($params);

        foreach($stmt->fetchAll(\PDO::FETCH_ASSOC) as $row)
        {
            $class = self::getClass();
            $list[$row['id']] = new $class($row);
        }

        return $list;
    }

    private static function getTableName()
    {
        if (empty(self::$table))
        {
            $class = explode('\\', get_called_class());
            $class = array_pop($class);
            self::$table = stripslashes(strtolower(str_replace('Model', '', $class)));
        }
        
        return self::$table;
    }
    
    private static function getClass()
    {
        if (empty(self::$class))
        {
            self::$class = get_called_class();
        }
        
        return self::$class;
    }
}
