<?php

/* @var $this yii\web\View */
/* @var $onlineUsers \app\models\SessionFrontendUser */
/* @var $model \app\models\Messages */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'My Yii Application');
?>
<div class="site-index">

    <h2>Users online</h2>
    <p>Users which you can invite to play:</p>
    <div class="col-lg-5">
    <div class="row thumbnail">
        <table class="table">
            <tbody>
            <?php
            if (empty($onlineUsers) == false) {
                foreach ($onlineUsers as $onlineUser) {
                    $user = \common\models\User::findOne(['id' => $onlineUser->user_id]);
                    echo Html::beginTag('tr');
                    echo Html::beginTag('td');
                    echo Html::encode($user->username);
                    $form = ActiveForm::begin();

                    echo $form->field($model, 'from_user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false);

                    echo $form->field($model, 'to_user_id')->hiddenInput(['value' => $user->id])->label(false);

                    echo $form->field($model, 'status')->hiddenInput(['value' => 'pending'])->label(false) ?>

                    <?= Html::submitButton('Invite', [
                        'class' => 'btn btn-primary'
                    ]);

                    ActiveForm::end();
                    echo Html::endTag('td');
                    echo Html::endTag('tr');
                }
            } else {
                echo 'No users online now';
            }
            ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
