<?php if (isset($pagination)) : ?>
    <?= $pagination ?>

<?php else : ?>
    <div class="footer d-flex justify-content-end px-5 mb-5">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="" class="btn btn-default">Prev</a>
            <button type="button" class="btn btn-default">1</button>
            <a href="" class="btn btn-default">Next</a>
        </div>
    </div>
<?php endif ?>