<?php

namespace src;


/**
 * Description of Grafo
 *
 * @author evaldo
 */
class Grafo {
    
    protected $vertices;
    protected $arestas;
    protected $listaAdj;
    protected $matrizAdj;
    protected $listaVertices;

    public function __construct($qdeVertices = 30){
        
        $this->vertices = $qdeVertices;
        $this->arestas = 0;
        
        for($i=0; $i<$this->vertices; $i++)
            for($j=0; $j<$this->vertices; $j++)
                $this->matrizAdj[$i][$j] = 0;
        
    }
    
    public function getQdeVertices(){
        return $this->vertices;
    }
    
    public function getQdeArestas(){
        return $this->arestas;
    }
    
    public function adicionaAresta($vertice1, $vertice2, $peso=1){
        
        $this->listaAdj[$vertice1][] = $vertice2;
        $this->listaAdj[$vertice2][] = $vertice1;
        
        $this->matrizAdj[$vertice1][$vertice2] = $peso;
        $this->matrizAdj[$vertice2][$vertice1] = $peso;
    }
    
    public function getAdj($vertice=NULL){
        return $this->listaAdj[$vertice];
    }
    
    public function imprimeMatrizAdjacencia(){
        echo "\t";
        for($i=0; $i<$this->getQdeVertices(); $i++)
            echo "{$i}\t";
        echo "\n";
        for($i=0; $i<$this->getQdeVertices(); $i++){
            echo "{$i}\t";
            for($j=0; $j<$this->getQdeVertices(); $j++)
                echo "{$this->matrizAdj[$i][$j]}\t";
            echo "\n";
        }    
        
    }
    
    public function imprimeListaAdjacencia(){
        for($i=0; $i<$this->getQdeVertices(); $i++){
            echo "{$i}: ";
            foreach ($this->listaAdj[$i] as $elemento)
                echo "{$elemento} ";
            echo "\n";
        }
    }
    
    
}

?>
