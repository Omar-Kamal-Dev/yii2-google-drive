<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Files';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-files">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="mt-5 container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Thumbnail Link</th>
                    <th scope="col">Embed Link</th>
                    <th scope="col">Modified At</th>
                    <th scope="col">File Size (MB)</th>
                    <th scope="col">Owner Names</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) : ?>
                    <td><?= $item['title'] ?></td>
                    <td>
                        <a href="<?= $item['thumbnailLink'] ?>">
                            <img src="<?= $item['thumbnailLink'] ?>" alt="<?= $item['title'] ?>" class="img-thumbnail">
                        </a>
                    </td>
                    <td>
                        <a href="<?= $item['embedLink']  ?>"><?= $item['embedLink']  ?></a>
                    </td>
                    <td><?= Yii::$app->formatter->asDate($item['modifiedDate'], 'd-M-Y'); ?></td>
                    <td><?= $item['fileSize'] ?></td>
                    <td><?= implode(',', $item['ownerNames']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>