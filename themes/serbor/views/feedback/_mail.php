<h2>Обратная связь</h2>
<table>
	<tr>
		<td><strong>Имя: </strong></td>
		<td><?=CHtml::encode($model->fio)?></td>
	</tr>
	<tr>
		<td><strong>Телефон: </strong></td>
		<td><?=CHtml::encode($model->phone)?></td>
	</tr>
	<tr>
		<td><strong>E-mail: </strong></td>
		<td><?=CHtml::encode($model->email)?></td>
	</tr>
	<tr>
		<td><strong>Сообщение: </strong></td>
		<td><?=CHtml::encode($model->msg)?></td>
	</tr>
</table>