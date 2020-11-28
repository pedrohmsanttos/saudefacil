<!-- <div class="message success" onclick="this.classList.add('hidden')"><?= h($message) ?></div> -->
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?= h($message) ?>
</div>