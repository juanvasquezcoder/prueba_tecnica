<?php

namespace app\controllers;

use app\models\Recetas;
use app\models\RecetasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Ingredientes;
use yii\helpers\ArrayHelper;

/**
 * RecetasController implements the CRUD actions for Recetas model.
 */
class RecetasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Recetas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RecetasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Recetas model.
     * @param int $receta_id Receta ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($receta_id)
    {
        return $this->render('view', [
            'recetas' => $this->findModel($receta_id),
        ]);
    }

    /**
     * Creates a new Recetas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $recetas = new Recetas();

        $searchIngredientesAll = Ingredientes::find()->all();
        $listaNombresIngredientes = ArrayHelper::map($searchIngredientesAll, 'nombre', 'nombre');

        if ($recetas->load($this->request->post())) {
            $recetas->descripcion = implode("\n", $this->request->post('Recetas')['descripcion']);
            if ($recetas->save()) {
                return $this->redirect(['view', 'receta_id' => $recetas->receta_id]);
            }
        } else {
            $recetas->loadDefaultValues();
        }

        return $this->render('create', [
            'recetas' => $recetas,
            'listaNombresIngredientes' => $listaNombresIngredientes,
        ]);
    }

    /**
     * Updates an existing Recetas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $receta_id Receta ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($receta_id)
    {
        $recetas = $this->findModel($receta_id);

        $searchIngredientesAll = Ingredientes::find()->all();
        $listaNombresIngredientes = ArrayHelper::map($searchIngredientesAll, 'nombre', 'nombre');
        
        if ($this->request->isPost && $recetas->load($this->request->post())) {
            $recetas->descripcion = implode("\n", $this->request->post('Recetas')['descripcion']);
            if ($recetas->save()) {
                return $this->redirect(['view', 'receta_id' => $recetas->receta_id]);
            }
        } else {
            $recetas->loadDefaultValues();
        }

        return $this->render('update', [
            'recetas' => $recetas,
            'listaNombresIngredientes' => $listaNombresIngredientes,
        ]);
    }

    /**
     * Deletes an existing Recetas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $receta_id Receta ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($receta_id)
    {
        $this->findModel($receta_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Recetas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $receta_id Receta ID
     * @return Recetas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($receta_id)
    {
        if (($recetas = Recetas::findOne(['receta_id' => $receta_id])) !== null) {
            return $recetas;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
