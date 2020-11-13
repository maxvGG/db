<?php 
require 'User.php';

class createTable {
    public function createTable($results) {
            echo '<table>';
    
            foreach($results as $result){
                echo '<tr>';
    
                foreach($result as $cell){
                    echo '<td>'.$cell;
                }
                echo '</tr>';
            }
            echo '</table>';
        }
}