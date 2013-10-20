<?php

namespace src;

use src\Grafo;

/**
 * Description of BuscaProfundidade
 *
 * @author evaldo
 */
class BuscaProfundidade {
    
    private $visitado;
    private $count;
    
    public function __construct(Grafo $g, $s) {
        $this->dfs($g, $s);
    }
    
    public function dfs(Grafo $g, $v){
        $this->visitado[$v] = true;
        $this->count++;
        foreach ($g->getAdj($v) as $vertice)
            if( !$this->foiVisitado($vertice) )
                $this->dfs ($g, $vertice); 
        
    }
    
    public function imprimeDfs(Grafo $g, $v){
        $this->visitado[$v] = true;
        $this->count++;
        echo "dfs({$v})\n";
        foreach ($g->getAdj($v) as $vertice){
            if( !$this->foiVisitado($vertice) ){
                $this->dfs ($g, $vertice);
                echo "{$vertice} ";
            } else
                echo "{$v} - visitado";
            echo "\n";
        }    
    }
    
    public function foiVisitado($vertice){
        return $this->visitado[$vertice];
    }
    
    public function getCount(){
        return $this->count;
    }
    
}


