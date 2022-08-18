<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    //Enter your database connection details here.
 
    class db
    {
        /*
         * This variable holds the value of PDO connection string
         * @return value of PDO connection string 
         */
        protected $pdo; 
        
        function __construct($pdo)
        {
            $this->pdo = $pdo;
        }
        
        /**
         * Insert Data Into Table
         * params $table requierd (Table Name), $fields required (array of table columns), $value  required (array of values to be inserted in columns ** must be in sequence with column name)
         * @ return insert id on success:: error messages on failure.
         **/
        
        public function insertIntoTable($table,$fields,$value)
         {
                if(is_array($fields))
                {
                         if(is_array($value))
                         {
                                $data = array_combine($fields,$value);
                                $sql  = "INSERT INTO ".$table;
                                $sql .= " (`".implode("`, `", array_keys($data))."`)";
                                $sql .= " VALUES ('".implode("', '", $data)."') ";
                                $this->pdo->exec($sql);
                                return $this->pdo->lastInsertId();
                                
                         }
                         else
                         {
                                return 'value should be in array form';   
                         } 
               }
               else
               {
                     return "fields should be in array form" ;
               }
         }
         
         }
    
?>

