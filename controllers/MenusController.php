<?php

namespace app\controllers;

use app\models\Menus;
use app\models\MenusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Recetas;
use yii\helpers\ArrayHelper;

/**
 * MenusController implements the CRUD actions for Menus model.
 */
class MenusController extends Controller
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
     * Lists all Menus models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchMenus = new MenusSearch();
        $dataProvider = $searchMenus->search($this->request->queryParams);

        $nulo = Menus::find()->where(['receta_id' => null])->one();

        if ($nulo) {
            return $this->redirect(['update', 'menu_id' => $nulo->menu_id]); // Redirige a la otra página
        }

        return $this->render('index', [
            'searchMenus' => $searchMenus,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Menus model.
     * @param int $menu_id Menu ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($menu_id)
    {
        $fechas = Menus::find()->where(['menu_id' => $menu_id])->one();

        return $this->render('view', [
            'menus' => $this->findModel($menu_id),
            'fechas' => $fechas,
        ]);
    }

    /**
     * Creates a new Menus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $menus = new Menus();
        $modeloRecetasAll = Recetas::find()->all();
        $listaNombresRecetas = ArrayHelper::map($modeloRecetasAll, 'receta_id', 'nombre');

        if ($this->request->isPost) {
            if ($menus->load($this->request->post()) && $menus->save()) {
                return $this->redirect(['view', 'menu_id' => $menus->menu_id]);
            }
        } else {
            $menus->loadDefaultValues();
        }

        return $this->render('create', [
            'menus' => $menus,
            'listaNombresRecetas' => $listaNombresRecetas,
        ]);
    }

    /**
     * Updates an existing Menus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $menu_id Menu ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($menu_id)
    {
        $menus = $this->findModel($menu_id);

        $fechas = Menus::find()->where(['menu_id' => $menu_id])->one();
        $modeloRecetasAll = Recetas::find()->all();
        $listaNombresRecetas = ArrayHelper::map($modeloRecetasAll, 'receta_id', 'nombre');

        if ($this->request->isPost && $menus->load($this->request->post()) && $menus->save()) {
            return $this->redirect(['view', 'menu_id' => $menus->menu_id]);
        }

        return $this->render('update', [
            'menus' => $menus,
            'fechas' => $fechas,
            'listaNombresRecetas' => $listaNombresRecetas,
        ]);
    }

    /**
     * Deletes an existing Menus model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $menu_id Menu ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($menu_id)
    {
        $this->findModel($menu_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Menus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $menu_id Menu ID
     * @return Menus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($menu_id)
    {
        if (($menus = Menus::findOne(['menu_id' => $menu_id])) !== null) {
            return $menus;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
