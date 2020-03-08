<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Transaksi;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Pelanggan;
use yii\helpers\ArrayHelper;

/**
 * TransaksiController implements the CRUD actions for Transaksi model.
 */
class TransaksiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Transaksi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $Pelanggan = Pelanggan::find()->all();
        $Pelanggan = ArrayHelper::map($Pelanggan, 'id', 'nama');

        $search = Yii::$app->request->queryParams;
        $query = Transaksi::find()
                 ->joinWith('pelanggan');

        if (!empty($search['id_pelanggan'])) {
                $query->andFilterWhere(['like','id_pelanggan', $search['id_pelanggan']]);
        }

        if (!empty($search['estimasi'])) {
                $query->andFilterWhere(['like','estimasi', $search['estimasi']]);
        }

         if (!empty($search['tanggal_masuk'])) {
                $query->andFilterWhere(['like','tanggal_masuk', $search['tanggal_masuk']]);
        }

        if (!empty($search['total_berat'])) {
                $query->andFilterWhere(['like','total_berat', $search['total_berat']]);
        }

        if (!empty($search['tanggal_selesai'])) {
                $query->andFilterWhere(['like','tanggal_selesai', $search['tanggal_selesai']]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'Pelanggan' => $Pelanggan,
        ]);
    }

    /**
     * Displays a single Transaksi model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Transaksi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Transaksi();

        $Pelanggan = Pelanggan::find()->all();
        $Pelanggan = ArrayHelper::map($Pelanggan, 'id', 'nama');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'Pelanggan' => $Pelanggan,
        ]);
    }

    /**
     * Updates an existing Transaksi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $Pelanggan = Pelanggan::find()->all();
        $Pelanggan = ArrayHelper::map($Pelanggan, 'id', 'nama');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'Pelanggan' => $Pelanggan,
        ]);
    }

    /**
     * Deletes an existing Transaksi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Transaksi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Transaksi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Transaksi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
