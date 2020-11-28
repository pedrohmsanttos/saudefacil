<!-- <div class="message error teste" onclick="this.classList.add('hidden');"><?= h($message) ?></div> -->
<div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?php //echo h($message) ?>
    <?php echo $message ?>
</div>
