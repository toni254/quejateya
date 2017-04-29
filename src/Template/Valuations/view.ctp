<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Valuation'), ['action' => 'edit', $valuation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Valuation'), ['action' => 'delete', $valuation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $valuation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Valuations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Valuation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="valuations view large-9 medium-8 columns content">
    <h3><?= h($valuation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('NAME') ?></th>
            <td><?= h($valuation->NAME) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($valuation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('POSITION') ?></th>
            <td><?= $this->Number->format($valuation->POSITION) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Created') ?></th>
            <td><?= $this->Number->format($valuation->user_created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Modified') ?></th>
            <td><?= $this->Number->format($valuation->user_modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($valuation->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($valuation->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Published') ?></th>
            <td><?= $valuation->published ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Posts') ?></h4>
        <?php if (!empty($valuation->posts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Tags') ?></th>
                <th scope="col"><?= __('Latitude') ?></th>
                <th scope="col"><?= __('Longitude') ?></th>
                <th scope="col"><?= __('Published') ?></th>
                <th scope="col"><?= __('Solved') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Solved Date') ?></th>
                <th scope="col"><?= __('User Created') ?></th>
                <th scope="col"><?= __('User Modified') ?></th>
                <th scope="col"><?= __('User Solved') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('Priority Id') ?></th>
                <th scope="col"><?= __('Valuation Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($valuation->posts as $posts): ?>
            <tr>
                <td><?= h($posts->id) ?></td>
                <td><?= h($posts->title) ?></td>
                <td><?= h($posts->description) ?></td>
                <td><?= h($posts->tags) ?></td>
                <td><?= h($posts->latitude) ?></td>
                <td><?= h($posts->longitude) ?></td>
                <td><?= h($posts->published) ?></td>
                <td><?= h($posts->solved) ?></td>
                <td><?= h($posts->created) ?></td>
                <td><?= h($posts->modified) ?></td>
                <td><?= h($posts->solved_date) ?></td>
                <td><?= h($posts->user_created) ?></td>
                <td><?= h($posts->user_modified) ?></td>
                <td><?= h($posts->user_solved) ?></td>
                <td><?= h($posts->category_id) ?></td>
                <td><?= h($posts->city_id) ?></td>
                <td><?= h($posts->priority_id) ?></td>
                <td><?= h($posts->valuation_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
