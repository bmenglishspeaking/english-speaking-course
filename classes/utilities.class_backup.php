<?php
//Define All functions in this class

class Utilities {
	function __construct($pdo)
        {
            $this->pdo = $pdo;
        }
        
        function getColumnNameOfTable($tablename){ 
             $query = $this->pdo->prepare("SELECT `COLUMN_NAME` FROM `information_schema`.`COLUMNS` WHERE (`TABLE_SCHEMA` = 'sanjeevdubey' AND `TABLE_NAME` = '".$tablename."')AND (`COLUMN_KEY` != 'PRI');");
             $query->execute();
             $result =  $query->fetchAll();
             $count = count($result);
             if($count>0){
                  return $result;
                }
                else{
                    return false;
                }
        }
	
        function getTableColumnAsArray($columnarray){
           if(is_array($columnarray)){
               $count = count($columnarray);
               if($count>0){
                   $column = array();
                   for($i=0;$i<$count;$i++){
                       $column[$i] = $columnarray[$i]['COLUMN_NAME'];
                   }
                   return $column;
               }
               else{
                   return false;
               }
           }
           else{
               return false;
           }
       }
       
       /* This function returns data based on where condition  
         * @Params $table required- table name from which data are to be taken
         * $where - conditions on which data needs to be queried.
         **/
        function getValuesFromTable($table, $where){ 
         //echo "SELECT * FROM $table  WHERE $where"; 
            $query = $this->pdo->prepare("SELECT * FROM $table  WHERE $where");
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            $count = count($result);
            if($count>0){
			  return $result;
			}
			else{
			  return array();
			}
            
        }
        
        
        /* Get array of pagination for all pages
         * params $userId requierd 
         * @ return array on success
         **/
                
	function pagination($total,$per_page=10,$page=1,$url='?',$search_cond=null)
	{   
		    			
			$adjacents = "2"; 
			if($search_cond!='')
			{
			  $url=$url.$search_cond.'&';
			}
			$prevlabel = "&lsaquo; Prev";
			$nextlabel = "Next &rsaquo;";
			$lastlabel = "Last &rsaquo;&rsaquo;";
			 
			$page = ($page == 0 ? 1 : $page);  
			$start = ($page - 1) * $per_page;                               
			 
			$prev = $page - 1;                          
			$next = $page + 1;
			 
			$lastpage = ceil($total/$per_page); 
			 
			$lpm1 = $lastpage - 1; // //last page minus 1
			 
			$pagination = ""; 
			if($lastpage > 1){  
				$pagination .= "<ul class='pagination'>";
				$pagination .= "<li class='page_info'>Page {$page} of {$lastpage}</li>";
					 
					if ($page > 1) $pagination.= "<li><a href='{$url}page={$prev}'>{$prevlabel}</a></li>";
					 
				if ($lastpage < 7 + ($adjacents * 2)){   
					for ($counter = 1; $counter <= $lastpage; $counter++){
						if ($counter == $page)
							$pagination.= "<li><a class='current'>{$counter}</a></li>";
						else
							$pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
					}
				 
				} elseif($lastpage > 5 + ($adjacents * 2)){
					 
					if($page < 1 + ($adjacents * 2)) {
						 
						for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
							if ($counter == $page)
								$pagination.= "<li><a class='current'>{$counter}</a></li>";
							else
								$pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
						}
						$pagination.= "<li class='dot'>...</li>";
						$pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
						$pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";  
							 
					} elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
						 
						$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
						$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
						$pagination.= "<li class='dot'>...</li>";
						for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
							if ($counter == $page)
								$pagination.= "<li><a class='current'>{$counter}</a></li>";
							else
								$pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
						}
						$pagination.= "<li class='dot'>..</li>";
						$pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
						$pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";      
						 
					} else {
						 
						$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
						$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
						$pagination.= "<li class='dot'>..</li>";
						for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
							if ($counter == $page)
								$pagination.= "<li><a class='current'>{$counter}</a></li>";
							else
								$pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
						}
					}
				}
				 
					if ($page < $counter - 1) {
						$pagination.= "<li><a href='{$url}page={$next}'>{$nextlabel}</a></li>";
						$pagination.= "<li><a href='{$url}page=$lastpage'>{$lastlabel}</a></li>";
					}
				 
				$pagination.= "</ul>";        
			}
			
			return $pagination;
		}
        
}

?>