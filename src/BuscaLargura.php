<?php

namespace src;
use src\Grafo;
use \SplQueue;

class BuscaLargura {
    
    private $visitado;
    private $arestaPara;
    private $inicio;
    
    public function __construct(Grafo $g, $inicio) {
        $this->inicio = $inicio;
        $this->bfs($g, $inicio);
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
    
}

?>
