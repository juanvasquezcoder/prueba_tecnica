<?php

namespace app\controllers;

use app\models\Solicitudesplazamercado;
use app\models\SolicitudesplazamercadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SolicitudesplazamercadoController implements the CRUD actions for Solicitudesplazamercado model.
 */
class SolicitudesplazamercadoController extends Controller
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
     * Lists all Solicitudesplazamercado models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SolicitudesplazamercadoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Solicitudesplazamercado model.
     * @param int $solicitud_id Solicitud ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($solicitud_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($solicitud_id),
        ]);
    }

    /**
     * Creates a new Solicitudesplazamercado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Solicitudesplazamercado();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'solicitud_id' => $model->solicitud_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Solicitudesplazamercado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $solicitud_id Solicitud ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($solicitud_id)
    {
        $model = $this->findModel($solicitud_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'solicitud_id' => $model->solicitud_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Solicitudesplazamercado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $solicitud_id Solicitud ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($solicitud_id)
    {
        $this->findModel($solicitud_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Solicitudesplazamercado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $solicitud_id Solicitud ID
     * @return Solicitudesplazamercado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($solicitud_id)
    {
        if (($model = Solicitudesplazamercado::findOne(['solicitud_id' => $solicitud_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
