

    <div class="container">
        <?php
            
            
            echo '<h1>' . $d->title . '</h1>';
            echo '<p>' . $d->content . '</p>';
            echo '<p class="font-italic">By ' . $d->first_name . ' ' . $d->last_name . '</p>';
            echo '<p>Category: ' . $d->category_name . '</p>';
            
            if (!empty($tags)) {
                echo '<div class="mt-4">';
                foreach ($tags as $tag) {
                    echo '<span class="badge badge-primary mr-2">' . $tag->name . '</span>';
                }
                echo '</div>';
            }
        ?>
    </div>

   