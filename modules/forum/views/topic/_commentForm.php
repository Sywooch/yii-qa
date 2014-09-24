<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\PageDownAsset;
PageDownAsset::register($this);
$this->registerJs("
    $('#wmd-input').one('click', function(){
        var commentConverter = Markdown.getSanitizingConverter();
            commentEditor = new Markdown.Editor(commentConverter);
        commentEditor.run();
    });
");
?>
<div class="topic-comment-form clearfix">
    <h4>发表评论</h4>
    <?php $form = ActiveForm::begin([
        'fieldConfig' => [
            'template' => "{input}\n{hint}\n{error}"
        ]
    ]); ?>
    <?= $form->errorSummary($model, [
        'class' => 'alert alert-danger'
    ]) ?>
    <div class="wmd-panel">
        <div id="wmd-button-bar"></div>
        <?= $form->field($model, 'content', [
            'selectors' => [
                'input' => '#wmd-input'
            ],
        ])->textarea([
                'id' => 'wmd-input',
                'class' => 'form-control input-lg wmd-input',
                'rows' => 6
            ]) ?>
    </div>
    <div class="form-group text-right">
        <?= Html::submitButton('提交评论', ['class' => 'btn btn-success']) ?>
    </div>
    <div id="wmd-preview" class="wmd-panel wmd-preview"></div>
    <?php ActiveForm::end(); ?>
</div>
