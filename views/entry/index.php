<div class="entryList">
    <h1>Записи блога</h1>
    <div>
        <p><a class="btn btn-success">Создать Запись</a></p>

        <div class="grid-view">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Заголовок</th>
                    <th>Текст</th>
                    <th>Дата изменения</th>
                    <th>Изображение</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($models as $model): ?>
                    <tr>
                        <td><?= $model->id ?></td>
                        <td><?= $model->title ?></td>
                        <td><?= $model->description ?></td>
                        <td><?= $model->updated_at ?></td>
                        <td><?= $model->image ?></td>
                        <td>
                            <a href="#" class="buttonAction" data-url="/entry/view?id=<?= $model->id ?>" title="Просмотр" aria-label="Просмотр">
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>
                            <a href="#" class="buttonAction" data-url="/entry/update?id=<?= $model->id ?>" title="Редактировать" aria-label="Редактировать">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <a href="#" class="buttonAction" data-url="/entry/delete?id=<?= $model->id ?>" title="Удалить" aria-label="Удалить" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
