<?php 

<?php

   /*
    *        Adaline
    *------------------------- */
    
    /* PHP-ML - Machine Learning library for PHP */
    
    class Adaline {

    protected $weights; // Entradas 
    protected $learning_rate = 0.02; // Taxa de Aprendisado Linear
    protected $learning_rate2 = 0.1; // Taxa de Aprendisado Não Linear
    protected $result = 0; // resulte
    protected $erro; // erro
    protected $populacao;
    protected $fitness;
    protected $interacoes;
    protected $pBest;
    protected $gBest
    
    $input2; // Incluindo bias aos dados
    $output;
    
    
    public function __construct($input,$output, $epooc){
        
        $this->interacoes = $epooc;
        $this->output = $output
        
        for ($i = 0; $i < count($input); $i++) {
             for ($j = 0; $j < count($input[0]) + 1; $j++) {
                  if($j == 0){
                       $this->input2[$i][$j] = 1;
                  }else{
                        $this->input2[$i][$j] = $input[$i][$j-1];
                  }
             }
         }
    }

    public function population ($size,$pop_size){
        
        for ($i = 0; $i < $pop_size; $i++) {
             for($j = 0; $j < $size; $j++){
                $this->populacao[$i][$j] = (float)rand()/(float)getrandmax();
            
           // print_r($this->weights[$i]);
        }
        }
    }
    
    public function train (){
        
        for ($n = 0; $n < $this->interacoes; $n++) {
                 
            for ($i = 0; $i < count($this->input2); $i++) {
                     
                for ($k = 0; $k < count; $k++) {
                 
                    for ($j = 0; $j < count($this->input2[0]); $j++) {
                      
                            $sum += $this->population[$k][$j] * $this->input2[$i][$j]; // somatorio peso * bias * entradas
                    }
        /*--Set variaves de manipulação--*/
                    $sum = 0;
                    $delta = 0;
                }
            }
        }
    }

  public function fitness ($value){
        $delta = ($output[$i] - $sum); // Calculo do erro 
        $this->fitness[$k] = pow($delta,2);
    }
    
    public function population_ajust ($value){
        for ($i = 0; $i < count($this->population); $i++) {
            for ($j = 0; $j < count($this->population[0]); $j++) {
                $this->population[$i][$j] = $this->population[$i][$j] * 
                                           2 * ((float)rand()/(float)getrandmax()) * ($this->pBest - $value) + 
                                           2 * ((float)rand()/(float)getrandmax()) * ($this->gBest - $value)  
            }
        }
    }

?>