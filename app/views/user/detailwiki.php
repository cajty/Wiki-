<div class="container bg-secondary-subtle shadow-sm mt-4 p-2">



    <h1> <?=$d->title  ?> </h1>
    <p>  <?= $d->content ?> </p>
    <p class="font-italic"> <?= $d->first_name ?>  <?=$d->last_name ?> </p>
    <p>Category: <?= $d->category_name ?> </p>


    <div class="mt-4">
    <p>tags: </p>
        <?php foreach ( $tags as $tag) { ?>
        <span > #<?=$tag->name  ?> </span>
        <?php } ?>  
    </div>

</div>
