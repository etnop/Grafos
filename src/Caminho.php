<?php

namespace src;
use src\Grafo;
use \SplQueue;

class Caminho {
    
    private $visitado;
    private $arestaPara;
    private $inicio;
    
    public function __construct(Grafo $g, $s) {
        $this->inicio = $s;
        $this->bfs($g, $s);
    }
    
    public function dfs(Grafo $g, $v){
        $this->visitado[$v] = true;
        foreach ($g->getAdj($v) as $vertice)
            if( !$this->foiVisitado($vertice) ){
                $this->arestaPara[$vertice] = $v;
                $this->dfs ($g, $vertice); 
            }
    }
    
    public function bfs(Grafo $g, $inicio){
        $queue = new SplQueue();
        $this->visitado[$inicio] = TRUE;
        $queue->enqueue($inicio);
        
        while( !$queue->isEmpty() ){
            $v = $queue->dequeue();
            foreach ($g->getAdj($v) as $vertice) {
                if( !$this->visitado[$vertice] ){
                    $this->arestaPara[$vertice] = $v;
                    $this->visitado[$vertice] = TRUE;
                    $queue->enqueue($vertice);
                }
            }
        }
    }
    
    public function haCaminhoPara( $v ){
        return $this->foiVisitado($v);
        
    }
    
    public function caminhoPara( $v ){
        if( !$this->haCaminhoPara($v)) return NULL;
        for($x=$v; $x!=$this->inicio; $x=$this->arestaPara[$x], $i++)
            $caminho[] = $x;
        $caminho[] = $this->inicio;
        return $caminho;
    }
    
    public function foiVisitado($vertice){
        return $this->visitado[$vertice];
    }
    
    public function getCount(){
        return $this->count;
    }
    
}

?>
