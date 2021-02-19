<?php

namespace Source\CRUD\Models;
use Source\Database\Connect;

/**
 *  @packege Source\Models
 */

 abstract class Model
 {

    /**
     * @var object | null
     */
    protected $data;
    
    /**
     * @var \PDOException | null
     */
    protected $fail;

    /**
     * @var string|null
     */
    protected $message;

     /**
      * @return object|null
      */
    public function data(){
        return $this->data;
    }    
    
    /**
     * @return \PDOException
     */

    public function fail()
    {
        return $this->fail;
    }

     /**
      * @return string|null
      */

    public function message()
    {
        return $this->message;
    }

     /**
      * @param $name
      * @param $value
      */
    public function __set($name, $value)
    {
        if(empty($this->data)){
            $this->data =new \stdClass();
        }
        $this->data->$name = $value;
    }

      /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data->$name);
    }

    /**
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        return ($this->data->$name ?? null);
    }

     /**
      * @param string $entity
      * @param array $data
      * @return string
      */
    protected function create(string $entity, array $data)
    {
        try{
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data)) ;
           /* echo "INSERT INTO {$entity} {$columns}  VALUES ({$values})";
            */
            $stmt = Connect::getInstance()->prepare("INSERT INTO {$entity} ({$columns})  VALUES ({$values})");
            var_dump($data, $this->filter($data));
            //exit;

            $stmt->execute($this->filter($data));
            return Connect::getInstance()->lastInsertId();
        }catch (\PDOException $exception){
            $this->fail = $exception;
        }
        var_dump($entity, $data);

    }

     /**
      * @param string $select
      * @param string|null $params
      * @return bool|\PDOStatement|null
      */
     protected function read(string $select, string $params = null)
     {
         try{
             $stmt = Connect::getInstance()->prepare($select);
             if($params){
                 //var_dump($params, $select);
                 parse_str($params, $params);
                 foreach($params as $key => $value){
                    //var_dump($params);
                     $type = (is_numeric($value) ? \PDO::PARAM_INT :\PDO::PARAM_STR) ;
                     $stmt->bindValue(":{$key}", $value, $type);
                 }
             }
             $stmt->execute();
             return $stmt;

         }catch(\PDOException  $exception){
             $this->fail = $exception;
             return null;
         }
     }


     protected function update(string $entity, array $data, string $terms, string $params): ?int
     {
         try {
             $dateSet = [];
             foreach ($data as $bind => $value) {
                 $dateSet[] = "{$bind} = :{$bind}";

             }
             $dateSet = implode(", ", $dateSet);
             parse_str($params, $params);
//             var_dump($data, $params );

             $stmt = Connect::getInstance()->prepare("UPDATE {$entity} SET {$dateSet} WHERE {$terms}");
            
             $stmt->execute($this->filter(array_merge($data, $params)));
             return ($stmt->rowCount() ?? 1);
         } catch (\PDOException $exception) {
             $this->fail = $exception;
             return null;
         }
     }
 
     /**
      * @param string $entity
      * @param string $terms
      * @param string $params
      * @return int|null
      */
     protected function delete(string $entity, string $terms, string $params): ?int
     {
         try {
             $stmt = Connect::getInstance()->prepare("DELETE FROM {$entity} WHERE {$terms}");
             parse_str($params, $params);
             $stmt->execute($params);
             return ($stmt->rowCount() ?? 1);
         } catch (\PDOException $exception) {
             $this->fail = $exception;
             return null;
         }
     }

     /**
      * @return array|null
      */
    protected function safe()
    {
        $safe = (array) $this->data;
        foreach (static::$safe as $unset) {
           unset($safe[$unset]);
        }
        return $safe;
    }

     /**
      * @param array $data
      * @return array|null
      */
      private function filter(array $data): ?array
      {
          $filter = [];
          foreach ($data as $key => $value) {
              $filter[$key] = (is_null($value) ? null : filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS));
          }
          return $filter;
      }
  }
