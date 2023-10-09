<?php

namespace app\controllers;

use app\models\Ingredientes;
use app\models\IngredientesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use Yii;
use app\models\Solicitudesplazamercado;

/**
 * IngredientesController implements the CRUD actions for Ingredientes model.
 */
class IngredientesController extends Controller
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
     * Lists all Ingredientes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new IngredientesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ingredientes model.
     * @param int $ingredientes_id Ingredientes ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ingredientes_id)
    {
        return $this->render('view', [
            'ingredientes' => $this->findModel($ingredientes_id),
        ]);
    }

    /**
     * Creates a new Ingredientes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $plaza = new Solicitudesplazamercado();
        $ingredientes = new Ingredientes();

        $cantidad_disponible_text = Yii::$app->request->post('cantidad_disponible_text');
        $cantidad_disponible_dropdown = Yii::$app->request->post('cantidad_disponible_dropdown');
        $cantidad = $cantidad_disponible_text . ' ' . $cantidad_disponible_dropdown;

        $ingredientes->cantidad_disponible = $cantidad;
        
        if ($this->request->isPost) {
            if ($ingredientes->load($this->request->post()) && $ingredientes->save()) {
                if ($ingredientes->estado === 'agotado') {
                    return $this->redirect(['../solicitudesplazamercado/create']);
                } else {
                    return $this->redirect(['index']);
                }
            }
        } else {
            $ingredientes->loadDefaultValues();
        }

        return $this->render('create', [
            'ingredientes' => $ingredientes,
        ]);
    }

    /**
     * Updates an existing Ingredientes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ingredientes_id Ingredientes ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ingredientes_id)
    {
        $ingredientes = $this->findModel($ingredientes_id);

        $plaza = new Solicitudesplazamercado();

        if ($this->request->isPost) {
            if ($ingredientes->estado === 'agotado') {
                return $this->redirect(['../solicitudesplazamercado/create']);
            } else {
                return $this->redirect(['view', 'ingredientes_id' => $ingredientes->ingredientes_id]);
            }
        }

        return $this->render('update', [
            'ingredientes' => $ingredientes,
        ]);
    }

    /**
     * Deletes an existing Ingredientes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ingredientes_id Ingredientes ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ingredientes_id)
    {
        $this->findModel($ingredientes_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ingredientes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ingredientes_id Ingredientes ID
     * @return Ingredientes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ingredientes_id)
    {
        if (($model = Ingredientes::findOne(['ingredientes_id' => $ingredientes_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
