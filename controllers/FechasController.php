<?php

namespace app\controllers;

use app\models\Fechas;
use app\models\FechasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Menus;
use yii\helpers\ArrayHelper;

/**
 * FechasController implements the CRUD actions for Fechas model.
 */
class FechasController extends Controller
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
     * Lists all Fechas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchFechas = new FechasSearch();
        $dataProvider = $searchFechas->search($this->request->queryParams);

        return $this->render('index', [
            'searchFechas' => $searchFechas,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fechas model.
     * @param int $fecha_id Fecha ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($fecha_id)
    {
        return $this->render('view', [
            'fechas' => $this->findModel($fecha_id),
        ]);
    }

    /**
     * Creates a new Fechas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $menus = new Menus();
        $searchFechasAll = Fechas::find()->all();
        $semanas = ArrayHelper::map($searchFechasAll, 'semanas', 'semanas');

        $fechas = new Fechas();
        if ($this->request->isPost) {
            $fechas->load($this->request->post());
            $menus->load($this->request->post());
            if ($fechas->validate() && $menus->validate()) {
                if ($fechas->save()) {
                    $menus->fecha_id = $fechas->fecha_id;
                    if ($menus->save()) {
                        return $this->redirect(['../menus']);
                    }
                }
            }
        } else {
            $fechas->loadDefaultValues();
        }

        return $this->render('create', [
            'fechas' => $fechas,
            'semanas' => $semanas,
        ]);
        
        /* 
        $fechas = new Fechas();

        if ($this->request->isPost) {
            if ($fechas->load($this->request->post()) && $fechas->save()) {
                return $this->redirect(['view', 'fecha_id' => $fechas->fecha_id]);
            }
        } else {
            $fechas->loadDefaultValues();
        }

        return $this->render('create', [
            'fechas' => $fechas,
        ]); */
    }

    /**
     * Updates an existing Fechas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $fecha_id Fecha ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($fecha_id)
    {
        $fechas = $this->findModel($fecha_id);

        if ($this->request->isPost && $fechas->load($this->request->post()) && $fechas->save()) {
            return $this->redirect(['view', 'fecha_id' => $fechas->fecha_id]);
        }

        return $this->render('update', [
            'fechas' => $fechas,
        ]);
    }

    /**
     * Deletes an existing Fechas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $fecha_id Fecha ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($fecha_id)
    {
        $this->findModel($fecha_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Fechas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $fecha_id Fecha ID
     * @return Fechas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($fecha_id)
    {
        if (($fechas = Fechas::findOne(['fecha_id' => $fecha_id])) !== null) {
            return $fechas;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
