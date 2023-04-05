<?php


namespace app\controllers;
use Yii;
use yii\data\SqlDataProvider;




class RelatoriosController extends \yii\web\Controller
{



    public function actionRelatorio6()
    {
        $consulta = new SqlDataProvider([
         'sql' => 'SELECT paciente.nome as nomes
         FROM paciente
         GROUP BY paciente.nome
          DESC',
             ]
         );
         
         return $this->render('relatorio6', ['resultado' => $consulta]);
    }

    public function actionRelatorio5()
    {
        $consulta = new SqlDataProvider([
         'sql' => 'SELECT profissional.nome as nomes
         FROM profissional
         GROUP BY profissional.nome
          DESC',
             ]
         );
         
         return $this->render('relatorio5', ['resultado' => $consulta]);
    } 

    public function actionRelatorio4()
    {
        $consulta = new SqlDataProvider([
         'sql' => 'SELECT p.nome as nomes
         FROM paciente p join internacao i on p.id = i.paciente_id
         GROUP BY p.nome
          DESC',
             ]
         );
         
         return $this->render('relatorio4', ['resultado' => $consulta]);
    } 

    public function actionRelatorio3()
    {
        $consulta = new SqlDataProvider([
         'sql' => 'SELECT p.nome, count(p.nome) as quantidade
         FROM paciente p join internacao i on p.id = i.paciente_id
         GROUP BY p.nome
          DESC',
             ]
         );
         
         return $this->render('relatorio3', ['resultado' => $consulta]);
    }

    public function actionRelatorio2()
   {
       $consulta = new SqlDataProvider([
        'sql' => 'SELECT p.nome, count(p.nome) as quantidade
        FROM paciente p join triagem t on p.id = t.paciente_id
        GROUP BY p.nome
         DESC',
            ]
        );
        
        return $this->render('relatorio2', ['resultado' => $consulta]);
   }


    public function actionRelatorio1()
   {
       $consulta = new SqlDataProvider([
        'sql' => 'SELECT m.nome, count(m.nome) as quantidade
        FROM profissional m join procedimento p on m.id = p.profissional_id 
        GROUP BY m.nome
         DESC',
            ]
        );
        
        return $this->render('relatorio1', ['resultado' => $consulta]);
   }


   public function actionIndex()
   {
       return $this->render('index');
   }


}
