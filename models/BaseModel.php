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
     * @return array
     */
    public static function getAll()
    {
        $list = [];
        $db = \Database::getInstance();
        $stmt = $db->query(sprintf('SELECT * FROM %s', self::getTableName()));
        
        foreach($stmt->fetchAll() as $row)
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

        $result = $stmt->fetch();

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
        
        foreach ($stmt->fetchAll() as $row)
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
        $table = $this->getTableName();
        $qry = "$action $table SET ";
        $params = [];
        $fields = [];

        foreach ($this->fields as $field)
        {
            $fields[] = "$field = ?";
            $params[] = (empty($this->{$field})) ? NULL : $this->{$field};
        }
        
        $qry .= implode(', ', $fields);
        
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
