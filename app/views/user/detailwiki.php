<div class="container bg-secondary-subtle shadow-sm mt-4 p-2">



    <h1> <?=$d->title  ?> </h1>
    <p>  <?= $d->content ?> </p>
    <p class="font-italic"> <?= $d->first_name ?>  <?=$d->last_name ?> </p>
    <?php if (!empty($d->category_name)) { ?>
    <p>Category: <?= $d->category_name ?> </p>
    <?php } ?>


    <div class="mt-4">
    <?php if (!empty($tag->name)) { ?>
        <p>tags: </p>
        <?php foreach ( $tags as $tag) { ?>
        <span > #<?=$tag->name  ?> </span>
        <?php } ?>  
        <?php } ?>
    </div>

</div>
