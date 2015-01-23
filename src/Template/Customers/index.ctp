
<!-- File: src/Template/Articles/index.ctp (delete links added) -->

<h1>Blog articles</h1>
<p><?= $this->Html->link('Add Article', ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
        <th>Actions</th>
        <th>Actions</th>
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $articles query object, printing out article info -->

		<?php foreach ($users as $user): ?>
			<tr>
				<td><?= $this->Number->format($user->id) ?></td>
				<td><?= h($user->email) ?></td>
				<td><?= h($user->password) ?></td>
				<td><?= h($user->created) ?></td>
				<td><?= h($user->modified) ?></td>
				<td class="actions">
					<?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
					<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
				</td>
			</tr>
		<?php endforeach; ?>

</table>
